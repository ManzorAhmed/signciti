		@extends('theme.layouts.master')

		@section('content')

			<div class="container-fluid bg-white" >  
				<div class="row bg-white"> 
					<div class="col-md-12 p-3 text-center">    
						<h2 class="text-warning">Business Signs</h2>
					</div>     
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}"> 
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/m/o/monument-sign-micron_1.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left">Business Signage</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>    
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}">
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/s/a/salon-sign-sq.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left">Store Signs</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>     
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}"> 
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/s/a/salon-sign-sq.jpg"class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left">Salon Signs</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div> 
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}">
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/v/a/values-wall-signs-hall-side.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left">Mission Statement Signs - Core Values</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>  
				</div> 
			</div> 

		@endsection



