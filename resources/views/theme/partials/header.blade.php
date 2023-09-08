<style>
    .btn-primary {
        color: #fff;
        background-color: #0069d9cc;
        border-color: #0069d9cc;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    a {
        color: #4b4b4b;
    }

    a:hover {
        color: black !important;
        text-decoration: none !important;
    }

    .w-40 {
        width: 40%;
    }

    .dropdown2 {
        float: right;
    }

    .dropdown .dropdown-menu {
        padding: 20px;
        box-shadow: 0px 5px 30px black;
    }

    .dropdown .dropdown-menu1 {
        left: -131px !important;
    }

    .total-header-section {
        border-bottom: 1px solid #d2d2d2;
    }

    .total-section p {
        margin-bottom: 20px;
    }

    .cart-detail {
        padding: 15px 0px;
    }

    .cart-detail-img img {
        width: 100%;
        height: 100%;
        padding-left: 15px;
    }

    .cart-detail-product p {
        margin: 0px;
        color: #000;
        font-weight: 500;
    }

    .cart-detail .price {
        font-size: 12px;
        margin-right: 10px;
        font-weight: 500;
    }

    .cart-detail .count {
        color: #C2C2DC;
    }

    .checkout {
        border-top: 1px solid #d2d2d2;
        padding-top: 15px;
    }

    .checkout .btn-primary {
        border-radius: 50px;
        height: 50px;
    }

    .dropdown-menu:before {
        content: " ";
        position: absolute;
        top: -20px;
        right: 50px;
    }
</style>
<section class="header-main border-bottom" style="background-color: #f6f6f6;">
    <div class="container-fluid">
        <div class="row align-items-center d-none d-lg-flex">
            <div class="col-xl-4 col-lg-4">
                <a href="{{route('home')}}" class="brand-wrap" data-abc="true">
                    <img class="w-40 pt-2"
                         src="@isset($setting['admin_logo']) {{ asset('uploads/'.$setting['admin_logo']) }}@endisset">
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 d-flex justify-content-end">
                <form action="#" class="search-wrap px-2 w-100">
                    <div class="input-group border border-warning rounded">
                        <div></div>
                        <input type="text" class="form-control search-form rounded border-0" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-warning bg-warning search-button" type="submit"><i
                                    class="fa fa-search" style="color: black;"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-4 col-lg-4 d-flex justify-content-center p-md-0">
                <a class="text-decoration-none zoom test-muted align-self-center mr-2 font-weight-bold" href="tel:718-850-4110"><i
                        class="fa fa-phone-alt mr-1" aria-hidden="true" style="font-size: 22px;"></i> 718-850-4110</i></a>
                @auth
                    <a href="{{route('logout')}}" type="button" class="btn btn-warining bg-warning text-white m-2">Logout</a>
                @else
                    <a href="{{route('login')}}" type="button" class="btn btn-warining bg-warning m-2 text-white">Sign
                        In</a>
                @endauth

                <div class="dropdown m-2 dropdown2 p-md-0">
                    <button type="button" class="btn bg-warning" data-toggle="dropdown">
                        <span class="align-self-center m-1"><i style="font-size: 22px;"
                                                                    class="fa fa-shopping-basket"
                                                                    aria-hidden="true"></i></span><span
                            class="badge badge-pill badge-danger">
                            @if(session('cart')!=null)
                                <?php echo count(session('cart')); ?>
                            @else
                                0
                            @endif
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu1 m-1" style="width:350px !important;">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <a href="{{route('cart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="badge badge-pill badge-danger">
                                        @if(session('cart')!=null)
                                            <?php echo count(session('cart')); ?>
                                        @else
                                            0
                                        @endif
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <?php $grand_total = 0 ?>
                                @if(session('cart')!=null)
                                    @foreach(session('cart') as $product_id=>$value)
                                        <?php $product = \App\Product::findorfail($product_id); ?>
                                        <?php
                                        $price1 = ($value['row1']['Price']);
                                        $price2 = ($value['row2']['Price']);
                                        $price3 = ($value['row3']['Price']);
                                        $price4 = ($value['row4']['Price']);
                                        $total_price = $price1 + $price2 + $price3 + $price4;
                                        $grand_total = $grand_total + $total_price;
                                        ?>
                                    @endforeach
                                    <p>Total: <span class="text-info">${{$grand_total}}</span></p>
                                @endif
                            </div>
                        </div>
                        @if(session('cart')!=null)
                            @foreach(session('cart') as $product_id=>$value)
                                <?php $product = \App\Product::findorfail($product_id); ?>
                                <?php
                                $price1 = ($value['row1']['Price']);
                                $price2 = ($value['row2']['Price']);
                                $price3 = ($value['row3']['Price']);
                                $price4 = ($value['row4']['Price']);
                                $total_price = $price1 + $price2 + $price3 + $price4;
                                ?>
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{asset('uploads/products/'.$product->image)}}" width="100"/>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{$product->name}}</p>
                                        <span class="price text-info">$ {{$total_price}}</span>
                                        {{--                                        <span class="count"> Quantity:01</span>--}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Your cart is empty!</p>
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <button class="btn bg-warning btn-block text-white">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
