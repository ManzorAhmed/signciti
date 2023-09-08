		<!DOCTYPE html>
		<?php
		$calculator_mode = $calculator_mode;
		?>
		<html>
		<head>
			@php use App\Setting;$setting =Setting::pluck('value','name')->toArray() @endphp
			<meta charset="utf-8">



			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



			<title>SignCiti</title>



			<link rel="icon" type="image/png" sizes="16x16"



				  href="@isset($setting['favicon']){{ asset('uploads/'.$setting['favicon']) }}@endisset">



			<link rel="stylesheet" type="text/css"



				  href="{{asset('front_end/calculator/css/github.css')}}">



			<link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/jquery.fontselect.css')}}">



			<link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/fontawesome/css/all.css')}}">



			<link rel="stylesheet" href="{{asset('front_end/calculator/css/bootstrap.min.css')}}">



			<script src="{{asset('front_end/calculator/js/jquery.min.js')}}"></script>



			<script src="{{asset('front_end/calculator/js/bootstrap.min.js')}}"></script>



			<script src="{{asset('front_end/calculator/js/all.js')}}" crossorigin="anonymous"></script>



			<script src="{{asset('front_end/calculator/js/popper.min.js')}}"></script>



			<link rel="stylesheet" href="{{asset('front_end/css/style.css')}}">



			<link rel="stylesheet" href="{{asset('front_end/calculator/css/calculator_style.css')}}">



			<!-- For Internet Explorer 11: include intersection observer polyfill



			<script src="https://cdn.jsdelivr.net/npm/intersection-observer/intersection-observer.js"></script>



			-->



			<link rel="stylesheet" href="{{asset('front_end/calculator/js/highlight.min.js')}}">



			{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}



			<script src="{{asset('front_end/calculator/jquery.fontselect.js')}}"></script>



			<script src="{{asset('js/loadingoverlay.min.js')}}"></script>



			<script>

				var apr_width = 0;

				var sec_curnt_font_val1 = '';

				function applyFont(element, fontSpec) {



					if (fontSpec != 'Other Font') {



						apr_width = 0;



						if (!fontSpec) {



							// Font was cleared



							console.log('You cleared font');





							$(element).css({



								fontFamily: 'inherit',



								fontWeight: 'normal',



								fontStyle: 'normal'



							});



							return;



						}



						console.log('You selected font: ' + fontSpec);





						// Split font into family and weight/style



						var tmp = fontSpec.split(':'),



							family = tmp[0],



							variant = tmp[1] || '400',



							weight = parseInt(variant, 10),



							italic = /i$/.test(variant);





						// Apply selected font to element



						$(element).css({



							fontFamily: "'" + family + "'",



							fontWeight: weight,



							fontStyle: italic ? 'italic' : 'normal'



						});



					} else {



						fontSpec = 'Inter';



						console.log('You selected font: ' + fontSpec);



						// Split font into family and weight/style



						var tmp = fontSpec.split(':'),



							family = tmp[0],



							variant = tmp[1] || '400',



							weight = parseInt(variant, 10),



							italic = /i$/.test(variant);





						// Apply selected font to element



						$(element).css({



							fontFamily: "'" + family + "'",



							fontWeight: weight,



							fontStyle: italic ? 'italic' : 'normal'



						});



					}



					$(function () {



						// Highlight code samples:



						hljs.configure({



							tabReplace: '   ', // 3 spaces



						});



						$('pre code').each(function () {



							hljs.highlightBlock(this);



						});





					});



				}



			</script>



		</head>



		<body>



		<header class="section-header">



		@include('theme.partials.header')



		@include('theme.partials.navbar')



		<!-- Example 3 -->



		</header>



		<!-- Example 3 -->

        <form method="post" action="{{route('product.add_cart')}}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}"/>

		    <div class="container mt-4">



			<div class="row">



				<div class="col-md-6">



					@include('theme.partials.carousal')



				</div>



				<div class="col-md-6 pt-2 p-2">

					<div class="col-md-12 p-2 text-center">

						<div class="card-body">



							<h3>{{$product->name}}</h3>



							<span class="fa fa-star checked"></span>



							<span class="fa fa-star checked"></span>



							<span class="fa fa-star checked"></span>



							<span class="fa fa-star"></span>



							<span class="fa fa-star"></span>



						</div>



					</div>



					<input type="hidden" value="{{$product->id}}" class="prod_id">



					<div class="border">



						<div class="section_1">



							<h3><p id="sample1" class="p-3 text-center border" style="font-size: 39px;overflow: auto;">Enter



									Your Text</p></h3>



							<div class="col-md-12 align-self-center p-2">



								<textarea type="text" Placeholder="Enter Your Text" id="fname1" name="fname1"



										  onkeyup="gettext1(this.id)" class="form-control onchange_fun"></textarea>



							</div>



							<div class="d-lg-flex border-bottom border-top p-2">



								<div class="col-lg-3 text-lg-right align-self-center p-md-2">



									Choose font



								</div>



								<div class="col-lg-8 align-self-center">



									<div class="example">



										<div class="">



											<input id="font1" type="text" class="onchange_fun">



											<script>



												$('#font1').fontselect({



													systemFonts: true,



													localFonts: false,



													//localFonts: ['Basic-Regular', 'Typewriter-DemiBold', 'Ribeye','Piedra', 'Other Font'],



													googleFonts: ['Ribeye', 'Piedra'],



													systemFonts: ['Verdana', 'Basic-Regular', 'TypewriterDemi-Bold', 'ActionMan', 'AlegreyaSCBlack',



														'AlegreyaSC-Regular', 'astounder-squared-lc-bb', 'BioRhyme-Bold', 'Calligrapher-font', 'BioRhyme-ExtraBold',



														'AlegreyaSC-Bold', 'Anton-Regular', 'bank-gothic', 'Bubble', 'CalligraphyUnicase', 'Canciller-Demibold',



														'HOBON', 'ClarendonCondensedBold', 'Clarendon-Regular', 'basicsanssf-bold', 'Bauer', 'ClarendonTMed',



														'CloisterBlack', 'CocoBiker-Regular-Trial', 'CrimsonText-Bold', 'CrimsonText-Regular', 'D-DIN',



														'D-DINCondensed-Bold', 'D-DINExp-Bold', 'GiuliaDEMO-Bold', 'GOTHICB', 'LibreBodoni-Bold', 'LibreBodoni-BoldItalic',



														'RobotoSlab-Regular', 'Typewriter-Medium', 'Other Font'],



													localFontsUrl: 'fonts/' // End with a slash!





												}).on('change', function () {



													applyFont(".sple1", this.value);



													var count = $('.sple1').text().replace(/\s+/g, '').length;



													$(".w_count1").text(count);



													sec_curnt_font_val1 = this.value;



												});



											</script>



										</div>



									</div>



								</div>



							</div>



							<div class="other_font1">

								<div class="d-lg-flex border-bottom border-top p-2">

									<div class="col-lg-3 text-lg-right align-self-center p-md-2">

										Select Font

									</div>

									<div class="col-lg-8 align-self-center">

										<input id="other_font_val" type="text" class="form-control" placeholder="Select other font"/>

									</div>

								</div>

							</div>

							<div class="d-lg-flex border-bottom border-top p-2">

								<div class="col-lg-3 text-lg-right align-self-center p-md-2">

									Height

								</div>

								<div class="col-lg-8 align-self-center">

									<select id="height1" class="form-control onchange_fun" name="height1">

										<option disabled selected>Choose Height...</option>

										@foreach($height as $key=>$value)

											<option value="{{$value}}">{{$value}}</option>

										@endforeach

									</select>

								</div>

							</div>

							<?php if($calculator_mode == 1){ ?>

								<div class="d-lg-flex border-bottom border-top p-2">

									<div class="col-lg-3 text-lg-right align-self-center p-md-2">

										Material

									</div>

									<div class="col-lg-8 align-self-center">

										<select id="material1" class="form-control onchange_fun" name="material1">

											<option disabled selected>Choose Material...</option>

											<option value="Vinyl (One Time Use)">Vinyl (One Time Use)</option>

											<option value="Low Tack Vinyl (Slightly Reusable)">Low Tack Vinyl (Slightly Reusable)</option>

											<option value="10 Mil Mylar (Reusable)">10 Mil Mylar (Reusable)</option>

											<option value="Galvanized Steel (Reusable)">Galvanized Steel (Reusable)</option>

											<option value="Aluminum (Reusable)">Aluminum (Reusable)</option>

										</select>

									</div>

								</div>

							<?php } ?>

						</div>

						<div class="d-lg-flex border-bottom border-top p-3">

							<div class="col-md-12 text-center align-self-center">

								<b>Approx. Width:</b> <span class="apr_width1">Enter text and select a Height to see Approx. Width.</span>

							</div>

						</div>

						<div class="w_c_p_section1">



							<div class="count_section1">



								<div class="d-lg-flex border-bottom border-top p-2">



									<div class="col-lg-6 align-self-center p-md-2">



										Total Letter Count: <span class="w_count1"></span>



									</div>



									<div class="col-lg-6 align-self-end">



										<button type="button"



												class="btn btn-light btn-block bg-light border-light add_new_section"



												id="add_new_section" onclick="add_new_section()"><i class="fas fa-plus"></i> Add



											New Line



										</button>



									</div>



								</div>



							</div>



							<div class="comments_section1">



								<div class="col-md-12">



									<div class="form-check-inline p-2">



										<label class="form-check-label">



											<input type="checkbox" class="form-check-input" id="comments1" name="comments1">Comments



										</label>



									</div>



								</div>



							</div>



							<div class="textarea_section1">



								<div class="col-md-12 p-2">



									<textarea type="text" class="form-control" rows="7" id="text_area1" name="text_area1"



											  value=""></textarea>



								</div>



							</div>



							<div class="price_section1">



								<div class="d-lg-flex border-bottom border-top p-2">



									<div class="col-lg-4 align-self-center">



										<input type="hidden" name="price1" class="price1 text-center"/>



										Amount: <b>$<span class="price1">6.20</span></b>



									</div>



									<div class="col-lg-3 align-self-center d-flex p-md-2 p-lg-0">

										<span class="pt-2 mr-2 ml-md-2  ml-lg-0">QTY: </span> <input type="number" id="qty1"

																					class="form-control w-50 onchange_fun"

																					min="1" value="1">

									</div>



									<div class="col-lg-5 align-self-end">



										<button type="submit" class="btn font-weight-bold bg-danger border-danger btn-block  text-white">
                                            ADD TO CART
										</button>



									</div>



								</div>



							</div>



						</div>



						<div id="new_section" class="isempty"></div>



						<div class="col-md-12 text-center align-self-center p-3">



							<p>Manufacturing Time: Please Select Options</p>



						</div>



						<input type="hidden" name="total_count" class="total_count"/>



					</div>



				</div>

			</div>

			<section class="block block-bordered block-feature bg-gradient-gray-bl full-width">

				<div class="container-c">

					<div class="row justify-content-around align-items-center">

						<div class="col-12 col-sm-6 pb-5 pb-sm-0">

							<div class="" style="height: 0; padding-bottom: 77%">

								<img class="lazyfade in" style="width: 100%" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-ampersand-photo.png" src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-ampersand-photo.png">

							</div>

						</div>

						<div class="col-12 col-sm-6 col-lg-5 text-center text-md-left section-intro">

							<div class="px-3">

								<h3 class="mb-3 display-3">MADE TO ORDER</h3>

								<p class="lead">Our metal letters are custom made to your exact specifications.Your aluminum letters can be customized in a variety of sizes and fonts. We then cut, sand, and clear coat them exclusively for you.</p>

								<p class="small"><i>* Font shown is Trajan Bold</i></p>

							</div>

						</div>

					</div>

				</div>

			</section>

			<section class="block py-sm-0 block-bordered block-feature bg-gradient-gray-bl full-width text-sm-white bg-xs-none block-img-bg lazyfadebg in" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-pano.jpg" style="background-position: center center; background-size: cover; background-repeat: no-repeat; position: relative; overflow: hidden; background-image: url(&quot;https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-pano.jpg&quot;);">

				<div class="container-c">

					<div class="row justify-content-around align-items-stretch">

						<div class="d-sm-none col-12 col-sm-6 justify-content-end pb-5 pt-0">

							<div class="" style="height: 0; padding-bottom: 87.5%">

								<img class="lazyfade rounded" style="width: 100%" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-stand.jpg">

							</div>

						</div>

						<div class="d-none d-sm-block col-12 col-sm-6 justify-content-end py-7">

							<div class="" style="height: 0; padding-bottom: 87.5%">

							</div>

						</div>

						<div class="col-12 col-sm-6 col-lg-5 d-flex justify-content-center text-center text-md-left section-intro flex-column">

							<div class="px-3 py-0 py-sm-7">

								<h3 class="mb-3 display-3 text-white" style="text-align: Collapse;white-space: pre;">WHY MADE OF ALUMINUM?</h3>

								<p class="lead text-white">The finished Aluminium is attractive and blends with any décor.You can sand it to a satin finish or paint it in a variety of colors.</p>

								<p class=" text-white">Aluminium looks great and is extremely durable. Its toughness enables it to last a lifetime.</p>

							</div>

						</div>

					</div>

				</div>

			</section>

			<div class="row mt-md-3">

				<div class="col-md-12">

					<section class="block block-bordered block-feature bg-gradient-gray-bl">

						<div class="container-c">

							<div class="row justify-content-around align-items-center">

								<div class="col-12 col-sm-11">

									<div class="px-3 text-center">

										<h3 class="mb-3 display-3">HOW BIG IS A LETTER?</h3>

										<p class="lead">Letter sizing is complicated. In most fonts, different letters have different heights, especially lowercase letters.</p>

										<p class="lead">We size everything proportionally to an uppercase “B”. Because of this, some letters may be shorter or taller than the height you select.</p>



									</div>



								</div>



								<div class="col-12 col-sm-10">

									<div class="" style="height: 0; padding-bottom: 34.9%;">

										 <img style="width: 100%;" class="p lazyfade in" data-src="{{asset('front_end/images/scale.jpeg')}}" src="{{asset('front_end/images/scale.jpeg')}}">



									</div>



								</div>



								<div class="col-12 col-sm-8 col-md-6">



									<div class="px-3 text-center">



										<p>These letters are both sized to 4 inches.</p>



										<p class="small"><i>* Font shown is Clarendon Bold.</i></p>



									</div>



								</div>



							</div>



						</div>



					</section>



					<div class="tab-acc-combo product-detail-tabs my-6">



						<h4 class="section-header display-3 mb-4 text-center">Product Details</h4>



						<div class="nav nav-tabgroup justify-content-center" role="tablist">



							<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-tabcontent"



							   role="tab" aria-controls="description-tabcontent" aria-selected="true">Description</a><a



								class="nav-link" id="pricing-tab" data-toggle="tab" href="#pricing-tabcontent" role="tab"



								aria-controls="pricing-tabcontent" aria-selected="false">Pricing</a></div>



						<div class="tab-content card card-acc-combo"><a class="card-header btn-acc superactive"



																		data-acctarget="#description-tab"



																		href="#description-tabcontent">Description</a>



							<div class="card-body tab-pane active show" id="description-tabcontent" role="tabpanel"



								 aria-labelledby="description-tab">



								<div class="row">



									<div itemprop="description"



										 class="col-sm-8 std long-description article-content article-grid"



										 style="font-size: .9rem;">



										<p>Aluminum Letters are far and away from the most popular metal signs we make. Light reflects off the vertical grain on the face of the metal letter, creating a shimmering effect that appears to glow from certain angles. Brushed metal letters complement any decor, from upscale to rustic to urban</p>

										<p>Metal signs look professional, will not rust or tarnish, and look great on any facade.</p>

										<p>Outdoor signage requires mounting studs and templates. A paper template outlines the location of the studs and the lettering's alignment and spacing. Installing mounting studs are made of threaded prongs that screw into the back of the letter, are coated with construction grade adhesive, and are drilled into the wall. Spacers can be used to offset the metal sign letter from the wall, thereby creating more dimension. Any mounting option can be used indoors, such as adhesive or stud mounting.</p>

									</div>



									<div class="col-sm-4 std short-description">



										<div class="card" style="border: 1px solid rgba(0,0,0,.125);">



											<div class="card-body" style="font-size: .9rem;">



												<ul>



													<li>Best selling Aluminum Letters</li>



													<li>Brushed vertical grain catches light beautifully</li>



													<li>Fits in with any style</li>



													<li>Colors and finishes may vary from your monitor</li>



													<li>Contact us for samples or to verify sizing</li>



													<li>Clear coat finish</li>

													<li>1/8" thick letters 3" and smaller cannot have Studs</li>



												</ul>



											</div>



											<div class="card-footer text-muted">



												<ul class="fa-ul">



													<li><span class="attribute-icons"><span class="fa-li"><svg



																	class="svg-inline--fa fa-wmi-warr-l fa-w-16"



																	aria-hidden="true" data-prefix="fas" data-icon="wmi-warr-l"



																	role="img" xmlns="http://www.w3.org/2000/svg"



																	viewBox="0 0 512 512" data-fa-i2svg=""><path



																		fill="currentColor"



																		d="M256,276h69v52H204V155h52V276z M511.777,427.927l-24.128,83.129c-61.891-27.395-142.505-44.398-231.589-44.398 S86.391,483.661,24.5,512L0.238,428.871C32.769,413.891,71,402.627,111,395.07v-7.765l-44.637-0.944 c-1.889,0-4.961-0.944-5.906-2.834c-1.889-1.889-1.889-3.778-0.944-6.612l13.225-42.51l-42.51-13.225 c-1.889-0.944-3.778-2.834-3.778-4.723c-0.945-2.834-0.945-4.724,0-6.613l26.45-35.896l-35.897-26.45 c-1.889-1.89-2.833-3.778-2.833-5.668c0-2.834,0.946-4.723,2.834-6.612l35.898-26.45l-26.448-35.896 c-0.945-1.89-0.941-3.779,0.003-6.612c0-1.89,1.896-3.779,3.786-3.779l42.525-15.114l-13.195-41.564 c-0.945-1.89-0.885-4.723,1.003-6.612c0.945-1.89,3.898-2.834,5.787-2.834L111,95.41V51.011c0-1.889,0.707-3.778,2.596-5.668 c1.889-0.944,4.485-1.889,6.375-0.944l42.509,13.226l14.169-41.565c0.945-2.834,2.834-3.778,4.724-4.723 c1.889-0.944,4.723,0,6.612,0.944l35.896,25.506l26.45-34.952C251.277,0.944,253.166,0,256,0c1.89,0,4.724,0.944,5.668,2.834 l26.45,34.952l35.896-25.506c1.89-0.944,4.724-1.889,6.612-0.944c1.89,0.944,3.779,1.889,4.724,4.723l14.169,41.565l42.509-13.226 c1.89-0.944,4.724,0,5.668,0.944c1.89,1.89,2.834,3.779,2.834,5.668l0.944,44.399l44.399,0.944c1.889,0,4.723,0.944,5.668,2.834 c1.889,1.89,1.889,4.723,0.944,6.612l-13.225,41.564l42.51,15.114c1.889,0,3.778,1.89,3.778,3.779 c0.945,2.833,0.945,4.723-0.945,6.612L459.1,208.768l35.896,26.45c1.889,1.89,2.834,3.778,2.834,6.612 c0,1.89-0.946,3.778-2.834,5.668l-35.898,26.45l25.503,35.896c1.89,1.89,1.886,3.779,0.941,6.613c0,1.889-1.896,3.778-3.786,4.723 l-42.525,13.225l13.195,42.51c0.945,2.834,0.885,4.724-1.003,6.612c-0.945,1.89-3.898,2.834-5.787,2.834L401,387.306v6.844 C441,402.626,478.317,413.883,511.777,427.927z M191.764,382.583c20.782-0.944,42.509-2.834,64.236-2.834s43.454,1.89,64.236,2.834 c53.845-24.561,91.631-78.405,91.631-140.753c0-85.963-69.904-155.866-155.867-155.866S100.133,155.867,100.133,241.83 C100.133,304.178,137.919,358.022,191.764,382.583z"></path></svg>



																<!-- <i class="fas fa-wmi-warr-l"></i> --></span></span><span



															class="fontsm">Lifetime Guarantee</span></li>



													<li><span class="attribute-icons"><span class="fa-li"><svg



																	class="svg-inline--fa fa-wmi-rain-cloud fa-w-16"



																	aria-hidden="true" data-prefix="fas"



																	data-icon="wmi-rain-cloud" role="img"



																	xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"



																	data-fa-i2svg=""><path fill="currentColor"



																						   d="M488.321,230.5c0,43-42.22,80-92.883,80H132.833c-59.952,0-108.082-43-108.082-93c0-37,25.332-70,62.485-85 c-0.844-3-0.844-6-0.844-9c0-58,55.729-105,123.281-105c52.352,0,96.261,27,114.837,65c10.132-8,24.487-13,39.686-13 c34.62,0,61.641,24,61.641,53c0,10-3.377,20-9.288,28C457.079,160.5,488.321,192.5,488.321,230.5z M296.679,357.5l-133,133 c-2,2-4,3-7,3c-2,0-4-1-6-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l133-133c1-2,4-3,6-3c3,0,5,1,7,3l14,14c2,2,3,4,3,7 C299.679,353.5,298.679,355.5,296.679,357.5z M186.679,357.5l-46,46c-2,2-4,3-6,3c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7 l46-46c2-2,4-3,7-3c2,0,4,1,6,3l14,14c2,2,3,4,3,7C189.679,353.5,188.679,355.5,186.679,357.5z M100.679,444.5l-47,46c-1,2-4,3-6,3 c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l46-46c2-2,4-3,7-3c2,0,5,1,6,3l15,14c1,2,2,4,2,6 C102.679,440.5,101.679,442.5,100.679,444.5z M406.679,357.5l-46,46c-2,2-5,3-7,3s-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7l46-46 c2-2,5-3,7-3s5,1,7,3l14,14c2,2,3,4,3,7C409.679,353.5,408.679,355.5,406.679,357.5z M319.679,444.5l-46,46c-2,2-5,3-7,3s-5-1-6-3 l-15-14c-1-2-3-4-3-7c0-2,2-4,3-6l47-46c1-2,4-3,6-3s5,1,7,3l14,14c2,2,3,4,3,6C322.679,440.5,321.679,442.5,319.679,444.5z"></path></svg>



																<!-- <i class="fas fa-wmi-rain-cloud "></i> --></span></span><span



															class="fontsm">Outdoor Rated</span></li>



													<li><span class="attribute-icons"><span class="fa-li"><svg



																	class="svg-inline--fa fa-wmi-recycle-alt fa-w-18"



																	aria-hidden="true" data-prefix="fas"



																	data-icon="wmi-recycle-alt" role="img"



																	xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"



																	data-fa-i2svg=""><path fill="currentColor"



																						   d="M299.009,181l35.715-20.404l-42.858-73.469l-69.39,120.412l-102.045-59.189l55.104-93.887 C183.698,39.155,199.005,32,218.394,32h158.169c12.245,0,20.409,4.093,26.532,13.277l32.654,56.135l35.715-20.411L414.319,181 H299.009z M170.433,297.465l35.715,20.464L151.044,219H33.692l35.716,19.271l-27.552,47.902c-2.041,4.082-3.062,10.175-3.062,14.257 c0,5.103,1.021,10.189,3.062,14.271l80.615,137.753C132.676,469.803,145.941,480,164.31,480H273V368H128.927L170.433,297.465z  M536.772,276.931l-54.084-93.881L380.644,241.34L453.645,368H365v-33.27l-59.186,89.145L365,512v-32h62.585 c11.225,0,21.43-6.123,26.531-14.286l80.615-138.781C543.915,309.585,544.937,292.238,536.772,276.931z"></path></svg>



																<!-- <i class="fas fa-wmi-recycle-alt "></i> --></span></span><span



															class="fontsm">60-80% Recycled aluminum (20-35% Post-Consumer, 40-45% Pre-Consumer)--100% Scrap is Recycled</span>



													</li>



													<li><span class="attribute-icons"><span class="fa-li"><svg



																	class="svg-inline--fa fa-wmi-usa-flag fa-w-16"



																	aria-hidden="true" data-prefix="fas"



																	data-icon="wmi-usa-flag" role="img"



																	xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"



																	data-fa-i2svg=""><path fill="currentColor"



																						   d="M480,300v8c0,8.837-7.163,16-16,16H112c-8.837,0-16-7.163-16-16v-8c0-8.837,7.163-16,16-16h352 C472.837,284,480,291.163,480,300z M464,348H112c-8.837,0-16,7.163-16,16v8c0,8.837,7.163,16,16,16h352c8.837,0,16-7.163,16-16v-8 C480,355.163,472.837,348,464,348z M28,80v384c0,8.837,7.163,16,16,16h8c8.837,0,16-7.163,16-16V80c0-8.837-7.163-16-16-16h-8 C35.163,64,28,71.163,28,80z M464,132c8.837,0,16-7.163,16-16v-8c0-8.837-7.163-16-16-16H112c-8.837,0-16,7.163-16,16v136 c0,8.837,7.163,16,16,16h352c8.837,0,16-7.163,16-16v-8c0-8.837-7.163-16-16-16H288v-24h176c8.837,0,16-7.163,16-16v-8 c0-8.837-7.163-16-16-16H288v-24H464z"></path></svg>



																<!-- <i class="fas fa-wmi-usa-flag "></i> --></span></span><span



															class="fontsm">Made in the USA</span></li>



												</ul>



											</div>



										</div>



									</div>



								</div>



							</div>



							<a class="card-header btn-acc" data-acctarget="#pricing-tab" href="#pricing-tabcontent">Pricing</a>



							<div class="card-body tab-pane " id="pricing-tabcontent" role="tabpanel"



								 aria-labelledby="pricing-tab">



								<div>



									<div class="mb-6 product-main-content">



										<ul class="addOptions">



											<li><i class="icon-minus" title="Price Decrease"></i> Characters



												<span class="showCharacters">,.;'"-</span> are free



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												Flush Mounting Hardware is $4.50 more per letter



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												Projected Spacer Mounting Hardware is $4.50 more per letter



											</li>



											<li><i class="icon-plus" title="Price Increase">



												</i> Projected Jam Nut Mounting Hardware is $4.50 more per letter



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												Corrugated Mounting Mounting Hardware is $4.50 more per letter



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												Flat Metal Wall Mounting Hardware is $4.50 more per letter



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												Painted Finish is 10% more



											</li>



											<li><i class="icon-plus" title="Price Increase"></i> Polished Finish is 50% more



											</li>



											<li>



												<i class="icon-plus" title="Price Increase"></i> Custom Color Color is $20.00



												more



											</li>



											<li><i class="icon-plus" title="Price Increase"></i>



												High Gloss Finish is 10% more



											</li>



											<li><i class="icon-plus" title="Price Increase"></i> Matte Finish is 10% more</li>



											<li><i class="icon-plus"



												   title="Price Increase"></i> Paper Template is $1.00 more per letter



											</li>



										</ul>



									</div>





								</div>



								<script>



									$j('.primaryDimValue').click(function () {



										$j(this).next('.primaryDimTable').toggle();



										if ($j(this).children('.actionCue').html() == '[open]') {



											$j(this).children('.actionCue').html('[close]')



										} else {



											$j(this).children('.actionCue').html('[open]')



										}



									});



								</script>



							</div>



						</div>

					</div>

				</div>

			</div>

			<div class="row mt-md-3">

				<div class="col-md-12">

					@include('theme.partials.table')

				</div>

			</div>

		</div>
        </form>




        <!-- /Example 3 -->



		@include('theme.partials.footer')



		<!-- Example 3 -->



		<script>



			var status_count = 1;



			var add_new_section_count = 1;



			var show_section = 0;



			var pr_count1 = 0;



			var m_hcount1 = 0;



			var last_price = 0;



			var current_price = 0;



			var btn_count = 0;



			var final_apr_width = 1;



			//find previous value of selection box





			$(".onchange_fun").change(function ()

			{



				var height1 = $("#height1").val();



				var thickness1 = $("#thickness1").val();



				var paint1 = $("#paint").val();



				var finish1 = $("#finish1").val();



				var mounting_hardware1 = $("#mounting_hardware1").val();



				var paper_template1 = $("#paper_template1").val();



				var price1 = $(".price1").text();



				var check = $(this).attr("id");



				// alert(check);



				var cout_val1 = $(".w_count1").text();



				var qty1 = $("#qty1").val();



				//////////////



				if (height1 != '') {



					var resp = 1;



					var product_id = $('.prod_id').val();



					$('.price').LoadingOverlay("show");



					$.ajax({



						url: '{{route('product.price')}}',



						data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},



						type: "GET",



						success: function (price) {

							if(price != '')

							{

								cout_val1 = $(".w_count1").text();



								cout_val1 = parseFloat(cout_val1);



								cout_val1 = (+((cout_val1) * price.price)*finish1/100);



								cout_val1 = (cout_val1.toFixed(2));



								$(".price1").text(" ");



								$(".price1").text(cout_val1);



								$(".price1").val(cout_val1);



							}

						}



					});



					$('.price').LoadingOverlay("hide");



				}





				////////////// end ////////////////////////////////////////////



				// new section added//



				if (sec_curnt_font_val1 != '' && height1 != '') {



					$(".other_font1").hide();



					var textarea = $("#fname1").val();



					if (textarea == textarea.toUpperCase()) {



						apr_width = 1.1;



					} else {



						$.ajax({



							data: {'sec_curnt_font_val1': sec_curnt_font_val1},



							type: "GET",



							success: function (apr_width) {



								apr_width = apr_width;



							}



						});



					}



					final_apr_width = 1;



					$(".apr_width1").text("");



					cout_val1 = $(".w_count1").text();



					cout_val1 = parseInt(cout_val1);



					final_apr_width = height1 * apr_width;



					final_apr_width = final_apr_width * cout_val1;



					$(".apr_width1").text(final_apr_width.toFixed(1));



				} else if (sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '') {



					$(".other_font1").show();



					final_apr_width = 1;



					$(".apr_width1").text("Enter text and select a Height to see Approx. Width.");



				}



				if (sec_curnt_font_val1 == 'Other Font') {



					$(".other_font1").show();



				} else {



					$(".other_font1").hide();



				}



				// new section added//



				if (sec_curnt_font_val1 == 'Other Font') {



					$(".other_font1").show();



				} else {



					$(".other_font1").hide();



				}



				$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);



				if (price1 == "NaN") {



					$(".price1").text("6.20");



					$(".price1").val(6.20);



				}



				$('.sple1').css("color", $("#color1").val());



			});











			var count = $('.sple1').text().replace(/\s+/g, '').length;



			$(".w_count1").text(count);



			$('#comments1').click(function () {



				if ($('#comments1').is(":checked")) {



					$(".textarea_section1").show();



				} else {



					$(".textarea_section1").hide();



				}



			});





			//////////////////////////////////////////////////////////////////////////////add_new_line code start//////////////////////////////////////////////////////////////////////////////////////////////////////////



			function add_new_section() {



				if (btn_count <= 2) {



					add_new_section_count += 1;



					btn_count += 1;



					var product_id = $('.prod_id').val();



					$('.price').LoadingOverlay("show");



					$.ajax({



						url: '{{route('product.new_section')}}',



						data: {

							'product_id': product_id,

							'count': add_new_section_count,

							'calculator_mode': <?php echo $calculator_mode ?>},



						type: "GET",



						success: function (data) {



							$("#new_section").append(data);



						}



					});



					$('.price').LoadingOverlay("hide");





					show_section += 1;



					$(".w_c_p_section1").hide();



					$("#new_section").children().last().find(".sec").hide();



					$(".w_c_p_section" + show_section).hide();



					$(".w_c_p_section" + add_new_section_count).show();



				} else {



					$(".add_new_section").hide();



				}



			}





			//////////////////////////////////////////////////////////////////////////////add_new_line code end//////////////////////////////////////////////////////////////////////////////////////////////////////////





			function onchange_fun_sec2(id)

			{



				var height2 = $("#height" + status_count).val();



				var thickness2 = $("#thickness" + status_count).val();



				var mounting_hardware2 = $("#mounting_hardware" + status_count).val();



				var paint2 = $("#paint" + status_count).val();



				var finish2 = $("#finish" + status_count).val();



				var paper_template2 = $("#paper_template" + status_count).val();



				var price2 = $(".price" + status_count).text();



				var cout_val2 = $(".w_count" + status_count).text();



				var qty2 = $("#qty" + status_count).val();



				var check = id;



				// status_count = id.slice(-1);  //get the last value of id which will be in numeric form



				//alert(status_count);



				// status_count = parseInt(status_count);



				status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form



				status_count = parseInt(status_count);

				if (current_font_val == 'Other Font') {



					$(".other_font" + status_count).show();



				} else {



					$(".other_font" + status_count).hide();



				}



				var fname_txt = $('#fname' + status_count).text();



				////////////// end ////////////////////////////////////////////





				if (height2 != '' && thickness2 != '')

				{



					var resp = 1;



					var product_id = $('.prod_id').val();



					$('.price').LoadingOverlay("show");



					$.ajax({



						url: '{{route('product.price')}}',



						data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},



						type: "GET",



						success: function (price) {

							if(price != '')

							{

								cout_val2 = $(".w_count" + status_count).text();



								qty2 = $("#qty" + status_count).val();



								cout_val2 = parseFloat(cout_val2);



								cout_val2 = (+((cout_val2) * price.price)*finish2/100);



								cout_val2 = (cout_val2.toFixed(2));



								$(".price" + status_count).text(" ");



								$(".price" + status_count).text(cout_val2);



								$(".price" + status_count).val(cout_val2);



							}

						}



					});



					$('.price').LoadingOverlay("hide");



				}





				var price2 = $(".price" + status_count + "").text();



				if (price2 == "NaN") {



					$(".price" + status_count).text("6.20");



					$(".price" + status_count).val(6.20);





				}



				if (current_font_val != '' && height2 != '') {



					$(".other_font" + status_count).hide();



					var textarea = $("#fname" + status_count).val();



					if (textarea == textarea.toUpperCase()) {



						apr_width = 1.1;



					} else {



						$.ajax({



							data: {'sec_curnt_font_val1': current_font_val},



							type: "GET",



							success: function (apr_width) {



								apr_width = apr_width;



							}



						});



					}



					final_apr_width = 1;



					$(".apr_width" + status_count).text("");



					cout_val2 = $(".w_count" + status_count).text();



					cout_val2 = parseInt(cout_val2);



					final_apr_width = height2 * apr_width;



					final_apr_width = final_apr_width + cout_val2;



					$(".apr_width" + status_count).text(final_apr_width.toFixed(1));



				} else if (current_font_val != '' && current_font_val == "Other Font" && height2 != '') {



					$(".other_font" + status_count).show();



					final_apr_width = 1;



					$(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



				}



				//  new section added//



				$('.fname' + status_count).css("color", $("#color" + status_count).val());



			}









			///////////////////////////////////////////////////////////////////////////////////////////////  end ////////////////////////////////////////////////////////////////////////////////////////////////////



			function delete_section(id) {



				// $('#new_section').children().last().remove();



				$(".add_new_section").show();



				$('.' + id).remove();



				btn_count -= 1;



				$("#new_section").children().last().find(".sec").show();



				if ($('.isempty').length == 1) {



					$('.w_c_p_section1').show();



				}



				var delete_section = id;



				// $("."+id).removeClass("sec");



				var hide_sec = $('.sec').length;



				status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form



				// alert(status_count);



				// $("#new_section").is(':empty');



				status_count = parseInt(status_count);



				$(".fname" + status_count).html("");



				var count = $('.sple1').text().replace(/\s+/g, '').length;



				$(".w_count1").text(count);



				var count2 = $('.fname' + status_count).text().replace(/\s+/g, '').length;



				$(".w_count" + status_count).text(count2);



				current_price = $('.price1').text();



				$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);



			}





			function gettext1(id)

			{



				var price1 = $(".price1").text();



				var gettext = $("#" + id).val();



				var txt = $('#sample1').text();



				txt = txt.substr(txt.length - 4); // new code added



				var height1 = $("#height1").val();



				var thickness1 = $("#thickness1").val();



				var finish1 = $("#finish1").val();



				var mounting_hardware1 = $("#mounting_hardware1").val();



				var cout_val1 = $(".w_count1").text();



				var qty1 = $("#qty1").val();



				if (txt == "Text") { // new code added



					$("#sample1").html("");



					$("#sample1").append('<div class="sple1">' + gettext + '<div>');



				} else {



					$(".sple1").remove("");



					$("#sample1").append('<div class="sple1">' + gettext + '<div>');



				}



				var count = $('.sple1').text().replace(/\s+/g, '').length;



				$(".w_count1").text(count);



				applyFont('.sple1', sec_curnt_font_val1);



				if (height1 != '') {



					var resp = 1;



					var product_id = $('.prod_id').val();



					$('.price').LoadingOverlay("show");



					$.ajax({



						url: '{{route('product.price')}}',



						data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},



						type: "GET",



						success: function (price) {

							if(price != '')

							{

								cout_val1 = $(".w_count1").text();



								cout_val1 = parseFloat(cout_val1);



								cout_val1 = (+((cout_val1) * price.price)*finish1/100);



								cout_val1 = (cout_val1.toFixed(2));



								$(".price1").text(" ");



								$(".price1").text(cout_val1);



								$(".price1").val(cout_val1);



							}

						}



					});



					$('.price').LoadingOverlay("hide");



				}





				$('#paper_template1 option:eq(0)').prop('selected', true);



				$('#mounting_hardware1 option:eq(0)').prop('selected', true);



				m_hcount1 = 0;



				pr_count1 = 0;



				$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);



				if (price1 == "NaN") {



					$(".price1").text("6.20");



					$(".price1").val(6.20);



				}



				// new section added//



				if (sec_curnt_font_val1 != '' && height1 != '') {



					$(".other_font1").hide();



					var textarea = $("#fname1").val();



					if (textarea == textarea.toUpperCase()) {



						apr_width = 1.1;



					} else {



						$.ajax({

							data: {'sec_curnt_font_val1': sec_curnt_font_val1},

							type: "GET",

							success: function (apr_width) {

								apr_width = apr_width;

							}

						});

					}

					final_apr_width = 1;

					$(".apr_width1").text("");

					cout_val1 = $(".w_count1").text();

					cout_val1 = parseInt(cout_val1);

					final_apr_width = height1 * apr_width;

					final_apr_width = final_apr_width * cout_val1;

					$(".apr_width1").text(final_apr_width.toFixed(1));

				} else if (sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '') {

					$(".other_font1").show();

					final_apr_width = 1;

					$(".apr_width1").text("Enter text and select a Height to see Approx. Width.");



				}



				if (sec_curnt_font_val1 == 'Other Font') {



					$(".other_font1").show();



				} else {



					$(".other_font1").hide();



				}



				// new section added//



				$('.sple1').css("color", $("#color1").val());



			}





			function gettext2(id)

			{



				var gettext = $("#" + id).val();



				var txt = $('#sample1').text();



				txt = txt.substr(txt.length - 4) // new code added



				status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form



				// status_count = id.slice(-1);



				status_count = parseInt(status_count);



				var fname_txt = $('#fname' + status_count).text();



				var height2 = $("#height" + status_count).val();



				var finish2 = $("#finish" + status_count).val();



				var thickness2 = $("#thickness" + status_count).val();



				var mounting_hardware2 = $("#mounting_hardware" + status_count).val();



				var paper_template2 = $("#paper_template" + status_count).val();



				var price2 = $(".price" + status_count).text();



				var cout_val2 = $(".w_count" + status_count).text();



				var qty2 = $("#qty" + status_count).val();



				var check = id;

				status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form



				status_count = parseInt(status_count);



				if (txt == "Text") { // new code added



					$("#sample1").html("");



					$("#sample1").append('<div class="' + id + '">' + gettext + '</div>');



				} else {



					$("." + id).remove();

					$("#sample1").append('<div class="' + id + '">' + gettext + '</div>');



				}

				var count2 = $('.' + id).text().replace(/\s+/g, '').length;

				$(".w_count" + status_count).text(count2);

				var find_class_name = $('div.' + id + '').length;

				var fontfamily2 = $("#font" + status_count).val();

				applyFont('.fname' + status_count, fontfamily2);

				if (height2 != '' && thickness2 != '')

				{



					var resp = 1;



					var product_id = $('.prod_id').val();





					$('.price').LoadingOverlay("show");



					$.ajax({



						url: '{{route('product.price')}}',



						data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},



						type: "GET",



						success: function (price) {

							if(price != '')

							{

								cout_val2 = $(".w_count" + status_count).text();



								qty2 = $("#qty" + status_count).val();



								cout_val2 = parseFloat(cout_val2);



								cout_val2 = (+((cout_val2) * price.price)*finish2/100);



								cout_val2 = (cout_val2.toFixed(2));



								$(".price" + status_count).text(" ");



								$(".price" + status_count).text(cout_val2);



								$(".price" + status_count).val(cout_val2);



							}

						}



					});



					$('.price').LoadingOverlay("hide");



				}



				if (current_font_val != '' && height2 != '') {



					$(".other_font" + status_count).hide();



					var textarea = $("#fname" + status_count).val();



					if (textarea == textarea.toUpperCase()) {



						apr_width = 1.1;



					} else {



						$.ajax({



							type: "GET",



							success: function (apr_width) {



								apr_width = apr_width;



							}



						});



					}



					final_apr_width = 1;



					$(".apr_width" + status_count).text("");



					cout_val2 = $(".w_count" + status_count).text();



					cout_val2 = parseInt(cout_val2);



					final_apr_width = height2 * apr_width;



					final_apr_width = final_apr_width + cout_val2;



					$(".apr_width" + status_count).text(final_apr_width.toFixed(1));



				} else if (current_font_val != '' && current_font_val == "Other Font" && height2 != '') {



					$(".other_font" + status_count).show();



					final_apr_width = 1;



					$(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



				}



				//  new section added//



				// alert(id+" "+previous)



				$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);





				var price2 = $(".price" + status_count + "").text();



				if (price2 == "NaN") {



					$(".price" + status_count).text("6.20");



					$(".price" + status_count).val(6.20);



				}



				$('.fname' + status_count).css("color", $("#color" + status_count).val());



			}





			function comments2(id) {



				status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form



				// alert(status_count);



				status_count = parseInt(status_count);



				if ($('#comments' + status_count).is(":checked")) {



					$(".textarea_section" + status_count).show();



				} else {



					$(".textarea_section" + status_count).hide();



				}



			}



		</script>



		</div>



		</body>



		</html>



