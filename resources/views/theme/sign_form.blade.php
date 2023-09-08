@extends('theme.layouts.master')

		@section('content')
		<style> 
		.card0 {
			box-shadow: 0px 4px 8px 0px #757575;
			border-radius: 0px
		}

		.card2 {
			margin: 0px 40px
		} 

		.border-line {
			border-right: 1px solid #EEEEEE
		} 

		.line {
			height: 1px;
			width: 45%;
			background-color: #E0E0E0;
			margin-top: 10px
		} 

		.text-sm {
			font-size: 14px !important
		}

		::placeholder {
			color: #BDBDBD;
			opacity: 1;
			font-weight: 300
		}

		:-ms-input-placeholder {
			color: #BDBDBD;
			font-weight: 300
		}

		::-ms-input-placeholder {
			color: #BDBDBD;
			font-weight: 300
		}

		input,
		textarea {
			padding: 10px 12px 10px 12px;
			border: 1px solid lightgrey;
			border-radius: 2px;
			margin-bottom: 5px;
			margin-top: 2px;
			width: 100%;
			box-sizing: border-box;
			color: #2C3E50;
			font-size: 14px;
			letter-spacing: 1px
		}

		input:focus,
		textarea:focus {
			-moz-box-shadow: none !important;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
			border: 1px solid #304FFE;
			outline-width: 0
		}

		button:focus {
			-moz-box-shadow: none !important;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
			outline-width: 0
		} 
 
		@media screen and (max-width: 991px) {
			 
			.card2 {
				border-top: 1px solid #EEEEEE !important;
				margin: 0px 15px
			}
		}
			
		</style>
			<div class="container-fluid bg-white mb-4 pb-5">  
				<div class="row bg-white"> 
					<div class="col-md-12 p-3 text-center">    
						<h2 class="text-warning">Product Name</h2>
						<span class="fa fa-star checked"></span>

						<span class="fa fa-star checked"></span>

						<span class="fa fa-star checked"></span>

						<span class="fa fa-star"></span>

						<span class="fa fa-star"></span>
					</div> 
				</div> 
				<div class="card card0 border-0">
					<div class="row d-flex" style="background: linear-gradient(45deg, #efeec8ba, transparent);">
						<div class="col-lg-6 d-flex  justify-content-center">
							<div class="card1 pb-4   align-self-center">
								<h3 class>Product Details</h3>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card2 card border-left px-4 py-5"> 
								<div class="row px-3"> <label class="mb-1">
										<h6 class="mb-0 text-sm">Name</h6>
									</label> <input class="mb-4 border" type="text" name="name" placeholder=""> 
								</div>
								<div class="row px-3"> <label class="mb-1">
										<h6 class="mb-0 text-sm">Email Address</h6>
									</label> <input class="mb-4 border" type="text" name="email" placeholder=""> 
								</div>
								<div class="row px-3"> <label class="mb-1">
										<h6 class="mb-0 text-sm">Phone Number</h6>
									</label> <input type="phone border" name="phone" placeholder=""> 
								</div>
								<div class="row px-3 mt-3"> <label class="mb-1">
										<h6 class="mb-0 text-sm">Give us the details</h6>
									</label> <textarea type="phone border" name="phone" placeholder=""> </textarea>
								</div>
								<div class="row px-3 mt-3"> 
									<label class="mb-1">
										<h6 class="mb-0 text-sm">Upload File</h6>
									</label> 
										<input type="file" name="file"/>
								</div>
								<div class="row mb-3 px-3  mt-3"> <button type="submit" class="btn btn-warning bg-warning text-center">GET A QUOTE</button> </div> 
							</div>
						</div>
					</div> 
					</div>
			</div>  

		@endsection
