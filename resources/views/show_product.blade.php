@extends('layouts.header')

@section('content')
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="">Home</a>
                        <a href="">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($array_images as $key=> $value)
                        @if($key == 0) 

                        <li class="nav-item active">
                            <a class="nav-link " data-toggle="tab" href="#tabs-{{$key}}" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="../images/{{$value}}">
                                </div>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#tabs-{{$key}}" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="../images/{{$value}}">
                                </div>
                            </a>
                        </li>
                        @endif
                        @endforeach
                        
                       
                       
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        @foreach($array_images as $key=> $value)
                        @if($key == 0)
                        <div class="tab-pane active" id="tabs-{{$key}}" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img style="width :1000px;max-width: none;height: 700px;" src="../images/{{$value}}" alt="">
                            </div>
                        </div>
                        @else
                        <div class="tab-pane" id="tabs-{{$key}}" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img style="width :1000px;max-width: none;height: 700px;" src="../images/{{$value}}" alt="">
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{$product_show->name}}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        @if($product_show->sale)
                        <h3 style="color: red">${{number_format($product_show->price_sale, 0, ',', '.')}}
                            <span>${{number_format($product_show->price, 0, ',', '.')}}</span>
                        </h3>
                        @else
                        <h3> 
                            ${{$product_show->price}}
                        </h3>
                        @endif
                        
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                @foreach($array_size as $key=> $value)
                                <label class="" for="{{$key}}">{{$value}}
                                    <input type="radio" id="{{$key}}">
                                </label>
                                @endforeach
                                
                            </div>
                            {{-- <div class="product__details__option__color">
                                <span>Color:</span>
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                                <label class="c-2" for="sp-2">
                                    <input type="radio" id="sp-2">
                                </label>
                                <label class="c-3" for="sp-3">
                                    <input type="radio" id="sp-3">
                                </label>
                                <label class="c-4" for="sp-4">
                                    <input type="radio" id="sp-4">
                                </label>
                                <label class="c-9" for="sp-9">
                                    <input type="radio" id="sp-9">
                                </label>
                            </div> --}}
                        </div>
                        <div class="product__details__cart__option">
                            {{-- <div class="quantity">
                                <div class="pro-qty">

                                    <input type="text" value="1">
                                </div>
                            </div> --}}
                            <a href="#" data-url = "{{ route('addCart', $product_show->id) }}" class="primary-btn add_to_cart">add to cart</a>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-6" role="tab">Description</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                          
                            <div class="tab-pane active" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        {!!$product_show->content!!}
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">New Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach($product_new as $new)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="../images/{{$new->images}}">
                        @if(!empty($new->sale))
                            <span  style="background-color: red" class="label" style="color: #fff">Sale {{$new->sale}}%</span>
                            @else
                            <span class="label">New</span>    
                        @endif
                        
                        <ul class="product__hover">      
                            <li><a href="#"><img src="../img/icon/cart.png" alt=""> <span>+ add to card</span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$new->name}}</h6>
                        <a href="#" class="add-cart">View details</a>
                       
                        @if(!empty($new->sale))
                                    <h5 style="font-size: 13px"> <del>${{number_format($new->price, 0, ',', '.')}}</del> </h5>
                                    <h5 style="color: red">${{number_format($new->price_sale, 0, ',', '.')}}</h5>
                                    @else
                                    <h5 >${{number_format($new->price, 0, ',', '.')}}</h5>
                                @endif
                        <div class="product__color__select">
                            <div style=" margin-right: 20px;" class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
            
        </div>
    </div>
</section>
@endsection