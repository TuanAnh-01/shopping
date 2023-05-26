<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        
        if(isset($_GET['sort_by'])){
            $sort = $_GET['sort_by'];
            if($sort == 'Low'){
                $product = DB::table('product')->orderBy('price_sale', 'asc')->paginate(9)->appends(request()->query());
            };
            if($sort == 'High') {
                $product = DB::table('product')->orderBy('price_sale', 'desc')->paginate(9)->appends(request()->query());
            };
        }

        elseif(isset($_GET['key_category'])){
            $searchKey = $_GET['key_category'];
            $product = DB::table('product')->orderBy('id', 'desc')
                                            ->where('category_id', '=',  $searchKey)
                                            ->paginate(9)
                                            ->appends(request()->query());
        }

        elseif(isset($_GET['key_branding'])){
            $searchKey = $_GET['key_branding'];
            $product = DB::table('product')->orderBy('id', 'desc')
                                            ->where('branding_id', '=',  $searchKey)
                                            ->paginate(9)
                                            ->appends(request()->query());
        }

        elseif(isset($_GET['key_min'])){
            if($request->key_max && $request->key_min){
                $key_max = $request->key_max;
                $key_min = $request->key_min;
            
                $product = DB::table('product')->orderBy('price_sale', 'asc')
                                ->whereBetween('price_sale', [$key_min,  $key_max])
                                ->paginate(9)
                                ->appends(request()->query());
            }
    
            else{
                $key_min = $request->key_min;
                $product = DB::table('product')->orderBy('price_sale', 'asc')
                                                ->where('price_sale', '>=',  $key_min)
                                                ->paginate(9)
                                                ->appends(request()->query());
            }
            
               
        }

        elseif(isset($_GET['keyword'])){

            $searchKey = $_GET['keyword'];
            $product = DB::table('product')
                            ->orderBy('id', 'desc')                     
                            ->where('name', 'like', '%'. $searchKey.'%')
                            ->orWhere('category_id', 'like', '%'. $searchKey.'%')  
                            ->orWhere('branding_id', 'like', '%'. $searchKey.'%')
                            ->orWhere('price_sale', 'like', '%'. $searchKey.'%')  

                            ->paginate(9)->appends(request()->query());
            
        }

        else{
            $product = DB::table('product')->orderBy('id', 'desc')->paginate(9);
        }

        $category = DB::table('category')->orderBy('id', 'desc')->get();
        $branding = DB::table('branding')->orderBy('id', 'desc')->get();   
        $filter_price = DB::table('filter_price')->get();
        return view('product')->with('product', $product)->with('category', $category)->with('branding', $branding)->with('filter_price', $filter_price);

    }
    

    public function addCart($id)
    {
        // session()->pull('cart');
        $product = DB::table('product')->find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            // dd($cart[$id]['quantity']);
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1; 
        }
        else{
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price_sale,
                'images' => $product->images,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        $total = $this->calculateCartTotal($cart);
        session()->put('total', $total);
        // dd($total);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);

    }

    private function calculateCartTotal($cart)
    {
        $total = 0;

        foreach ($cart as $c) {
            $total += $c['price'] * $c['quantity'];
        }

        return $total;
    }

    public function showCart()
    {
        //

        $cart = session()->get('cart');
        return view('cart')->with('cart', $cart);
        
    }

    public function updateCart(Request $request)
    {
        if($request->input('quantity')) {
            $quantities = $request->input('quantity');
            $cart = session()->get('cart');
            session()->put('total', $request->total);
            // dd(session()->get('total'));
        // Cập nhật giá trị quantity cho từng sản phẩm trong giỏ hàng
            foreach ($quantities as $productId => $quantity) {
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $quantity;
                }
            }
    
        // Lưu giỏ hàng đã cập nhật vào session
            session()->put('cart', $cart);
            //tính tổng
            $total = $this->calculateCartTotal($cart);
            session()->put('total', $total);
        }
        
        return redirect()->back();
    }
    public function deleteCart(Request $request)
    {
        
        if($request->id){
            
            $carts = session()->get('cart');
            
            unset($carts[$request->id]);
            
            session()->put('cart', $carts);
            
            $carts = session()->get('cart');

            $total = $this->calculateCartTotal($carts);
            session()->put('total', $total);
        
            
            $cartComponent = view('cart_component')->with('cart', $carts)->render();

 
            return response()->json(['cart_component' => $cartComponent , 'code' => 200], 200 );
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cart = session()->get('cart');
        $total = session()->get('total');
        return view('checkout')->with('total', $total)->with('cart',$cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderData = $request->only([
            'name',
            'email',
            'phone',
            'note',
            'address',
            'total' ,
           
        ]);
        $orderData['user_id'] =  Auth::user()->id;
        $orderData['status'] = 'Wait for confirmation';
       
        DB::beginTransaction();

    try {
        $orderId = DB::table('order')->insertGetId($orderData);

        // Lưu thông tin items
        $itemsData = session()->get('cart'); 

        $items = [];
        foreach ($itemsData as $itemData) {
            $itemData['order_id'] = $orderId;
            $items[] = $itemData;
        }
        DB::table('item')->insert($items);

        // Hoàn tất giao dịch
        DB::commit();

        session()->pull('cart');
        session()->pull('total');

        // Thực hiện các hành động khác sau khi insert thành công

        return redirect()
        ->route('history_order');

        // Trả về phản hồi thành công hoặc chuyển hướng tùy theo logic của bạn
    } catch (\Exception $e) {
        // Xảy ra lỗi, rollback transaction
        DB::rollBack();

        return redirect()->back();

        // Xử lý lỗi hoặc trả về phản hồi thất bại
    }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        session()->put('id', $id);
        $product_show = DB::table('product')->find($id);
        $images_images_detail = str_replace(["[","]","\""], '', $product_show->images_detail);
        $array_images = explode(",", $images_images_detail);
        $checkbox = str_replace(["[","]","\""], '', $product_show->size_id);
        $array_size = explode(",", $checkbox);
        $product_new = DB::table('product')->get()->take(4);
        return view('show_product')->with('product_show',$product_show)->with('product_new',$product_new)->with('array_images', $array_images)->with('array_size', $array_size);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
