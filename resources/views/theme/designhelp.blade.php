@extends('theme.layouts.master')
@section('content')
<style>
    .page-title {
        margin: 3rem auto 4rem;
        padding: 0;
        text-align: center;
        max-width: 45rem;
    }
    .page-title h1, .page-title h2 {
        font-family: inherit;
        font-weight: 700;
        font-size: 2.3rem;
        color: #333;
    }
    .page-title>.subtitle:before {
        content: "";
        display: block;
        height: 3px;
        background: orange;
        width: 80px;
        margin: 1.25rem auto 1rem;
    } 
    
    .bg-light {
        background: #f6f6f6!important;
    }
    .pb-3, .py-3 {
        padding-bottom: 1rem!important;
    }
    .pt-3, .py-3 {
        padding-top: 1rem!important;
    }
    .bg-light {
        background-color: #f2f2f2!important;
    }
    section {
        font-size: 1.1rem;
    } 
</style>
<div class="container-fluid bg-white">
	<div class="row">
		<div class="col-md-12">
			<div id="amfpc-global_messages"></div> 
			<div class="cms">
				<div id="amfpc-messages"></div>
				<section class=" py-3">
					<div class="row justify-content-center">
						<div class="col-sm-12">
							<div class="cl-block page-title page-header">
								<h1 class="h-item display-2">Design Help</h1>
								<p class="subtitle">We offer great customer service with our custom quote and design specialists. Our experts are dedicated to bringing your idea to reality with expertise and efficiency.  
								</p>
							</div>
						</div> 
					</div>
				</section>
				<section class=" full-width bg-light bg-light-text py-3">
					<div class="container-c"> 
						<div class="row justify-content-center">
							<div class="col-sm-6">
    							<div class="cl-block cl-top-left text-center text-sm-left">
    							    <img class="img-fluid lazyload in rounded" data-src="{{asset('front_end/images/design help.jpg')}}" alt="" title="" src="{{asset('front_end/images/design help.jpg')}}">
    						    </div>
							</div>
							<div class="col-sm-6">
								<div class="p-md-2">
									<div class="cl-caption mt-md-2"> 
							    	    <h3 class="h-item  text-center ">Get in touch with our experts and let us know what you need and we will prepare it for production.</h3>
									</div><!-- end cl-caption -->
								</div>
								<br>
								<div class="col-sm-12 d-flex mt-lg-5">
									<div class="w-25 text-xl-center align-self-start p-lg-2">
										<i class="fas fa-book text-warning w-50" style="font-size: 60px;"></i>
									</div>
									<div class="w-75">
										<h5 class="font-weight-bold">QUOTE</h5>
										<p class="cl-subtitle"> Need a quote? Tell us what you need and our specialists will quote it and prep it for production. Fast turnaround.</p> 
									</div>
								</div>
								<br>
								<div class="col-sm-12 d-flex mt-lg-3">
									<div class="w-25 text-xl-center align-self-start p-lg-2">
										<i class="fas fa-images text-warning w-50" style="font-size: 60px;"></i>
									</div>
									<div class="w-75">
										<h5 class="font-weight-bold">Photo Rendering</h5>
										<p class="cl-subtitle"> You can send us a photo of the space where your sign will be installed and a design expert will use that image to showcase the lettering of your choice</p> 
									</div>
								</div>
								<br>
								<div class="col-sm-12 d-flex mt-lg-3">
									<div class="w-25 text-xl-center align-self-start p-lg-2">
										<i class="fab fa-connectdevelop text-warning w-50" style="font-size: 60px;"></i> 
									</div>
									<div class="w-75">
										<h5 class="font-weight-bold">Connect with a Specialist</h5>
										<p class="cl-subtitle"> Expert advice and unparalleled service are available with a click or a call. Tell us a little about your project, send us a photo, or just give us a call.</p> 
									</div>
								</div>
							</div> 
						</div>
					</div>
				<br>
				</section> 
			</div> 
		</div>
	</div>
</div> 
@endsection