@extends('layouts.header')



@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ route('Product.store') }}" method="POST"> 
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        {{-- <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                        here</a> to enter your code</h6> --}}
                        <h6 class="checkout__title">Billing Details</h6>
                        
                        <div class="checkout__input">
                            <p>Name<span>*</span></p>
                            <input type="text" name="name" required>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address"  class="checkout__input__add" required>
                            
                        </div>

                        <div class="checkout__input">
                            <p>Note<span>*</span></p>
                            <input type="text" name="note" required>
                        </div>

                        <h6 class="checkout__title">Payment</h6>
                        <div class="checkout__input">
                            <p>Card Number<span>*</span></p>
                            <input type="text"  placeholder="0000 0000 0000 0000" required>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Expiry Date<span>*</span></p>
                                    <input type="text" placeholder="MM/YY"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>CVC/CVV<span>*</span></p>
                                    <input type="text" placeholder="000"  required>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span> </div>
                            @if(isset($cart))
                            <ul class="checkout__total__products">
                                @foreach($cart as $c)
                                <li>{{$c['name']}} ({{$c['quantity']}})<span>${{number_format($c['price']*$c['quantity'], 0, ',', '.')}}</span> </li>
                                @endforeach
                               
                                
                            </ul>
                            @endif
                            <ul class="checkout__total__all">
                                {{-- <li>Subtotal <span>$750.99</span></li> --}}
                                <input type="text" name="total" value="{{$total}}" id="" hidden>
                                <li>Total <span>${{number_format($total, 0, ',', '.')}}</span></li>
                            </ul>
                            
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
