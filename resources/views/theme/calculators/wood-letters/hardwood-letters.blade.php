<!DOCTYPE html>

<?php

	$calculator_mode = $calculator_mode;

?>

<html>

<head>

    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp





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

			<style>

				.textarea_section1, .other_font1 {

					display: none;

				}

			</style>

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

		<div class="col-md-6 p-4">

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

                    <h3><p id="sample1" class="p-3 text-center border" style="font-size: 41px;overflow: auto;">Enter

                            Your Text</p></h3>

                    <div class="col-md-12 align-self-center p-2">

                        <textarea type="text" Placeholder="Enter Your Text" id="fname1" name="fname1"

                                  onkeyup="gettext1(this.id)" class="form-control onchange_fun"></textarea>

                    </div>

                    <div class="d-md-flex border-bottom border-top p-2">

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

											googleFonts: ['Ribeye','Piedra'],

											systemFonts: ['Verdana','Basic-Regular','TypewriterDemi-Bold','ActionMan','AlegreyaSCBlack',

											'AlegreyaSC-Regular','astounder-squared-lc-bb','BioRhyme-Bold','Calligrapher-font','BioRhyme-ExtraBold',

											'AlegreyaSC-Bold','Anton-Regular','bank-gothic','Bubble','CalligraphyUnicase','Canciller-Demibold',

											'HOBON','ClarendonCondensedBold','Clarendon-Regular','basicsanssf-bold','Bauer','ClarendonTMed',

											'CloisterBlack','CocoBiker-Regular-Trial','CrimsonText-Bold','CrimsonText-Regular','D-DIN',

											'D-DINCondensed-Bold','D-DINExp-Bold','GiuliaDEMO-Bold','GOTHICB','LibreBodoni-Bold','LibreBodoni-BoldItalic',

											'RobotoSlab-Regular','Typewriter-Medium','Other Font'],

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

							<div class="d-md-flex border-bottom border-top p-2">

								<div class="col-lg-3 text-lg-right align-self-center">

									Select Font

								</div>

								<div class="col-lg-8 align-self-center p-2">

									<input id="other_font_val" type="text" class="form-control" placeholder="Select other font" />

								</div>

							</div>

						</div>

						<div class="d-md-flex border-bottom border-top p-2">

							<div class="col-lg-3 text-lg-right align-self-center">

								Height

							</div>

							<div class="col-lg-8 align-self-center p-2">

								<select id="height1" class="form-control onchange_fun" name="height1">

									<option value="">Choose Height...</option>

									<option value="5" class="">5 inch</option>

									<option value="6" class="">6 inch</option>

								</select>

							</div>

						</div>

						<div class="m_f1_section1">

							<div class="d-md-flex border-bottom border-top p-2">

								<div class="col-lg-3 text-lg-right align-self-center">

									Material/Finish

								</div>

								<div class="col-lg-8 align-self-center p-2">

									<select class="form-control m_f1 selection_box1" id="m_f1" name="m_f1" onchange="material_finish1(this.id)">

										<option value="">Choose Material/Finish...</option>

										<option value="1" class="" id="" >Alder</option>

										<option value="25" class="" id="" >Alder Satin Clear Coat (+25% per letter</option>

										<option value="40" class="" id="" >Alder Gloss Clear Coat (+40% per letter)</option>

										<option value="1" class="" id="" >Hickory</option>

										<option value="25" class="" id="" >Hickory Satin Clear Coat (+25% per letter)</option>

										<option value="40" class="" id="" >Hickory Gloss Clear Coat (+40% per letter)</option>

										<option value="1" class="" id="" >Maple</option>

										<option value="40" class="" id="" >Maple Gloss Clear Coat (+40% per letter)</option>

										<option value="1" class="" id="" >Walnut</option>

										<option value="25" class="" id="" >Walnut Satin Clear Coat (+25% per letter)</option>

										<option value="40" class="" id="" >Walnut Gloss Clear Coat (+40% per letter)</option>

									</select>

								</div>

							</div>

						</div>

						<div class="">

							<div class="d-md-flex border-bottom border-top p-2">

								<div class="col-lg-3 text-lg-right align-self-center">

									Mounting Hardware

								</div>

								<div class="col-lg-8 align-self-center p-2">

									<select name="mounting_hardware1" class="form-control selection_box1" onchange="add_mounting_hardware1()" id="mounting_hardware1">

										<option value="" id="none">- Select an Option -</option>

										<option value="4" class="" id="" >Flush ($4.50 per letter)</option>

										<option value="4" class="spacer" id="">Projected Spacer ($4.50 per letter)</option>

										<option value="4" class="" id="">Projected Jam Nut ($4.50 per letter)</option>

									</select>

								</div>

							</div>

						</div>

						<div class="projected_section1">

							<div class="d-md-flex border-bottom border-top p-2 ">

								<div class="col-lg-3 text-lg-right align-self-center">

									Projected Spacer Length

								</div>

								<div class="col-lg-8 align-self-center p-2">

									<select name="projected_spacer_length1" class="onchange_fun form-control" id="projected_spacer_length1">

										<option value="">- Select an Option -</option>

										<option value="1">1/2 Inch</option>

										<option value="2">1 Inch</option>

										<option value="3">2 Inch</option>

										<option value="4">3 Inch</option>

										<option value="5">4 Inch</option>

									</select>

								</div>

							</div>

						</div>

						<div class="">

							<div class="d-md-flex border-bottom border-top p-2 ">

								<div class="col-lg-3 text-lg-right align-self-center">

									Paper Template

								</div>

								<div class="col-lg-8 align-self-center p-2">

									<select name="paper_template1" class="form-control selection_box1" onchange="add_paper_template1()" id="paper_template1">

										<option value="">- Select an Option -</option>

										<option value="1">Yes ($1.00 per letter)</option>

									</select>

								</div>

							</div>

						</div>

					</div>

					<div class="d-md-flex border-bottom border-top p-3">

						<div class="col-md-12 text-center align-self-center">

							<b>Approx. Width:</b> <span class="apr_width1">Enter text and select a Height to see Approx. Width.</span>

						</div>

					</div>

					<input type="hidden" name="total_count" class="total_count"/>

					<div class="w_c_p_section1">

						<div class="count_section1">

							<div class="d-md-flex border-bottom border-top p-2">

								<div class="col-lg-6 align-self-center">

									Total Letter Count: <span class="w_count1"></span>

								</div>

								<div class="col-lg-6 align-self-end d-none">

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

								<textarea type="text" class="form-control" rows="7" id="text_area1" name="text_area1" value=""></textarea>

							</div>

						</div>

						<div class="price_section1">

							<div class="d-md-flex border-bottom border-top p-2">

								<div class="col-lg-4 align-self-center">

									<input type="hidden" class="price1_value" id="price1_value" >

									<input type="hidden" class="price1" id="price1" >

									Starting At: <b>$<span class="price1">11.72</span></b>

								</div>

								<div class="col-lg-3 align-self-center d-flex p-md-2 p-lg-0">

                                <span class="pt-2 mr-2">QTY: </span> <input type="number" id="qty1"

                                                                            class="form-control w-50 onchange_fun"

                                                                            min="1" value="1">

								</div>

								<div class="col-lg-5 align-self-end">

									<button type="button" class="btn font-weight-bold bg-danger border-danger btn-block  text-white">Add to card</button>

								</div>

							</div>

						</div>

					</div>

					<div id="new_section" class="isempty"></div>

					<div class="col-md-12 text-center align-self-center p-3">

						<p>Manufacturing Time: Please Select Options</p>

					</div>

				</div>

			</div>

		</div>

		<section class="block block-bordered border-top block-feature bg-gradient-gray-bl full-width">

			<div class="container-c">

			<div class="row justify-content-around align-items-center">

			<div class="col-12 col-sm-6 pb-5 pb-sm-0">

			<div class="" style="height: 0; padding-bottom: 89%;">

			<img class="p lazyfade in" style="width: 100%" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-ampersand-photo.png" src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-ampersand-photo.png">

			</div>

			</div>

			<div class="col-12 col-sm-6 col-lg-5 text-center text-md-left section-intro">

			<div class="px-3">

			<h3 class="mb-3 display-3">Made to Order</h3>

			<p class="lead">We don’t cut it till you order it.</p>

			<p>Wood letters are custom cut to your specifications. You choose the font. You choose the size. You choose the thickness. Then we cut them. Just for you.</p>

			<p class="small"><i>* Font shown is Libre Baskerville Italic</i></p>

			</div>

			</div>

			</div>

			</div>

		</section>

		<section class="block py-sm-0 block-bordered border-top block-feature bg-gradient-gray-bl full-width">

			<div class="container-c">

			<div class="row justify-content-around align-items-stretch">

			<div class="col-12 col-sm-6 pt-0 pb-5 pt-sm-7 pb-sm-0 d-flex justify-content-end flex-column">

			<div class="" style="height: 0; padding-bottom: 87.5%">

			<img class="lazyfade in" style="width: 100%" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-profile-photo.png" src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-profile-photo.png">

			</div>

			</div>

			<div class="order-sm-first col-12 col-sm-6 col-lg-5 d-flex justify-content-center text-center text-md-left section-intro flex-column">

			<div class="px-3 py-0 py-sm-6">

			<h3 class="mb-3 display-3">Why Baltic Birch?</h3>

			<p class="lead">Baltic Birch is a high quality furniture‑grade plywood with a nice wood grain face.</p>

			<p>The wood plys alternate grain direction so the material is very sturdy and resists warping. </p>

			<p>The layered edge is attractive when unfinished, but it also provides a great surface for painting and finishing.</p>

			</div>

			</div>

			</div>

			</div>

		</section>

		<section class="block block-bordered border-top border-bottom block-feature bg-gradient-gray-bl full-width">

			<div class="container-c">

			<div class="row justify-content-around align-items-center">

			<div class="col-12 col-sm-6 pb-5 pb-sm-0 ">

			<div class="block-img-bg lazyfadebg rounded in" data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-thickness-photo.png" style="background-position: right center; background-size: cover; background-color: rgb(237, 237, 237); background-repeat: no-repeat; max-height: 600px; overflow: hidden; background-image: url(&quot;https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/baltic-birch-thickness-photo.png&quot;);">

			<div class="" style="height: 0; padding-bottom: 100%"></div>

			</div>

			</div>

			<div class="col-12 col-sm-6 col-lg-5 text-center text-md-left section-intro">

			<div class="px-3">

			<h3 class="mb-3 display-3">Just Your Size</h3>

			<p class="lead">We cut our Baltic Birch Wood Letters in a wide variety of thicknesses.</p>

			<h4 class="block-title caps mb-0">Laser Cut</h4>

			<p>Letters that are 3/8 inch and thinner are cut with a laser, which leaves a dark smooth edge.</p>

			<h4 class="block-title caps mb-0">Router Cut</h4>

			<p>All other thicknesses are cut with a router, which leaves a clean edge.</p>

			</div>

			</div>

			</div>

			</div>

		</section>

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

		var last_price = 0;

		var current_price = 0;

		var btn_count = 0;

		var final_apr_width = 1;

		//find privious value of selection box



		$(".onchange_fun").change(function()

		{

			var height1 = $("#height1").val();

			var m_f1 = $("#m_f1").val();

			var mounting_hardware1 = $("#mounting_hardware1").val();

			var paper_template1 = $("#paper_template1").val();

			var price1 = $(".price1").text();

			var check =  $(this).attr("id");

			// alert(check);

			var cout_val1 = $(".w_count1").text();

			var qty1 = $("#qty1").val();

			var textarea = $("#fname1").val();

			if(textarea != '')

			{

				if(height1 == 6)

				{



					cout_val1 = $(".w_count1").text();

					cout_val1 = parseFloat(cout_val1);

					$(".price1_value").val(12.56*cout_val1);

					$(".price1").text($(".price1_value").val());

				}

				else

				{

					cout_val1 = $(".w_count1").text();

					cout_val1 = parseFloat(cout_val1);

					$(".price1_value").val(11.72*cout_val1);

					$(".price1").text($(".price1_value").val());



				}

			}

			if(cout_val1 == 1)

			{

				$('#projected_spacer_length1 option:eq(1)').prop('selected', true);

			}



			if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Piedra' || sec_curnt_font_val1 == 'Basic-Regular' && height1 != '')

			{

				$(".other_font1").hide();

				var textarea = $("#fname1").val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1.1;

				}

				else

				{

					apr_width = 0.8;

				}

				final_apr_width = 1;

				$(".apr_width1").text("");

				cout_val1 = $(".w_count1").text();

				cout_val1 = parseInt(cout_val1);

				final_apr_width = height1 * apr_width;

				final_apr_width = final_apr_width * cout_val1;

				$(".apr_width1").text(final_apr_width.toFixed(1));

			}

			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Typewriter-DemiBold' && height1 != '')

			{

				$(".other_font1").hide();

				var textarea = $("#fname1").val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1;

				}

				else

				{

					apr_width = 0.7;

				}



				final_apr_width = 1;

				$(".apr_width1").text("");

				cout_val1 = $(".w_count1").text();

				cout_val1 = parseInt(cout_val1);

				final_apr_width = height1 * apr_width;

				final_apr_width = final_apr_width + cout_val1;

				$(".apr_width1").text(final_apr_width.toFixed(1));



			}

			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Ribeye'|| sec_curnt_font_val1 == 'Verdana' && height1 != '')

			{

				apr_width = 1.1;

				$(".other_font1").hide();

				final_apr_width = 1;

				$(".apr_width1").text("");

				cout_val1 = $(".w_count1").text();

				cout_val1 = parseInt(cout_val1);

				final_apr_width = height1 * apr_width;

				final_apr_width = final_apr_width + cout_val1;

				$(".apr_width1").text(final_apr_width.toFixed(1));

			}

			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '')

			{

				//A//

				$(".other_font1").show();

				final_apr_width = 1;

				$(".apr_width1").text("Enter text and select a Height to see Approx. Width.");

			}

			if(sec_curnt_font_val1 == 'Other Font')

			{

				$(".other_font1").show();

			}

			else

			{

				$(".other_font1").hide();

			}

			$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

		});

		function material_finish1(id)

		{	var height1 = $("#height1").val();

			var m_f1 = $("#m_f1").val();

			var mounting_hardware1 = $("#mounting_hardware1").val();

			var paper_template1 = $("#paper_template1").val();

			var price1 = $(".price1").text();

			var price1_value = $(".price1_value").val();

			var cout_val1 = $(".w_count1").text();

			var qty1 = $("#qty1").val();

			var textarea = $("#fname1").val();

			if(textarea != '')

			{

				if(m_f1 != '' && previous1 != m_f1 && m_f1 != 1)

				{



					cout_val1 = $(".w_count1").text();

					cout_val1 = parseFloat(cout_val1);

					price1_value = parseFloat(price1_value);

					cout_val1 = ((($(".price1_value").val()*m_f1)/100)+price1_value);

					cout_val1 = (cout_val1.toFixed(2));

					$(".price1").text(" ");

					$(".price1").text(cout_val1);

				}

				else if((m_f1 == '' && previous1 != m_f1) || (previous1 != m_f1 && m_f1 == 1))

				{

					cout_val1 = $(".w_count1").text();

					cout_val1 = parseFloat(cout_val1);

					price1_value = parseFloat(price1_value);

					cout_val1 = (price1_value-(($(".price1_value").val()*m_f1)/100));

					cout_val1 = (cout_val1.toFixed(2));

					$(".price1").text(" ");

					$(".price1").text(cout_val1);

				}

			}

		}

		function add_paper_template1()

		{

			var height1 = $("#height1").val();

			var m_f1 = $("#m_f1").val();

			var mounting_hardware1 = $("#mounting_hardware1").val();

			var paper_template1 = $("#paper_template1").val();

			var price1 = $(".price1").text();

			var cout_val1 = $(".w_count1").text();

			var qty1 = $("#qty1").val();

			if(paper_template1 <= 1 && paper_template1 != '' && previous1 != paper_template1)

			{

					cout_val1 = $(".w_count1").text();

					qty1 = $("#qty1").val();

					cout_val1 = parseFloat(cout_val1);

					price1 = parseFloat(price1);

					cout_val1 = ((cout_val1)*1);

					price1 = (price1+cout_val1);

					price1 = (price1.toFixed(2));

					// alert(price1);

					$(".price1").text(price1);

			}

			else if(paper_template1 == '')

			{

				cout_val1 = $(".w_count1").text();

				qty1 = $("#qty1").val();

				cout_val1 = parseFloat(cout_val1);

				price1 = parseFloat(price1);

				cout_val1 = ((cout_val1)*1);

				price1 = (price1-cout_val1);

				price1 = (price1.toFixed(2));

				$(".price1").text(price1);

			}

		}



		function add_mounting_hardware1()

		{

			var height1 = $("#height1").val();

			var m_f1 = $("#m_f1").val();

			var mounting_hardware1 = $("#mounting_hardware1").val();

			var mounting_hardware1_class = $('select[name="mounting_hardware1"] :selected').attr('class');

			var paper_template1 = $("#paper_template1").val();

			var price1 = $(".price1").text();

			var check =  $(this).attr("id");

			var cout_val1 = $(".w_count1").text();

			var qty1 = $("#qty1").val();

			if(mounting_hardware1 <= 5 && mounting_hardware1 != '' && previous1 != mounting_hardware1)

			{

					cout_val1 = $(".w_count1").text();

					qty1 = $("#qty1").val();

					cout_val1 = parseFloat(cout_val1);

					price1 = parseFloat(price1);

					cout_val1 = ((cout_val1)*4.50);

					price1 = (price1+cout_val1);

					price1 = (price1.toFixed(2));

					// alert(price1);

					$(".price1").text(price1);

			}

			else if(mounting_hardware1 == '')

			{

				cout_val1 = $(".w_count1").text();

				qty1 = $("#qty1").val();

				cout_val1 = parseFloat(cout_val1);

				price1 = parseFloat(price1);

				cout_val1 = ((cout_val1)*4.50);

				price1 = (price1-cout_val1);

				price1 = (price1.toFixed(2));

				$(".price1").text(price1);

			}



			if(mounting_hardware1_class == "spacer")

			{

				$(".projected_section1").show();

			}

			else

			{

				$(".projected_section1").hide();

				$('#projected_spacer_length1 option:eq(0)').prop('selected', true);

			}

		}

		var count = $('.sple1').text().replace(/\s+/g, '').length;

		$(".w_count1").text(count);

		$('#comments1').click(function() {

			if ($('#comments1').is(":checked"))

			{

				$(".textarea_section1").show();

			}

			else

			{

				$(".textarea_section1").hide();

			}

		});



		//next page funtion show different div

		function onchange_fun_sec2(id)

		{

			var height2 = $("#height"+status_count).val();

			var thickness2 = $("#thickness"+status_count).val();

			var mounting_hardware2 = $("#mounting_hardware"+status_count).val();

			var paper_template2 = $("#paper_template"+status_count).val();

			var price2 = $(".price"+status_count).text();

			var cout_val2 = $(".w_count"+status_count).text();

			var qty2 = $("#qty"+status_count).val();

			var check = id;

			// status_count = parseInt(status_count);

			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

			status_count = parseInt(status_count);

			if(current_font_val == 'Other Font')

			{

				$(".other_font"+status_count).show();

			}

			else

			{

				$(".other_font"+status_count).hide();

			}

			var fname_txt = $('#fname'+status_count).text();



			////////////// calculate price for every height and thickness.////////////////////////////////////////////



			$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

			var price2 = $(".price"+status_count+"").text();

			if(price2 == "NaN")

			{

				$(".price"+status_count).text("6.20");

			}



			if(current_font_val != '' && current_font_val == "Piedra" || current_font_val == "Basic-Regular" && height2 != '')

			{

				$(".other_font"+status_count).hide();

				var textarea = $("#fname"+status_count).val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1.1;

				}

				else

				{

					apr_width = 0.8;

				}



				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width * cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Typewriter-DemiBold" && height2 != '')

			{

				$(".other_font"+status_count).hide();

				var textarea = $("#fname"+status_count).val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1;

				}

				else

				{

					apr_width = 0.7;

				}



				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width * cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Ribeye" || current_font_val == "Verdana" && height2 != '')

			{

				apr_width = 1.1;

				$(".other_font"+status_count).hide();

				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width + cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Other Font" && height2 != '')

			{

				$(".other_font"+status_count).show();

				final_apr_width = 1;

				$(".apr_width"+status_count).text("Enter text and select a Height to see Approx. Width.");

			}

			$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

		}

		///////////////////////////////////////////////////////////// end and add_paper_templatefuntion for section 2/////////////////////////////////////////////////////////////////////////////////////////////////

		function add_paper_template2()

		{

			var height2 = $("#height"+status_count).val();

			var thickness2 = $("#thickness"+status_count).val();

			var mounting_hardware2 = $("#mounting_hardware"+status_count).val();

			var paper_template2 = $("#paper_template"+status_count).val();

			var price2 = $(".price"+status_count).text();

			var cout_val1 = $(".w_count"+status_count).text();

			var qty2 = $("#qty"+status_count).val();

				// alert("1");

				///previous is come from new_section,php file

			if(paper_template2 != '' && previous == '')

			{

				// alert("2")

					cout_val = $(".w_count1").text();

					qty2 = $("#qty"+status_count).val();

					cout_val2 = $(".w_count"+status_count).text();

					price2 = parseFloat(price2);

					cout_val2 = ((cout_val2)*1);

					price2 = (price2+cout_val2);

					price2 = (price2.toFixed(2));

					// alert(price2);

					$(".price"+status_count).text(price2);

			}

			else if(paper_template2 == '' && previous != '')

			{

				// alert("3")

				cout_val2 = $(".w_count"+status_count).text();

				qty2 = $("#qty"+status_count).val();

				cout_val2 = parseFloat(cout_val2);

				price2 = parseFloat(price2);

				cout_val2 = ((cout_val2)*1);

				price2 = (price2-cout_val2);

				price2 = (price2.toFixed(2));

				$(".price"+status_count).text(price2);

			}

		}

		function add_mounting_hardware2()

		{

			var height2 = $("#height"+status_count).val();

			var thickness2 = $("#thickness"+status_count).val();

			var mounting_hardware2 = $("#mounting_hardware"+status_count).val();

			var paper_template2 = $("#paper_template"+status_count).val();

			var mounting_hardware2_class = $('select[name="mounting_hardware"+status_count] :selected').attr('class');

			var price2 = $(".price"+status_count).text();

			var cout_val1 = $(".w_count"+status_count).text();

			var qty2 = $("#qty"+status_count).val();

				// alert("1");

				///previous is come from new_section,php file

			if(mounting_hardware2 != '' && previous == '')

			{

				// alert("2")

					cout_val = $(".w_count1").text();

					qty2 = $("#qty"+status_count).val();

					cout_val2 = $(".w_count"+status_count).text();

					price2 = parseFloat(price2);

					cout_val2 = ((cout_val2)*4.00);

					price2 = (price2+cout_val2);

					price2 = (price2.toFixed(2));

					// alert(price2);

					$(".price"+status_count).text(price2);

			}

			else if(mounting_hardware2 == '' && previous != '')

			{

				// alert("3")

				cout_val2 = $(".w_count"+status_count).text();

				qty2 = $("#qty"+status_count).val();

				cout_val2 = parseFloat(cout_val2);

				price2 = parseFloat(price2);

				cout_val2 = ((cout_val2)*4.00);

				price2 = (price2-cout_val2);

				price2 = (price2.toFixed(2));

				$(".price"+status_count).text(price2);

			}

		}



		///////////////////////////////////////////////////////////////////////////////////////////////  end ////////////////////////////////////////////////////////////////////////////////////////////////////

		function delete_section(id){

			// $('#new_section').children().last().remove();

			$(".add_new_section").show();

			$('.'+id).remove();

			btn_count -=1;

			$("#new_section").children().last().find(".sec").show();

			if($('.isempty').length == 1)

			{

				$('.w_c_p_section1').show();

			}

			var delete_section = id;

			// $("."+id).removeClass("sec");

			var hide_sec =  $('.sec').length;

			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

			// alert(status_count);

			// $("#new_section").is(':empty');

			status_count = parseInt(status_count);

			$(".fname"+status_count).html("");

			var count = $('.sple1').text().replace(/\s+/g, '').length;

			$(".w_count1").text(count);

			var count2 = $('.fname'+status_count).text().replace(/\s+/g, '').length;

			$(".w_count"+status_count).text(count2);

			current_price = $('.price1').text();

			$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

		}



		function gettext1(id)

		{

			var price1 = $(".price1").text();

			var gettext = $("#" + id).val();

			var txt = $('#sample1').text();

			txt = txt.substr(txt.length - 4);

			var height1 = $("#height1").val();

			var thickness1 = $("#thickness1").val();

			var mounting_hardware1 = $("#mounting_hardware1").val();

			var cout_val1 = $(".w_count1").text();

			var qty1 = $("#qty1").val();

			if (txt == "Text")

			{

				$("#sample1").html("");

				$("#sample1").append('<div class="sple1">' + gettext + '<div>');

			} else

			{

				$(".sple1").remove("");

				$("#sample1").append('<div class="sple1">' + gettext + '<div>');

			}

			var count = $('.sple1').text().replace(/\s+/g, '').length;

			$(".w_count1").text(count);

			applyFont('.sple1', sec_curnt_font_val1);

			$('.sple1').css("color",$("#color1").val());



			// $('#paper_template1 option:eq(0)').prop('selected', true);

			// $('#mounting_hardware1 option:eq(0)').prop('selected', true);

		}

		function gettext2(id)

		{

			var gettext = $("#"+id).val();

			var txt = $('#sample1').text();

			txt = txt.substr(txt.length - 4);

			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

			// status_count = id.slice(-1);

			status_count = parseInt(status_count);

			var fname_txt = $('#fname'+status_count).text();

			var height2 = $("#height"+status_count).val();

			var thickness2 = $("#thickness"+status_count).val();

			var mounting_hardware2 = $("#mounting_hardware"+status_count).val();

			var paper_template2 = $("#paper_template"+status_count).val();

			var price2 = $(".price"+status_count).text();

			var cout_val2 = $(".w_count"+status_count).text();

			var qty2 = $("#qty"+status_count).val();

			var check = id;

			// status_count = id.slice(-1);  //get the last value of id which will be in numeric form

			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

			// alert(status_count);

			// status_count = parseInt(status_count);

			status_count = parseInt(status_count);

			if(txt == "Text")

			{

				$("#sample1").html("");

				$("#sample1").append('<div class="'+id+'">'+gettext+'</div>');

			}else

			{

				$("."+id).remove();

				$("#sample1").append('<div class="'+id+'">'+gettext+'</div>');



			}

			var count2 = $('.'+id).text().replace(/\s+/g, '').length;

			$(".w_count"+status_count).text(count2);

			var find_class_name = $('div.'+id+'').length;

			var fontfamily2 = $("#font"+status_count).val();

			// applyFont('.fname'+status_count, $(".fname"+status_count).css("font-family")); ///check font style/// after remove text in text box///

			applyFont('.fname'+status_count, fontfamily2);







			$('#paper_template2 option:eq(0)').prop('selected', true);

			$('#mounting_hardware2 option:eq(0)').prop('selected', true);

			///////////////////////////////////////////////////////////// 1 /////////////////////////////////////////////////////////////////////////////////////////////////

			$(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

			var price2 = $(".price"+status_count+"").text();

			if(price2 == "NaN")

			{

				$(".price"+status_count).text("6.20");

			}

			if(current_font_val != '' && current_font_val == "Piedra" || current_font_val == "Basic-Regular" && height2 != '')

			{

				$(".other_font"+status_count).hide();

				var textarea = $("#fname"+status_count).val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1.1;

				}

				else

				{

					apr_width = 0.8;

				}



				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width * cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Typewriter-DemiBold" && height2 != '')

			{

				$(".other_font"+status_count).hide();

				var textarea = $("#fname"+status_count).val();

				if(textarea == textarea.toUpperCase())

				{

					apr_width = 1;

				}

				else

				{

					apr_width = 0.7;

				}



				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width * cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Ribeye" || current_font_val == "Verdana" && height2 != '')

			{

				apr_width = 1.1;

				$(".other_font"+status_count).hide();

				final_apr_width = 1;

				$(".apr_width"+status_count).text("");

				cout_val2 = $(".w_count"+status_count).text();

				cout_val2 = parseInt(cout_val2);

				final_apr_width = height2 * apr_width;

				final_apr_width = final_apr_width + cout_val2;

				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));

			}

			else if(current_font_val != '' && current_font_val == "Other Font" && height2 != '')

			{

				$(".other_font"+status_count).show();

				final_apr_width = 1;

				$(".apr_width"+status_count).text("Enter text and select a Height to see Approx. Width.");

			}

		// alert(id+" "+previous)

		}

		function comments2(id)

		{

			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

			// alert(status_count);

			status_count = parseInt(status_count);

			if ($('#comments'+status_count).is(":checked"))

			{

				$(".textarea_section"+status_count).show();

			}

			else

			{

				$(".textarea_section"+status_count).hide();

			}

		}

		var previous1;

		$(document).ready(function(){

		(function ()

		{

			$(".selection_box1").on('focus', function ()

			{

				previous1 = this.value;

			}).change(function() {

				previous1 = this.value;

			});

		})();

		})

	</script>



</body>

</html>

