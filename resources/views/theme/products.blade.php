@extends('theme.layouts.master')

@section('content')

    <div class="container-fluid bg-white" >

        <div class="mx-auto" style=""> 
            <div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">
                <div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center text-white"> 
                    <h1 class="text-warning" style="padding-top: 80px;font-weight: bold;">{{$sub_category->name}}</h1> 
                    <h4> 
                        Sign Letters & Logos Made to Order 
                    </h4>  
                    <p class="lead d-none">
                        <a class="btn btn bg_green btn_radius" href="#" role="button">
                            <span class="text-white jumbotron_btn">DESIGN A SIGN</span>
                        </a> 
                    </p> 
                </div>
            </div> 
        </div> 
		<div class="row bg-white">

			<div class="col-md-12 p-3 text-center">
			    <h2>{{$sub_category->name}}</h2>
			    <div class="before"></div>
			    <p class="w-50 m-auto font-weight-bold">We make custom signs out of wood, plastic, and metal letters with other durable materials for an affordable, professional look.
			    Elegant signage with beautiful finishes and great durability is what we offer. Give us the details about your vision and we will help with design and pricing.</p>
			</div>  
			<div class="col-md-12">

				<!--        <h2 class="text-center">Recent Articles</h2>-->

				<div class="container-fluid mb-3">

					<div class="row">

						@php

							$count=$sub_category->products->count()

						@endphp

						@if($count>0)

							@foreach($sub_category->products as $r)

								<div class="col-md-6 mt-3 mb-3 col-lg-3 mt-3 mb-3">

									<div class="card zoom border">

										<a style="text-decoration: none " class="text-dark"

											   href="{{route('product_calculator',$r->slug)}}">

										    <img src="{{asset('uploads/products/'.$r->image)}}" class="w-100 rounded-top" style="height:300px">

    										<div class="card-body">

												<h6 class="text-left"> {{$r->name}} </h6>

    											<span class="fa fa-star checked"></span>

    											<span class="fa fa-star checked"></span>

    											<span class="fa fa-star checked"></span>

    											<span class="fa fa-star"></span>

    											<span class="fa fa-star"></span>

    										</div>

										</a>

    									<div class="card-footer">

    										<i class="icons_"><svg class="svg-inline--fa fa-wmi-warr-l fa-w-16 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="wmi-warr-l" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,276h69v52H204V155h52V276z M511.777,427.927l-24.128,83.129c-61.891-27.395-142.505-44.398-231.589-44.398 S86.391,483.661,24.5,512L0.238,428.871C32.769,413.891,71,402.627,111,395.07v-7.765l-44.637-0.944 c-1.889,0-4.961-0.944-5.906-2.834c-1.889-1.889-1.889-3.778-0.944-6.612l13.225-42.51l-42.51-13.225 c-1.889-0.944-3.778-2.834-3.778-4.723c-0.945-2.834-0.945-4.724,0-6.613l26.45-35.896l-35.897-26.45 c-1.889-1.89-2.833-3.778-2.833-5.668c0-2.834,0.946-4.723,2.834-6.612l35.898-26.45l-26.448-35.896 c-0.945-1.89-0.941-3.779,0.003-6.612c0-1.89,1.896-3.779,3.786-3.779l42.525-15.114l-13.195-41.564 c-0.945-1.89-0.885-4.723,1.003-6.612c0.945-1.89,3.898-2.834,5.787-2.834L111,95.41V51.011c0-1.889,0.707-3.778,2.596-5.668 c1.889-0.944,4.485-1.889,6.375-0.944l42.509,13.226l14.169-41.565c0.945-2.834,2.834-3.778,4.724-4.723 c1.889-0.944,4.723,0,6.612,0.944l35.896,25.506l26.45-34.952C251.277,0.944,253.166,0,256,0c1.89,0,4.724,0.944,5.668,2.834 l26.45,34.952l35.896-25.506c1.89-0.944,4.724-1.889,6.612-0.944c1.89,0.944,3.779,1.889,4.724,4.723l14.169,41.565l42.509-13.226 c1.89-0.944,4.724,0,5.668,0.944c1.89,1.89,2.834,3.779,2.834,5.668l0.944,44.399l44.399,0.944c1.889,0,4.723,0.944,5.668,2.834 c1.889,1.89,1.889,4.723,0.944,6.612l-13.225,41.564l42.51,15.114c1.889,0,3.778,1.89,3.778,3.779 c0.945,2.833,0.945,4.723-0.945,6.612L459.1,208.768l35.896,26.45c1.889,1.89,2.834,3.778,2.834,6.612 c0,1.89-0.946,3.778-2.834,5.668l-35.898,26.45l25.503,35.896c1.89,1.89,1.886,3.779,0.941,6.613c0,1.889-1.896,3.778-3.786,4.723 l-42.525,13.225l13.195,42.51c0.945,2.834,0.885,4.724-1.003,6.612c-0.945,1.89-3.898,2.834-5.787,2.834L401,387.306v6.844 C441,402.626,478.317,413.883,511.777,427.927z M191.764,382.583c20.782-0.944,42.509-2.834,64.236-2.834s43.454,1.89,64.236,2.834 c53.845-24.561,91.631-78.405,91.631-140.753c0-85.963-69.904-155.866-155.867-155.866S100.133,155.867,100.133,241.83 C100.133,304.178,137.919,358.022,191.764,382.583z"></path></svg></i>

                                            <i class="icons_"><svg class="svg-inline--fa fa-wmi-usa-flag fa-w-16 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="wmi-usa-flag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M480,300v8c0,8.837-7.163,16-16,16H112c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h352 C472.837,284,480,291.163,480,300z M464,348H112c-8.837,0-16,7.163-16,16v8c0,8.837,7.163,16,16,16h352c8.837,0,16-7.163,16-16v-8 C480,355.163,472.837,348,464,348z M28,80v384c0,8.837,7.163,16,16,16h8c8.837,0,16-7.163,16-16V80c0-8.837-7.163-16-16-16h-8 C35.163,64,28,71.163,28,80z M464,132c8.837,0,16-7.163,16-16v-8c0-8.837-7.163-16-16-16H112c-8.837,0-16,7.163-16,16v136 c0,8.837,7.163,16,16,16h352c8.837,0,16-7.163,16-16v-8c0-8.837-7.163-16-16-16H288v-24h176c8.837,0,16-7.163,16-16v-8 c0-8.837-7.163-16-16-16H288v-24H464z"></path></svg></i>

    									    <i class="icons_"><svg class="svg-inline--fa fa-wmi-rain-cloud fa-w-16 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="wmi-rain-cloud" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M488.321,230.5c0,43-42.22,80-92.883,80H132.833c-59.952,0-108.082-43-108.082-93c0-37,25.332-70,62.485-85 c-0.844-3-0.844-6-0.844-9c0-58,55.729-105,123.281-105c52.352,0,96.261,27,114.837,65c10.132-8,24.487-13,39.686-13 c34.62,0,61.641,24,61.641,53c0,10-3.377,20-9.288,28C457.079,160.5,488.321,192.5,488.321,230.5z M296.679,357.5l-133,133 c-2,2-4,3-7,3c-2,0-4-1-6-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l133-133c1-2,4-3,6-3c3,0,5,1,7,3l14,14c2,2,3,4,3,7 C299.679,353.5,298.679,355.5,296.679,357.5z M186.679,357.5l-46,46c-2,2-4,3-6,3c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7 l46-46c2-2,4-3,7-3c2,0,4,1,6,3l14,14c2,2,3,4,3,7C189.679,353.5,188.679,355.5,186.679,357.5z M100.679,444.5l-47,46c-1,2-4,3-6,3 c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l46-46c2-2,4-3,7-3c2,0,5,1,6,3l15,14c1,2,2,4,2,6 C102.679,440.5,101.679,442.5,100.679,444.5z M406.679,357.5l-46,46c-2,2-5,3-7,3s-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7l46-46 c2-2,5-3,7-3s5,1,7,3l14,14c2,2,3,4,3,7C409.679,353.5,408.679,355.5,406.679,357.5z M319.679,444.5l-46,46c-2,2-5,3-7,3s-5-1-6-3 l-15-14c-1-2-3-4-3-7c0-2,2-4,3-6l47-46c1-2,4-3,6-3s5,1,7,3l14,14c2,2,3,4,3,6C322.679,440.5,321.679,442.5,319.679,444.5z"></path></svg></i>

                                            <i class="icons_"><svg class="svg-inline--fa fa-wmi-recycle-alt fa-w-16 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="wmi-recycle-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M299.009,181l35.715-20.404l-42.858-73.469l-69.39,120.412l-102.045-59.189l55.104-93.887 C183.698,39.155,199.005,32,218.394,32h158.169c12.245,0,20.409,4.093,26.532,13.277l32.654,56.135l35.715-20.411L414.319,181 H299.009z M170.433,297.465l35.715,20.464L151.044,219H33.692l35.716,19.271l-27.552,47.902c-2.041,4.082-3.062,10.175-3.062,14.257 c0,5.103,1.021,10.189,3.062,14.271l80.615,137.753C132.676,469.803,145.941,480,164.31,480H273V368H128.927L170.433,297.465z  M536.772,276.931l-54.084-93.881L380.644,241.34L453.645,368H365v-33.27l-59.186,89.145L365,512v-32h62.585 c11.225,0,21.43-6.123,26.531-14.286l80.615-138.781C543.915,309.585,544.937,292.238,536.772,276.931z"></path></svg></i>

    									</div>



									</div>

								</div>

							@endforeach

						@else

							<span class="py-5">Sorry! No Products avaialble for this category</span>

						@endif

					</div>

				</div>

			</div>

		</div>

    </div>

@endsection



