<!DOCTYPE html>
<?php 
	$calculator_mode = 1; 
?>
<html>
<head>
    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SignCiti</title>
    <link rel="icon" type="image/png" sizes="16x16"
          href="@isset($setting['favicon']){{ asset('uploads/'.$setting['favicon']) }}@endisset">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/github.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/jquery.fontselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{asset('front_end/css/style.css')}}">
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }
		@font-face
		{ 
			src:url(fonts/ActionMan.woff) format('truetype');
			font-family:ActionMan; 
		}
		@font-face
		{ 
			src:url(fonts/Bubble.woff) format('truetype');
			font-family:Bubble;
		}
		@font-face
		{ 
			src:url(fonts/HOBON.ttf) format('truetype');
			font-family:HOBON; 
		}
		@font-face
		{ 
			src:url(fonts/TypewriterDemi-Bold.otf) format('truetype');
			font-family:TypewriterDemi-Bold; 
		}
		@font-face
		{ 
			src:url(fonts/AlegreyaSCBlack.otf) format('truetype');
			font-family:AlegreyaSCBlack; 
		}
		@font-face
		{ 
			src:url(fonts/AlegreyaSC-Bold.otf) format('truetype');
			font-family:AlegreyaSC-Bold; 
		}
		@font-face
		{ 
			src:url(fonts/Anton-Regular.ttf) format('truetype');
			font-family:Anton-Regular; 
		}
		@font-face
		{ 
			src:url(fonts/bank-gothic.ttf) format('truetype');
			font-family:bank-gothic; 
		}
		@font-face
		{ 
			src:url(fonts/CalligraphyUnicase.otf) format('truetype');
			font-family:CalligraphyUnicase; 
		}
		@font-face
		{ 
			src:url(fonts/basicsanssf-bold.ttf) format('truetype');
			font-family:basicsanssf-bold; 
		}
		@font-face
		{ 
			src:url(fonts/AlegreyaSC-Regular.otf) format('truetype');
			font-family:AlegreyaSC-Regular; 
		}
		@font-face
		{ 
			src:url(fonts/Bauer.woff) format('truetype');
			font-family:Bauer; 
		}
		@font-face
		{ 
			src:url(fonts/astounder-squared-lc-bb.ttf) format('truetype');
			font-family:astounder-squared-lc-bb; 
		}
		@font-face
		{ 
			src:url(fonts/BioRhyme-Bold.ttf) format('truetype');
			font-family:BioRhyme-Bold; 
		}
		@font-face
		{ 
			src:url(fonts/Calligrapher-font.ttf) format('truetype');
			font-family:Calligrapher-font; 
		}
		@font-face
		{ 
			src:url(fonts/Basic-Regular.ttf) format('truetype');
			font-family:Basic-Regular; 
		}
		@font-face
		{ 
			src:url(fonts/BioRhyme-ExtraBold.ttf) format('truetype');
			font-family:BioRhyme-ExtraBold; 
		}
		@font-face
		{ 
			src:url(fonts/Canciller-Demibold.ttf) format('truetype');
			font-family:Canciller-Demibold; 
		} 
		@font-face
		{ 
			src:url(fonts/ClarendonCondensedBold.ttf) format('truetype');
			font-family:ClarendonCondensedBold; 
		} 
		@font-face
		{ 
			src:url(fonts/Clarendon-Regular.ttf) format('truetype');
			font-family:Clarendon-Regular; 
		} 
		@font-face
		{ 
			src:url(fonts/ClarendonTMed.ttf) format('truetype');
			font-family:ClarendonTMed; 
		} 
		@font-face
		{ 
			src:url(fonts/CloisterBlack.ttf) format('truetype');
			font-family:CloisterBlack; 
		} 
		@font-face
		{ 
			src:url(fonts/CocoBiker-Regular-Trial.ttf) format('truetype');
			font-family:CocoBiker-Regular-Trial; 
		} 
		@font-face
		{ 
			src:url(fonts/CrimsonText-Regular.ttf) format('truetype');
			font-family:CrimsonText-Regular; 
		} 
		@font-face
		{ 
			src:url(fonts/D-DIN.otf) format('truetype');
			font-family:D-DIN; 
		} 
		@font-face
		{ 
			src:url(fonts/D-DINCondensed-Bold.otf) format('truetype');
			font-family:D-DINCondensed-Bold; 
		} 
		@font-face
		{ 
			src:url(fonts/D-DINExp-Bold.otf) format('truetype');
			font-family:D-DINExp-Bold; 
		} 
		@font-face
		{ 
			src:url(fonts/D-GiuliaDEMO-Bold.otf) format('truetype');
			font-family:GiuliaDEMO-Bold; 
		} 
		@font-face
		{ 
			src:url(fonts/GOTHICB.ttf) format('truetype');
			font-family:GOTHICB; 
		} 
		@font-face
		{ 
			src:url(fonts/LibreBodoni-Bold.otf) format('truetype');
			font-family:LibreBodoni-Bold; 
		} 
		@font-face
		{ 
			src:url(fonts/LibreBodoni-BoldItalic.otf) format('truetype');
			font-family:LibreBodoni-BoldItalic; 
		} 
		@font-face
		{ 
			src:url(fonts/RobotoSlab-Regular.ttf) format('truetype');
			font-family:RobotoSlab-Regular; 
		} 
		@font-face
		{ 
			src:url(fonts/Typewriter-Medium.otf) format('truetype');
			font-family:Typewriter-Medium; 
		}
		.bg-light {
			color: #212529 !important;
			background-color: #e5e5e5 !important;
			border-color: #e5e5e5 !important;
		}
        p {
            line-height: 1.4em;
        }

        .btn {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #080;
            margin: 2px 0;
            cursor: pointer;
        }

        .btn-link {
            font-weight: 400;
            color: #00bc8c;
            text-decoration: none;
            border: none;
            padding: 0;
            background: none;
            color: #00f;
            font-size: 14px;
        }

        tt {
            background-color: #eff0f1;
            padding: 4px;
        }

        .example > div {
            margin-top: 15px;
        }

        @media (min-width: 768px) {
            .example {
                display: flex;
            }

            .example > div, .example > pre {
                flex: 1;
                margin: 0 10px 0 0;
            }
        }

        .font-select {
            font-size: 16px;
            width: 103%;
            position: relative;
            display: inline-block;
            font-size: 21px;
            text-align: center;
            font-weight: bold;
            outline: 0;
            border-radius: 0.25rem;
        }

        .font-select > span {
            height: 44px;
            line-height: 32px;
            padding: 4px 8px 3px 8px;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }


        .carousel-inner img {
            width: 100%;
            height: 100%
        }

        #custCarousel .carousel-indicators {
            position: static;
            margin-top: 20px
        }

        #custCarousel .carousel-indicators > li {
            width: 100px
        }

        #custCarousel .carousel-indicators li img {
            display: block;
            opacity: 0.5
        }

        #custCarousel .carousel-indicators li.active img {
            opacity: 1
        }

        #custCarousel .carousel-indicators li:hover img {
            opacity: 0.75
        }

        .carousel-item img {
            width: 80%
        }

		.textarea_section1, .projected_section1, .mounting_section1, .thickness_section1, .paper_template1, .other_font1, .finish1, .color1 
		{
            display: none;
        }
    </style>
    <!-- For Internet Explorer 11: include intersection observer polyfill
	<script src="https://cdn.jsdelivr.net/npm/intersection-observer/intersection-observer.js"></script>
	-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
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
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            @include('theme.partials.carousal')
        </div>
        <div class="col-md-6 pt-2 p-0">
            <div class="col-md-12 p-5 text-center">
                <h3>{{$product->name}}</h3>
            </div>
            <input type="hidden" value="{{$product->id}}" class="prod_id">
            <div class="border">
                <div class="section_1">
                    <h3><p id="sample1" class="p-3 text-center border" style="font-size: 50px;overflow: auto;">Enter
                            Your Text</p></h3>
                    <div class="col-md-12 align-self-center p-2">
                        <textarea type="text" Placeholder="Enter Your Text" id="fname1" name="fname1"
                                  onkeyup="gettext1(this.id)" class="form-control onchange_fun"></textarea>
                    </div>
                    <div class="d-flex border-bottom border-top p-2">
                        <div class="col-md-3 text-right align-self-center">
                            Choose font
                        </div>
                        <div class="col-md-8 align-self-center">
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
                        <div class="d-flex border-bottom border-top p-2">
                            <div class="col-md-3 text-right align-self-center">
                                Select Font
                            </div>
                            <div class="col-md-8 align-self-center">
                                <input id="other_font_val" type="text" class="form-control"
                                       placeholder="Select other font"/>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom border-top p-2">
                        <div class="col-md-3 text-right align-self-center">
                            Height
                        </div>
                        <div class="col-md-8 align-self-center">
                            <select id="height1" class="form-control onchange_fun" name="height1">
                                <option disabled selected>Choose Height...</option>
                                @foreach($height as $key=>$value)
                                    <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="thickness_section1">
                        <div class="d-flex border-bottom border-top p-2">
                            <div class="col-md-3 text-right align-self-center">
                                Thickness
                            </div>
                            <div class="col-md-8 align-self-center">
                                <select class="onchange_fun form-control thickness1" id="thickness1"
                                        name="thickness1">
                                    <option disabled selected>Choose Thickness...</option>
                                    @foreach($thickness as $key=>$value)
                                        <option value="{{$value}}" class="80">{{$value}} inch</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> 
					<div class="finish1">
						<div class="d-flex border-bottom border-top p-2">
							<div class="col-md-3 text-right align-self-center">
								Finish
							</div>
							<div class="col-md-8 align-self-center">  
								 <select class="form-control onchange_fun" id="finish1" name="finish1">
									<option value="">Choose Color...</option>
									<option value="brushed" class="" style="color:#91b6bc; font-size:19px;">&#9634; Brushed</option> 
									<option value="painted" class="">Painted</option> 
								</select>
							</div>
						</div>
					</div>
					<div class="color1">
						<div class="d-flex border-bottom border-top p-2">
							<div class="col-md-3 text-right align-self-center">
								Color
							</div>
							<div class="col-md-8 align-self-center"> 
								<input type="color" id="color1" name="color1" class="form-control onchange_fun" />
							</div>
						</div>
						<div class="d-flex border-bottom border-top p-2">
							<div class="col-md-3 text-right align-self-center">
								Finish
							</div>
							<div class="col-md-8 align-self-center"> 
								<select name="finish_val1" class="form-control finish_val1" onchange="finish_val1()" id="finish_val1">
									<option value="" id="">- Select an Option -</option>
									<option value="" id="">Satin</option>
									<option value="10" id="">High Gloss (+10%)</option>
									<option value="10" id="">Mate (+10%)</option>
								</select>		
							</div>
						</div>
					</div>
                    <div class="mounting_section1">
                        <div class="d-flex border-bottom border-top p-2">
                            <div class="col-md-3 text-right align-self-center">
                                Mounting Hardware
                            </div>
                            <div class="col-md-8 align-self-center">
                                <select name="mounting_hardware1" class="form-control"
                                        onchange="add_mounting_hardware1()" id="mounting_hardware1">
                                    <option value="" id="none">- Select an Option -</option>
                                    <option value="1">Flush Stud Mount ($4.50 per letter)</option>
                                    <option value="2">Projected Spacer ($4.50 per letter)</option>
                                    <option value="3">Projected Jam Nut ($4.50 per letter)</option>
                                    <option value="4">Corrugated Stud Mount ($4.50 per letter)</option>
                                    <option value="5">Flat Metal Wall Stud Mount ($4.50 per letter)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="paper_template1">
                        <div class="d-flex border-bottom border-top p-2 ">
                            <div class="col-md-3 text-right align-self-center">
                                Paper Template
                            </div>
                            <div class="col-md-8 align-self-center">
                                <select name="paper_template1" class="form-control" onchange="add_paper_template1()"
                                        id="paper_template1">
                                    <option value="">- Select an Option -</option>
                                    <option value="1">Yes ($1.00 per letter)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="projected_section1">
                        <div class="d-flex border-bottom border-top p-2 ">
                            <div class="col-md-3 text-right align-self-center">
                                Projected Spacer Length
                            </div>
                            <div class="col-md-8 align-self-center">
                                <select name="projected_spacer_length" class="onchange_fun form-control"
                                        id="projected_spacer_length">
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
                </div>
                <div class="d-flex border-bottom border-top p-3">
                    <div class="col-md-12 text-center align-self-center">
                        <b>Approx. Width:</b> <span class="apr_width1">Enter text and select a Height to see Approx. Width.</span>
                    </div>
                </div>
                <div class="w_c_p_section1">
                    <div class="count_section1">
                        <div class="d-flex border-bottom border-top p-2">
                            <div class="col-md-6 align-self-center">
                                Total Letter Count: <span class="w_count1"></span>
                            </div>
                            <div class="col-md-6 align-self-end">
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
                        <div class="d-flex border-bottom border-top p-2">
                            <div class="col-md-4 align-self-center">
                                <input type="hidden" name="price1" class="price1"/>
                                Amount: <b>$<span class="price1">6.20</span></b>
                            </div>
                            <div class="col-md-3 align-self-center d-flex">
                                <span class="pt-2 mr-2">QTY: </span> <input type="number" id="qty1"
                                                                            class="form-control w-50 onchange_fun"
                                                                            min="1" value="1">
                            </div>
                            <div class="col-md-5 align-self-end">
                                <button type="button" class="btn btn-light bg-danger border-danger btn-block">Add to
                                    cart
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
    <div class="row mt-md-3">
        <div class="col-md-12">
            <h3 class="text-center">Pricing</h3>
            @include('theme.partials.table')
        </div>
    </div>
</div>
 
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

    $(".onchange_fun").change(function () {
        var height1 = $("#height1").val();
        var thickness1 = $("#thickness1").val();
        var mounting_hardware1 = $("#mounting_hardware1").val();
        var paper_template1 = $("#paper_template1").val();
        var price1 = $(".price1").text();
        var check = $(this).attr("id");
        // alert(check);
        var cout_val1 = $(".w_count1").text();
        var qty1 = $("#qty1").val();
        if (check == 'height1') {
            $(".thickness_section1").show();
        }
        if (check == 'thickness1') {
            if (height1 <= 17 && thickness1 == "1/8") {
                $(".mounting_section1").hide();
                $(".paper_template1").show();
                $(".finish1").show();
                $('#finish1 option:eq(0)').prop('selected', true);
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#mounting_hardware1 option:eq(0)').prop('selected', true);
                pr_count1 = 0;
                m_hcount1 = 0;
            } else {
                $(".mounting_section1").show();
                $(".paper_template1").hide();
                $(".finish1").hide();
				$('.sple1').css("color","black");
                $('#finish1 option:eq(0)').prop('selected', true);
				$('.sple1').css("color","black");
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#mounting_hardware1 option:eq(0)').prop('selected', true);
                pr_count1 = 0;
                m_hcount1 = 0;
            }
        } 
        if (mounting_hardware1 == 2) 
		{
            $(".projected_section1").show();
        }
		else
		{
            $(".projected_section1").hide();
			
		}
        //hide thickness value
        if (height1 >= 18) {
            if (height1 >= 18 && thickness1 == "1/8") {
                $('#thickness1 option:eq(0)').prop('selected', true);
                $(".price1").text("6.20");
                $(".price1").val(6.20);
                $(".mounting_section1").hide();
                $(".paper_template1").hide();
                $(".finish1").hide();
				$('.sple1').css("color","black");
                $('#finish1 option:eq(0)').prop('selected', true);
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#mounting_hardware1 option:eq(0)').prop('selected', true);
            }  
			$('#thickness1 option:eq(1)').hide();
			$('#finish1 option:eq(0)').prop('selected', true);
			$('.sple1').css("color","black");	
        } 
		else 
		{
            $('#thickness1 option:eq(1)').show();
        }
        if (height1 >= 25) {
            if (height1 >= 25 && (thickness1 == "1/8" || thickness1 == "1/4")) {
                $('#thickness1 option:eq(0)').prop('selected', true);
                $(".price1").text("6.20");
                $(".price1").val(6.20);
                $(".mounting_section1").hide();
                $(".paper_template1").hide();
                $(".finish1").hide();
				$('.sple1').css("color","black");
                $('#finish1 option:eq(0)').prop('selected', true);
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#mounting_hardware1 option:eq(0)').prop('selected', true);
            }
			$('#thickness1 option:eq(2)').hide();
			$('#finish1 option:eq(0)').prop('selected', true);  
			$('#sple1 option:eq(0)').prop('selected', true);
			$('.sple1').css("color","black");
            // $('#1_4_inch2').hide();
        } 
		else 
		{
            $('#thickness1 option:eq(2)').show();
            // $('#1_4_inch2').show();
        }

        if (height1 <= 1.5) {
            if (height1 <= 11.5 && (thickness1 == "1/2" || thickness1 == "3/4" || thickness1 == "1")) {
                $('#thickness1 option:eq(0)').prop('selected', true);
                $(".price1").text("6.20");
                $(".price1").val(6.20);
                $(".mounting_section1").hide();
                $(".paper_template1").hide();
                $(".finish1").hide();
				$('.sple1').css("color","black");
                $('#finish1 option:eq(0)').prop('selected', true);
                $('#paper_template1 option:eq(0)').prop('selected', true);
                $('#mounting_hardware1 option:eq(0)').prop('selected', true);
            }
            $('#thickness1 option:eq(4)').hide();
            $('#thickness1 option:eq(5)').hide();
            $('#thickness1 option:eq(6)').hide();
            // $('#1_2_inch4').hide();
            // $('#3_4_inch5').hide();
            // $('#1_inch6').hide();
        } else {
            $('#thickness1 option:eq(4)').show();
            $('#thickness1 option:eq(5)').show();
            $('#thickness1 option:eq(6)').show();
            // $('#1_2_inch4').show();
            // $('#3_4_inch5').show();
            // $('#1_inch6').show();
        }

        //////////////
        if (height1 != '' && thickness1 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();
            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},
                type: "GET",
                success: function (price) 
				{ 
                    cout_val1 = parseFloat(cout_val1);
                    cout_val1 = ((cout_val1) * price.price);
                    cout_val1 = (cout_val1.toFixed(2));
                    $(".price1").text(" ");
                    $(".price1").text(cout_val1);
                    $(".price1").val(cout_val1);
                }
            });
            $('.price').LoadingOverlay("hide");
        } 
		// new section added//
				if(sec_curnt_font_val1 != '' && height1 != '')
				{  
					$(".other_font1").hide(); 
					var textarea = $("#fname1").val();
					if(textarea == textarea.toUpperCase())  
					{
						apr_width = 1.1; 
					}
					else
					{
						$.ajax({
							// url: '{{route('cut metal letters2.new_section')}}', // Please add here new cut metal letters2 route
							data: {'sec_curnt_font_val1': sec_curnt_font_val1},
							type: "GET",
							success: function (apr_width) 
							{ 		
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
				}
				else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '')
				{ 
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
			// new section added//
        if (sec_curnt_font_val1 == 'Other Font') {
            $(".other_font1").show();
        } else {
            $(".other_font1").hide();
        }
        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length); 
		// $('.sple1').css("color", $("#color1").val());
        if (price1 == "NaN") {
            $(".price1").text("6.20");
            $(".price1").val(6.20);
        }
		
		if($("#finish1").val() == 'brushed')
		{
			$('.sple1').css("color", "#91b6bc");  
			$('.color1').hide(); 
			$("#color1").val("#000000");	
		}
		else if($("#finish1").val() == 'painted')
		{
			$('.sple1').css("color","black");
			$('.color1').show(); 
		} 
		else if($("#finish1").val() == '')
		{
			$('.color1').hide();
			$('.sple1').css("color","black"); 
			$("#color1").val("#000000");
		} 
		if($("#color1").val() != '#000000')
		{ 
			$('.sple1').css("color",$("#color1").val()); 
		}  
		$('#finish_val1 option:eq(0)').prop('selected', true);

    });

    function add_paper_template1() {
        var height1 = $("#height1").val();
        var thickness1 = $("#thickness1").val();
        var mounting_hardware1 = $("#mounting_hardware1").val();
        var paper_template1 = $("#paper_template1").val();
        var price1 = $(".price1").text();
        var cout_val1 = $(".w_count1").text();
        var qty1 = $("#qty1").val();
        if (paper_template1 <= 1 && paper_template1 != '') {
            // alert(pr_count1);
            if (pr_count1 == 0) {
                cout_val1 = $(".w_count1").text();
                qty1 = $("#qty1").val();
                cout_val1 = parseFloat(cout_val1);
                price1 = parseFloat(price1);
                cout_val1 = ((cout_val1) * 1);
                price1 = (price1 + cout_val1);
                price1 = (price1.toFixed(2));
                // alert(price1);
                $(".price1").text(price1);
                $(".price1").val(price1);
                pr_count1 = 1;
            }
        } else {
            cout_val1 = $(".w_count1").text();
            qty1 = $("#qty1").val();
            cout_val1 = parseFloat(cout_val1);
            price1 = parseFloat(price1);
            cout_val1 = ((cout_val1) * 1);
            price1 = (price1 - cout_val1);
            price1 = (price1.toFixed(2));
            $(".price1").text(price1);
            $(".price1").val(price1);
            pr_count1 = 0;
        }
    }

    function add_mounting_hardware1() {
        var height1 = $("#height1").val();
        var thickness1 = $("#thickness1").val();
        var mounting_hardware1 = $("#mounting_hardware1").val();
        var paper_template1 = $("#paper_template1").val();
        var price1 = $(".price1").text();
        var check = $(this).attr("id");
        // alert(check);
        var cout_val1 = $(".w_count1").text();
        var qty1 = $("#qty1").val();
        if (mounting_hardware1 <= 5 && mounting_hardware1 != '') {
            // alert(m_hcount1);
            if (m_hcount1 == 0) {
                cout_val1 = $(".w_count1").text();
                qty1 = $("#qty1").val();
                cout_val1 = parseFloat(cout_val1);
                price1 = parseFloat(price1);
                cout_val1 = ((cout_val1) * 4.50);
                price1 = (price1 + cout_val1);
                price1 = (price1.toFixed(2));
                // alert(price1);
                $(".price1").text(price1);
                $(".price1").val(price1);
                m_hcount1 = 1;
            }
        } else {
            cout_val1 = $(".w_count1").text();
            qty1 = $("#qty1").val();
            cout_val1 = parseFloat(cout_val1);
            price1 = parseFloat(price1);
            cout_val1 = ((cout_val1) * 4.50);
            price1 = (price1 - cout_val1);
            price1 = (price1.toFixed(2));
            $(".price1").text(price1);
            $(".price1").val(price1);
            m_hcount1 = 0;
        }
    }

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
                data: {'product_id': product_id, 'count': add_new_section_count, 'calculator_mode': <?php echo $calculator_mode ?>},
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
    //next page funtion show different div
    function onchange_fun_sec2(id) 
	{
        var height2 = $("#height" + status_count).val();
        var thickness2 = $("#thickness" + status_count).val();
        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();
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

        if (check == 'height' + status_count) {
            $(".thickness_section" + status_count).show();
        }
        if (check == 'thickness' + status_count) {
            if (height2 <= 17 && thickness2 == "1/8") {
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).show();
                $(".finish1" + status_count).show();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
                ///pr_count1 = 0;
                ///m_hcount1 = 0;
            } else {
                $(".mounting_section" + status_count).show();
                $(".paper_template" + status_count).hide();
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
                ///pr_count1 = 0;
                ///m_hcount1 = 0;
            }
        } 
        if (mounting_hardware+status_count == 2) {
            $(".projected_section" + status_count).show();
        }
		else
		{
            $(".projected_section" + status_count).hide();
			
		} 
        //hide thickness value
        if (height2 >= 18) {
            if (height2 >= 18 && thickness2 == "1/8") {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".price" + status_count).val(6.20);
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            // $('#1_8_inch1'+status_count).hide();
            $('#thickness' + status_count + ' option:eq(1)').hide();
        } else {
            $('#thickness' + status_count + ' option:eq(1)').show();
            // $('#1_8_inch1'+status_count).show();
        }
        if (height2 >= 25) {
            if (height2 >= 25 && (thickness2 == "1/8" || thickness2 == "1/4")) {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            $('#thickness' + status_count + ' option:eq(2)').hide();
            // $('#1_4_inch2'+status_count).hide();
        } else {
            $('#thickness' + status_count + ' option:eq(2)').show();
            // $('#1_4_inch2'+status_count).show();
        }

        if (height2 <= 1.5) {
            if (height2 <= 11.5 && (thickness2 == "1/2" || thickness2 == "3/4" || thickness2 == "1")) {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".price" + status_count).val(6.20);
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            $('#thickness' + status_count + ' option:eq(4)').hide();
            $('#thickness' + status_count + ' option:eq(5)').hide();
            $('#thickness' + status_count + ' option:eq(6)').hide(); 
        } else {
            $('#thickness' + status_count + ' option:eq(4)').show();
            $('#thickness' + status_count + ' option:eq(5)').show();
            $('#thickness' + status_count + ' option:eq(6)').show(); 
        }
        ////////////// end ////////////////////////////////////////////

        if (height2 != '' && thickness2 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();
            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    cout_val2 = $(".w_count" + status_count).text();
                    qty2 = $("#qty" + status_count).val();
                    cout_val2 = parseFloat(cout_val2);
                    cout_val2 = ((cout_val2) * price.price);
                    cout_val2 = (cout_val2.toFixed(2));
                    $(".price" + status_count).text(" ");
                    $(".price" + status_count).text(cout_val2);
                    $(".price" + status_count).val(cout_val2);
                }
            });
            $('.price').LoadingOverlay("hide");
        } 

        var price2 = $(".price" + status_count + "").text(); 
		$('.fname'+status_count).css("color", $("#color"+status_count).val());
        if (price2 == "NaN") {
            $(".price" + status_count).text("6.20");
            $(".price" + status_count).val(6.20);

        }

       // new section added //
				if(current_font_val != '' && height2 != '')
				{  
					$(".other_font"+status_count).hide();
					var textarea = $("#fname"+status_count).val();
					if(textarea == textarea.toUpperCase())  
					{
						apr_width = 1.1; 
					}
					else
					{
						$.ajax({
							// url: '{{route('cut metal letters2.new_section')}}', // Please add here new cut metal letters2 route
							data: {'sec_curnt_font_val1': current_font_val},
							type: "GET",
							success: function (apr_width) 
							{ 		
								apr_width = apr_width; 
							}
						});
					} 
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
			//  new section added// 
			
			if($("#finish"+status_count).val() == 'brushed')
			{
				$('.fname'+status_count).css("color", "#91b6bc");
				$('.color'+status_count).hide(); 
				$("#color"+status_count).val("#000000");	 	
			}
			else if($("#finish"+status_count).val() == 'painted')
			{
				$('.fname'+status_count).css("color","black");
				$('.color'+status_count).show(); 
			}  
			else if($("#finish"+status_count).val() == '')
			{
				$('.color'+status_count).hide(); 
				$('.fname'+status_count).css("color","black");
				$("#color"+status_count).val("#000000"); 
			}
			if($("#color"+status_count).val() != '#000000')
			{ 
				$('.fname'+status_count).css("color",$("#color"+status_count).val()); 
			} 
			$('#finish_val'+status_count+' option:eq(0)').prop('selected', true);
    }

    ///////////////////////////////////////////////////////////// end and add_paper_templatefuntion for section 2/////////////////////////////////////////////////////////////////////////////////////////////////
    function add_paper_template2() {
        var height2 = $("#height" + status_count).val();
        var thickness2 = $("#thickness" + status_count).val();
        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();
        var paper_template2 = $("#paper_template" + status_count).val();
        var price2 = $(".price" + status_count).text();
        var cout_val1 = $(".w_count" + status_count).text();
        var qty2 = $("#qty" + status_count).val();
        // alert("1");
        ///previous is come from new_section,php file
        if (paper_template2 != '' && previous == '') {
            // alert("2")
            cout_val = $(".w_count1").text();
            qty2 = $("#qty" + status_count).val();
            cout_val2 = $(".w_count" + status_count).text();
            price2 = parseFloat(price2);
            cout_val2 = ((cout_val2) * 1);
            price2 = (price2 + cout_val2);
            price2 = (price2.toFixed(2));
            // alert(price2);
            $(".price" + status_count).text(price2);
            $(".price" + status_count).val(price2);

        } else if (paper_template2 == '' && previous != '') {
            // alert("3")
            cout_val2 = $(".w_count" + status_count).text();
            qty2 = $("#qty" + status_count).val();
            cout_val2 = parseFloat(cout_val2);
            price2 = parseFloat(price2);
            cout_val2 = ((cout_val2) * 1);
            price2 = (price2 - cout_val2);
            price2 = (price2.toFixed(2));
            $(".price" + status_count).text(price2);
            $(".price" + status_count).val(price2);
        }
    }

    function add_mounting_hardware2() {
        var height2 = $("#height" + status_count).val();
        var thickness2 = $("#thickness" + status_count).val();
        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();
        var paper_template2 = $("#paper_template" + status_count).val();
        var price2 = $(".price" + status_count).text();
        var cout_val1 = $(".w_count" + status_count).text();
        var qty2 = $("#qty" + status_count).val();
        // alert("1");
        ///previous is come from new_section,php file
        if (mounting_hardware2 != '' && previous == '') {
            // alert("2")
            cout_val = $(".w_count1").text();
            qty2 = $("#qty" + status_count).val();
            cout_val2 = $(".w_count" + status_count).text();
            price2 = parseFloat(price2);
            cout_val2 = ((cout_val2) * 4.00);
            price2 = (price2 + cout_val2);
            price2 = (price2.toFixed(2));
            // alert(price2);
            $(".price" + status_count).text(price2);
            $(".price" + status_count).val(price2);
        } else if (mounting_hardware2 == '' && previous != '') {
            // alert("3")
            cout_val2 = $(".w_count" + status_count).text();
            qty2 = $("#qty" + status_count).val();
            cout_val2 = parseFloat(cout_val2);
            price2 = parseFloat(price2);
            cout_val2 = ((cout_val2) * 4.00);
            price2 = (price2 - cout_val2);
            price2 = (price2.toFixed(2));
            $(".price" + status_count).text(price2);
            $(".price" + status_count).val(price2);
        }
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
		if($("#finish1").val() == 'brushed')
		{
			$('.sple1').css("color", "#91b6bc");  
		}
		else
		{
			$('.sple1').css("color","black");
		}
        $(".w_count1").text(count);
        applyFont('.sple1', sec_curnt_font_val1);
        if (height1 != '' && thickness1 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();
            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},
                type: "GET",
                success: function (price) { 
					cout_val1 = $(".w_count1").text();
                    qty1 = $("#qty1").val(); 
                    cout_val1 = parseFloat(cout_val1);
                    cout_val1 = ((cout_val1) * price.price);
                    cout_val1 = (cout_val1.toFixed(2));
                    $(".price1").text(" ");
                    $(".price1").text(cout_val1);
                    $(".price1").val(cout_val1);
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
			if(sec_curnt_font_val1 != '' && height1 != '')
			{  
				$(".other_font1").hide(); 
				var textarea = $("#fname1").val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1.1; 
				}
				else
				{
					$.ajax({
						// url: '{{route('cut metal letters2.new_section')}}', // Please add here new cut metal letters2 route
						data: {'sec_curnt_font_val1': sec_curnt_font_val1},
						type: "GET",
						success: function (apr_width) 
						{ 		
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
			}
			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '')
			{ 
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
		// new section added//
		
			if($("#finish1").val() == 'brushed')
			{
				$('.sple1').css("color", "#91b6bc");  
				$('.color1').hide(); 
				$("#color1").val("#000000");	
			}
			else if($("#finish1").val() == 'painted')
			{
				$('.sple1').css("color","black");
				$('.color1').show(); 
			} 
			else if($("#finish1").val() == '')
			{
				$('.color1').hide();
				$('.sple1').css("color","black"); 
				$("#color1").val("#000000");
			} 
			if($("#color1").val() != '#000000')
			{ 
				$('.sple1').css("color",$("#color1").val()); 
			} 
			$('#finish_val1 option:eq(0)').prop('selected', true);
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
        var thickness2 = $("#thickness" + status_count).val();
        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();
        var paper_template2 = $("#paper_template" + status_count).val();
        var price2 = $(".price" + status_count).text();
        var cout_val2 = $(".w_count" + status_count).text();
        var qty2 = $("#qty" + status_count).val();
        var check = id;
        // status_count = id.slice(-1);  //get the last value of id which will be in numeric form
        status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form
        // alert(status_count);
        // status_count = parseInt(status_count);
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
        // applyFont('.fname'+status_count, $(".fname"+status_count).css("font-family")); ///check font style/// after remove text in text box///
        applyFont('.fname' + status_count, fontfamily2);
		$('.sple1').css("color", $("#color1").val()); 
        if (check == 'height' + status_count) {
            $(".thickness_section" + status_count).show();
        }
        if (check == 'thickness' + status_count) {
            if (height2 <= 17 && thickness2 == "1/8") {
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).show();
                $(".finish1" + status_count).show();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
                ///pr_count1 = 0;
                ///m_hcount1 = 0;
            } else {
                $(".mounting_section" + status_count).show();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
                ///pr_count1 = 0;
                ///m_hcount1 = 0;
            }
        }
        if (mounting_hardware+status_count == 2) {
            $(".projected_section" + status_count).show();
        }
		else
		{
            $(".projected_section" + status_count).hide();
			
		}
		
        //hide thickness value
        if (height2 >= 18) {
            if (height2 >= 18 && thickness2 == "1/8") {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".price" + status_count).val(6.20);
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            $('#thickness' + status_count + ' option:eq(1)').hide();
            // $('#1_8_inch1'+status_count).hide();
        } else {
            $('#thickness' + status_count + ' option:eq(1)').show();
            // $('#1_8_inch1'+status_count).show();
        }
        if (height2 >= 25) {
            if (height2 >= 25 && (thickness2 == "1/8" || thickness2 == "1/4")) {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            $('#thickness' + status_count + ' option:eq(2)').hide();
            // $('#1_4_inch2'+status_count).hide();
        } else {
            $('#thickness' + status_count + ' option:eq(2)').show();
            // $('#1_4_inch2'+status_count).show();
        }

        if (height2 <= 1.5) {
            if (height2 <= 11.5 && (thickness2 == "1/2" || thickness2 == "3/4" || thickness2 == "1")) {
                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);
                $(".price" + status_count).text("6.20");
                $(".price" + status_count).val(6.20);
                $(".mounting_section" + status_count).hide();
                $(".paper_template" + status_count).hide();
                $(".finish1" + status_count).hide();
                $('#finish1' + status_count+ ' option:eq(0)').prop('selected', true);
                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);
                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);
            }
            $('#thickness' + status_count + ' option:eq(4)').hide();
            $('#thickness' + status_count + ' option:eq(5)').hide();
            $('#thickness' + status_count + ' option:eq(6)').hide();
            // $('#1_2_inch4'+status_count).hide();
            // $('#3_4_inch5'+status_count).hide();
            // $('#1_inch6'+status_count).hide();
        } else {
            $('#thickness' + status_count + ' option:eq(4)').show();
            $('#thickness' + status_count + ' option:eq(5)').show();
            $('#thickness' + status_count + ' option:eq(6)').show();
            // $('#1_2_inch4'+status_count).show();
            // $('#3_4_inch5'+status_count).show();
            // $('#1_inch6'+status_count).show();
        }

        if (height2 != '' && thickness2 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();

            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    cout_val2 = $(".w_count" + status_count).text();
                    qty2 = $("#qty" + status_count).val();
                    cout_val2 = parseFloat(cout_val2);
                    cout_val2 = ((cout_val2) * price.price);
                    cout_val2 = (cout_val2.toFixed(2));
                    $(".price" + status_count).text(" ");
                    $(".price" + status_count).text(cout_val2);
                    $(".price" + status_count).val(cout_val2);
                }
            });
            $('.price').LoadingOverlay("hide");
        } 

        $('#paper_template2 option:eq(0)').prop('selected', true);
        $('#mounting_hardware2 option:eq(0)').prop('selected', true);

        ///////////////////////////////////////////////////////////// 1 /////////////////////////////////////////////////////////////////////////////////////////////////

        // new section added //
				if(current_font_val != '' && height2 != '')
				{  
					$(".other_font"+status_count).hide();
					var textarea = $("#fname"+status_count).val();
					if(textarea == textarea.toUpperCase())  
					{
						apr_width = 1.1; 
					}
					else
					{
						$.ajax({
							// url: '{{route('cut metal letters2.new_section')}}', // Please add here new cut metal letters2 route
							data: {'sec_curnt_font_val1': current_font_val},
							type: "GET",
							success: function (apr_width) 
							{ 		
								apr_width = apr_width; 
							}
						});
					} 
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
			//  new section added//
        // alert(id+" "+previous)
        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);

        var price2 = $(".price" + status_count + "").text(); 
		$('.fname'+status_count).css("color", $("#color"+status_count).val());
        if (price2 == "NaN") {
            $(".price" + status_count).text("6.20");
            $(".price" + status_count).val(6.20);
        }
		
		if($("#finish"+status_count).val() == 'brushed')
		{
			$('.fname'+status_count).css("color", "#91b6bc");
			$('.color'+status_count).hide(); 
			$("#color"+status_count).val("#000000");	 	
		}
		else if($("#finish"+status_count).val() == 'painted')
		{
			$('.fname'+status_count).css("color","black");
			$('.color'+status_count).show(); 
		}  
		else if($("#finish"+status_count).val() == '')
		{
			$('.color'+status_count).hide(); 
			$('.fname'+status_count).css("color","black");
			$("#color"+status_count).val("#000000"); 
		}
		if($("#color"+status_count).val() != '#000000')
		{ 
			$('.fname'+status_count).css("color",$("#color"+status_count).val()); 
		} 
		$('#finish_val'+status_count+' option:eq(0)').prop('selected', true);
		 
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

