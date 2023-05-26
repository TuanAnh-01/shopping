@extends('layouts.header')



@section('content')
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($home as $h)
        <div class="hero__items set-bg" data-setbg="images/{{$h->images}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>{{$h->title}}</h6>
                            <h2>{{$h->sumary_title}}</h2>
                            <p>{{$h->content}}</p>
                            <a href="{{ route('Product.index') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        {{-- <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                            commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- Hero Section End -->

<section style="margin-top: 150px" class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($product_new as $p)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="images/{{$p->images}}">
                        @if(!empty($p->sale))
                        <span  style="background-color: red" class="label" style="color: #fff">Sale {{$p->sale}}%</span>
                        @else
                        <span class="label">New</span>    
                        @endif
                        <ul class="product__hover">      
                            <li><a href="#" class="add_to_cart"
                                data-url = "{{ route('addCart', $p->id) }}"><img src="../img/icon/cart.png" alt=""> <span>+ add to card</span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$p->name}}</h6>
                        <a href="{{ route('Product.show', $p->id) }}" class="add-cart">View details</a>
                       
                        @if($p->sale)
                                    <h5 style="font-size: 13px"> <del>${{number_format($p->price, 0, ',', '.')}}</del> </h5>
                                    <h5 style="color: red">${{number_format($p->price_sale, 0, ',', '.')}}</h5>
                                    @else
                                    <h5 >${{number_format($p->price, 0, ',', '.')}}</h5>
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
            
            @foreach($product_sale as $p)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="images/{{$p->images}}">
                        @if(!empty($p->sale))
                        <span  style="background-color: red" class="label" style="color: #fff">Sale {{$p->sale}}%</span>
                        @else
                        <span class="label">New</span>    
                        @endif
                        <ul class="product__hover">      
                            <li><a href="#" class="add_to_cart"
                                data-url = "{{ route('addCart', $p->id) }}"><img src="../img/icon/cart.png" alt=""> <span>+ add to card</span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$p->name}}</h6>
                        <a href="{{ route('Product.show', $p->id) }}" class="add-cart">View details</a>
                       
                        @if(!empty($p->sale))
                                    <h5 style="font-size: 13px"> <del>${{number_format($p->price, 0, ',', '.')}}</del> </h5>
                                    <h5 style="color: red">${{number_format($p->price_sale, 0, ',', '.')}}</h5>
                                    @else
                                    <h5 >${{$p->price}}</h5>
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

<section style="margin-bottom: 180px" class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    @foreach($branding as $b)
                    <div class="instagram__pic__item set-bg" data-setbg="images/{{$b->images}}"></div>
                    @endforeach
                    
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>BRANDING</h2>
                    <p>Discover your own beauty from your fashion style.</p>
                    <h3>#Male_Fashion</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Section Begin -->




<!-- Product Section End -->


@endsection
