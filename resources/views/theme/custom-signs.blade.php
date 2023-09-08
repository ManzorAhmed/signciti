		@extends('theme.layouts.master')

		@section('content')

			<div class="container-fluid bg-white" >  
				<div class="row bg-white"> 
					<div class="col-md-12 p-3 text-center">    
						<h2 class="text-warning">Custom Signs</h2>
					</div>     
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}"> 
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/category/outdoor-sign-black-letters.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left"> Custom Signs</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>    
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}">
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/category/metal-church-sign.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left"> Church Signs</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>     
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}"> 
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/category/durable-foam-letter-sunset.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left"> Event Letters</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div> 
					<div class="col-md-3 mb-lg-5 p-4"> 
						<div class="card zoom border"> 
							<a style="text-decoration: none " class="text-dark" href="{{route('signform')}}">
								<img src="https://res.cloudinary.com/woodland/image/upload/ar_1.1111111111111,c_crop/f_auto,h_324,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/category/powdercoated-aluminum_lg.jpg" class="w-100 rounded-top" style="height:300px"> 
								<div class="card-body"> 
									<h6 class="text-left"> Office Signs</h6> 
								</div> 
							</a> 
							<div class="card-footer d-none">
							</div> 
						</div> 
					</div>  
				</div> 
			</div> 

		@endsection



