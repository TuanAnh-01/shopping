<section class="shopping-cart spad">
    <form method="POST" action="{{ route('updateCart') }}">
        @csrf
    <div class="container cart" data-url="{{ route('deleteCart') }}">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table class="update_cart_url" data-url="{{ route('updateCart') }}">
                        
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Images</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        @php
                        $total = 0;
                        @endphp
                        <tbody>
                            @if(isset($cart))
                            @foreach($cart as $id => $c)

                            @php
                            $total += $c['price'] * $c['quantity'];
                            @endphp
                            <tr>
                                {{-- <th scope="row">{{$id}} </th> --}}
                                <td style="width: 300px" class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-1.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$c['name']}}</h6>
                                        <h5>${{number_format($c['price'], 0, ',', '.')}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        
                                        <div class="cart__price">
                                            <img style="width: 65px;height: 70px;" src="../images/{{$c['images']}}" alt="">
                                        </div>
                                        
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" name="quantity[{{$id}}]" value="{{$c['quantity']}}">
                                        </div>
                                    </div>
                                </td>

                                <td class="cart__price">${{number_format($c['price'] * $c['quantity'], 0, ',', '.')}}</td>
                                <td data-id="{{$id}}" class="cart__close cart_delete"><i class="fa fa-close"></i></td>
                            </tr>
                            @endforeach
                            @endif
                            
                           
                            
                        </tbody>
                        
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ route('Product.index') }}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">

                            <button  style="padding: 14px 35px;background-color: black;color: #fff;">
                                <i class="fa fa-spinner cart_update"></i> Update cart 
                            </button>
                         
                           
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        {{-- <li>Subtotal <span>$ 169.50</span></li> --}}
                        {{-- <input type="text" name="total" value="{{number_format($total, 0, ',', '.')}}" id="" hidden> --}}
                        <li>Total <span>$ {{number_format($total, 0, ',', '.')}}</span></li>
                    </ul>
                    <a href="{{ route('Product.create') }}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</form>
</section>

