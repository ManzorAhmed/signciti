{{--
<nav class="navbar  navbar-expand-sm sticky-top navbar-light bg-light1 navbar-expand-md navbar-main border-bottom">
    <div class="container-fluid">
        <form class="d-md-none my-2">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search"
                       required="">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-success my-lg-2"><i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6"
                aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
        <div class="navbar-collapse collapse" id="dropdown6" style="">
            @php
                $categories = \App\Category::get();
            @endphp
            <ul class="navbar-nav mx-auto text-center">
                @foreach($categories as $r)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"
                           data-abc="true" aria-expanded="false">{{$r->name}}</a>
                        <div class="dropdown-menu">
                            @foreach($r->subCategory as $r)
                                <a class="dropdown-item" href="{{route('products',$r->slug)}}"
                                   data-abc="true">{{$r->name}}</a>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
--}}
<style>
.bg-light1 {
    background-color: #fafafa;
} 

 
@media (max-width: 778px) {
    .w-md-50 {
        width: 45%;  
    }

    .site-footer .copyright-text, .site-footer .social-icons {
        text-align: center
    }
    .bg-light1
    {    
     background-color: #f6f6f6 !important;
    }
    .p-md-2
    {
        padding:6px;
    }
}
@media (max-width: 450px) {
    .w-sm-100 {
        width: 100%;  
    }
    .w-sm-75 {
        width: 75% !important;  
    }
    .site-footer .copyright-text, .site-footer .social-icons {
        text-align: center
    }
} 

.navbar .dropdown:active .dropdown-menu, .navbar .dropdown .dropdown-menu:active {
    display: block !important;
    font-size: 15px;font-weight: bold;border: 1px solid #e9e9e9;background: #dfdfdf;border-radius: 4px;
} 

    .dropdown .dropdown-menu2 {
        left: 0px !important;
    } 
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light1 p-3" style="border: 1px solid #e9e9e9;">
    <div class="d-flex">
         <div class="w-50"> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
        </div>
         <div class="d-lg-none d-xl-none align-items-center w-100" style="display: inline-flex;">  
            <a href="{{route('home')}}" class="brand-wrap align-self-center" data-abc="true">
                <img class="w-md-50 w-sm-75" style="" src="@isset($setting['admin_logo']) {{ asset('uploads/'.$setting['admin_logo']) }}@endisset" />
            </a>  
            <a class="text-decoration-none p-1 align-self-center" href="tel:718-850-4110" style=""><i class="fa fa-phone mr-1" aria-hidden="true" style="font-size: 24px;"></i></a> 
			@auth
				<a class="text-decoration-none p-1 align-self-center text-warning" href="{{route('logout')}}"><i class="fa fa-user" aria-hidden="true" style="font-size: 24px;"></i></a> 
			@else
				<a class="text-decoration-none p-1 align-self-center text-dark" href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true" style="font-size: 24px;"></i></a> 
			@endauth
			<a class="text-decoration-none p-1 align-self-center d-none" href="#"><i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 24px;"></i></a> 
		</div>
    </div> 
	<div class="dropdown dropdown2 align-self-center mt-1 d-lg-none d-xl-none">
		<button type="button" class="btn" data-toggle="dropdown">
			<span class="zoom align-self-center m-1">
				<i style="font-size: 22px;" class="fa fa-shopping-basket" aria-hidden="true"></i>
			</span>
			<span
				class="badge badge-pill badge-danger">
				@if(session('cart')!=null)
					<?php echo count(session('cart')); ?>
				@else
					0
				@endif
			</span>
		</button>
		<div class="dropdown-menu dropdown-menu2 m-1" style="width: 285px !important;">
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
    <div class="w-100 mt-2 mb-2 d-lg-none d-xl-none">
        <form action="#" class="search-wrap">
          <div class="input-group border border-warning rounded">
                <div></div>
                <input type="text" class="form-control search-form rounded-left border-0" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-black search-button bg-warning text-dark" type="submit"><i class="fa fa-search text-dark" style=""></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            @php
                $categories = \App\Category::get();
            @endphp
            @foreach($categories as $r)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bg-warning rounded" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-size: 15px;font-weight: bold;background: #ffffff;border: 1px solid #0000001a !important;">
                        {{$r->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<div class="container" style="align-items: normal"> 
							<div class="row w-100 d-flex">
								@foreach($r->subCategory as $r)
									<div class="col-md-3">
										<span>{{$r->name}}</span>
										<ul class="nav flex-column  mx-auto">
											@foreach($r->innerSubCategory as $r)
												<li class="nav-item">
													<a class="nav-link"
													   href="{{route('products',$r->slug)}}" class="will_active " style="font-size: 14px;padding-left: 0px !important;font-family: 'HELVETICANEUELTSTD' !important;">{{$r->name}}</a>
												</li>
											@endforeach
										</ul>
									</div>
								@endforeach 
							</div>
						</div>
					</div>
					<!--  /.container  -->
                </li>
            @endforeach
        </ul>
    </div>
</nav>
