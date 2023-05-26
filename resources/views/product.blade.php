@extends('layouts.header')



@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a >Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="{{ route('Product.index') }}" method="GET">
                            <input type="text" name='keyword' placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">

                                                @foreach($category as $c)
                                                
                                                <li>
                                                    <form action="{{ route('Product.index') }}" method="GET">
                                                        <input type="text" value="{{$c->name}}" name='key_category' hidden>
                                                        <div>
                                                            <input id="category{{$c->id}}" style="display: none" type="submit" hidden>
                                                            <Label style="cursor: pointer" for="category{{$c->id}}">{{$c->name}}</Label>
                                                        </div>
                                                        
                                                    </form>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                @foreach($branding as $b)
                                                <form action="{{ route('Product.index') }}" method="GET">
                                                    <input type="text" value="{{$b->name}}" name='key_branding' hidden>
                                                    <div>
                                                        <input id="branding{{$b->id}}" style="display: none" type="submit" hidden>
                                                        <Label style="cursor: pointer" for="branding{{$b->id}}">{{$b->name}}</Label>
                                                    </div>
                                                    
                                                </form>
                                               
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                @foreach($filter_price as $f)
                                                {{-- @if($f->price_min ) --}}
                                                <form action="{{ route('Product.index') }}" method="GET">
                                                    
                                                    @if(!empty($f->price_max))
                                                        <input type="text" value="{{$f->price_min}}" name='key_min' hidden>
                                                        <input type="text" value="{{$f->price_max}}" name='key_max' hidden>
                                                        <div>
                                                            <input id="filter{{$f->id}}" style="display: none" type="submit" hidden>
                                                            <Label style="cursor: pointer" for="filter{{$f->id}}">${{number_format($f->price_min, 0, ',', '.')}} - ${{number_format($f->price_max, 0, ',', '.')}}</Label>
                                                        </div>        
                                                    @else
                                                        <input type="text" value="{{$f->price_min}}" name='key_min' hidden>
                                                        <input id="filter{{$f->id}}" style="display: none"  type="submit" hidden>
                                                        <Label style="cursor: pointer" for="filter{{$f->id}}">${{number_format($f->price_min, 0, ',', '.')}}+</Label>
                                                    @endif 
                                                    
                                                    
                                                </form>
                                                {{-- <li>
                                                    <a href="#">${{$f->price_min}} - ${{$f->price_max}}</a>
                                                </li> --}}
                                                {{-- @else
                                                <form action="{{ route('Product.filterPrice') }}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{$f->price_max}}" name='key_max' hidden>
                                                    <div>
                                                        <input id="{{$f->id}}" style="display: none"  type="submit" hidden>
                                                        <Label style="cursor: pointer" for="{{$f->id}}">${{$f->price_max}}+</Label>
                                                    </div>
                                                    
                                                </form> --}}
                                                {{-- <li><a href="#">${{$f->price_max}}+</a></li> --}}
                                                
                                                {{-- @endif --}}
                                                @endforeach
                                               
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select id="sort">
                                    <option value="{{Request::url()}}">All</option>
                                    <option value="{{Request::url()}}?sort_by=Low">Low To High</option>
                                    <option value="{{Request::url()}}?sort_by=High">High To Low</option>
                                </select>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($product as $p)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="images/{{$p->images}}">
                                @if(!empty($p->sale))
                                    <span style="background-color: red" class="label" style="color: #fff">Sale {{$p->sale}}%</span>
                                    @else
                                    <span class="label">New</span>    
                                @endif
                                
                                <ul class="product__hover">
                                    
                                    <li><a href="#" class="add_to_cart"
                                        data-url = "{{ route('addCart', $p->id) }}"
                                        ><img src="img/icon/cart.png" alt=""> <span>+ add to card</span></a>
                                    </li>
                                 
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{$p->name}}</h6>
                                
                                <a href="{{ route('Product.show', $p->id) }}" class="add-cart">View details</a>
                               

                                @if(!empty($p->sale) )
                                
                                    <h5 style="font-size: 13px"> <del>${{$p->price}}</del> </h5>
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
                    
                </div>
                {{ $product->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@endsection
