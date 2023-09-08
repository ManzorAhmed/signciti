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

          href="{{asset('front_end/calculator/css/github.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/jquery.fontselect.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('front_end/calculator/fontawesome/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('front_end/calculator/css/bootstrap.min.css')}}">

    <script src="{{asset('front_end/calculator/js/jquery.min.js')}}"></script>

    <script src="{{asset('front_end/calculator/js/popper.min.js')}}"></script>

    <script src="{{asset('front_end/calculator/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('front_end/calculator/js/all.js')}}" crossorigin="anonymous"></script>

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

<!-- Example 3 -->

<form method="post" action="{{route('product.add_cart')}}">

    @csrf

    <input type="hidden" name="product_id" value="{{$product->id}}"/>

    <div class="container mt-4">

        <div class="row">

            <div class="col-md-6 p-lg-5  mb-3">

                @include('theme.partials.carousal')

            </div>

            <div class="col-md-6 pt-2 p-2">

                <div class="col-md-12 p-2 text-left border border-bottom-0">

                    <div class="card-body pl-0 pr-0">

                        <h1>{{$product->name}}</h1>

						<div class="d-lg-flex">

							<div class="col-lg-6">

								<h1>3.9 <span class="text-muted" style="font-size:12px;">OUT OF 5 (Stars)</span></h1>

							</div>

							<div class="col-lg-6" style="font-size: 24px;text-align: -webkit-right;">

								<span class="fa fa-star checked"></span>



								<span class="fa fa-star checked"></span>



								<span class="fa fa-star checked"></span>



								<span class="fa fa-star"></span>



								<span class="fa fa-star"></span><br>

								<span class="text-muted"style="font-size: 14px;font-weight: bold;">224 Rating</span>



							</div>

						</div>

					</div>



                </div>

                <input type="hidden" value="{{$product->id}}" class="prod_id">

                <div class="border">

                    <div class="section_1">

                        <h3><p id="sample1" class="p-3 text-center border" style="font-size: 41px;overflow: auto;">Enter

                                Your Text</p></h3>

                        <div class="col-md-12 align-self-center p-2">

                        <textarea type="text" Placeholder="Enter Your Text" id="fname1" name="fname1"

                                  onkeyup="gettext1(this.id)" class="form-control onchange_fun" required ></textarea>

                        </div>

                        <div class="d-lg-flex border-bottom border-top p-2">

                            <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                Choose font

                            </div>

                            <div class="col-lg-8 align-self-center">

                                <div class="example">

                                    <div class="">

                                        <input id="font1" name="font1" type="text" class="onchange_fun">

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

                                <div class="col-lg-3 text-lg-right align-self-center">

                                    Select Font

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <input id="other_font_val" type="text" class="form-control"

                                           placeholder="Select other font"/>

                                </div>

                            </div>

                        </div>

                        <div class="d-lg-flex border-bottom border-top p-2">

                            <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                Height

                            </div>

                            <div class="col-lg-8 align-self-center">

                                <select id="height1" class="form-control onchange_fun" name="height1" required>

                                    <option value="" disabled selected>Choose Height...</option>

                                    @foreach($height as $key=>$value)

                                        <option value="{{$value}}">{{$value}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="thickness_section1">

                            <div class="d-lg-flex border-bottom border-top p-2">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Thickness

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <select class="onchange_fun form-control thickness1" id="thickness1"

                                            name="thickness1" required>

                                        <option value="" disabled selected>Choose Thickness...</option>

                                        @foreach($thickness as $key=>$value)

                                            <option value="{{$value}}" class="80">{{$value}} inch</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="finish1">

                            <div class="d-lg-flex border-bottom border-top p-2">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Finish

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <select class="form-control onchange_fun" id="finish1" name="finish1">

                                        <option value="">Choose Color...</option>

                                        <option value="brushed" class="" style="color:#91b6bc; font-size:19px;">&#9634;

                                            Brushed

                                        </option>

                                        <option value="painted" class="">Painted</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="color1">

                            <div class="d-lg-flex border-bottom border-top p-2">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Color

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <input type="color" id="color1" name="color1" class="form-control onchange_fun"/>

                                </div>

                            </div>

                            <div class="d-lg-flex border-bottom border-top p-2">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Finish

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <select name="finish_val1" class="form-control onchange_fun" id="finish_val1">

                                        <option value="0" id="">- Select an Option -</option>

                                        <option value="0" id="">Satin</option>

                                        <option value="10" id="">High Gloss (+10%)</option>

                                        <option value="10" id="">Mate (+10%)</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="mounting_section1">

                            <div class="d-lg-flex border-bottom border-top p-2">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Mounting Hardware

                                </div>

                                <div class="col-lg-8 align-self-center">

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

                        <div class="paper_template1 d-none">

                            <div class="d-lg-flex border-bottom border-top p-2 ">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Paper Template

                                </div>

                                <div class="col-lg-8 align-self-center">

                                    <select name="paper_template1" class="form-control" onchange="add_paper_template1()"

                                            id="paper_template1">

                                        <option value="">- Select an Option -</option>

                                        <option value="1">Yes ($1.00 per letter)</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="projected_section1">

                            <div class="d-lg-flex border-bottom border-top p-2 ">

                                <div class="col-lg-3 text-lg-right align-self-center p-md-2">

                                    Projected Spacer Length

                                </div>

                                <div class="col-lg-8 align-self-center">

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

                                    <div class="btn btn-light btn-block bg-light border-light add_new_section"

                                         id="add_new_section" onclick="add_new_section()"><i class="fas fa-plus"></i>

                                        Add New Line

                                    </div>

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

                                    <input type="hidden" name="price1" class="price1"/>

                                    Amount: <b>$<span class="price1">6.20</span></b>

                                </div>

                                <div class="col-lg-3 align-self-center d-flex p-md-2 p-lg-0">

                                    <span class="pt-2 mr-2 ml-md-2  ml-lg-0">QTY: </span> <input type="number" id="qty1"

                                                                                                 class="form-control w-50 onchange_fun"

                                                                                                 min="1" value="1">

                                </div>

                                <div class="col-lg-5 align-self-end">

                                    <button type="submit"

                                            class="btn btn-light bg-danger border-danger btn-block text-white font-weight-bold">

                                        ADD TO

                                        CART

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

                <section class="block block-bordered block-feature bg-gradient-gray-bl">

                    <div class="container-c">

                        <div class="row justify-content-around align-items-center">

                            <div class="col-12 col-sm-11">

                                <div class="px-3 text-center">

                                    <h3 class="mb-3 display-3">NUMBER – HOW BIG IS IT?</h3>

                                    <p class="lead">It can be difficult to determine font size since each character has

                                        a different height.<br>

                                        Many fonts have numbers that are smaller than uppercase letters.</p>

                                    <p class="lead">Numbers and letters are scaled in proportion to an uppercase “B”, so

                                        some will be smaller or bigger than the height you select.</p>

                                    <p class="lead">Specify the size you require when you contact us.</p>



                                </div>

                            </div>

                            <div class="col-12 col-sm-10">

                                <div class="" style="height: 0; padding-bottom: 34.9%;">

                                    <img style="width: 100%;" class="p lazyfade in"

                                         data-src="{{asset('front_end/images/scale.jpeg')}}"

                                         src="{{asset('front_end/images/scale.jpeg')}}">

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

                                    {!! $product->description !!}

                                </div>

                                <div class="col-sm-4 std short-description">

                                    <div class="card" style="border: 1px solid rgba(0,0,0,.125);">

                                        <div class="card-body" style="font-size: .9rem;">

                                            <ul>

                                                <li>Metal numbers at affordable prices</li>

                                                <li>There are four methods of finishing available: natural satin,

                                                    polished, painted, and anodized.

                                                </li>

                                                <li>Anodized and polished finish requires stud mounts</li>

                                                <li>We make each order to order</li>

                                                <li>Colors and finishes may differ depending on your monitor</li>

                                                <li>Contact us for samples or to verify sizing</li>

                                            </ul>

                                        </div>

                                        <div class="card-footer text-muted">

                                            <ul class="fa-ul">

                                                <li><span class="attribute-icons"><span class="fa-li"><svg

                                                                class="svg-inline--fa fa-wmi-warr-l fa-w-16"

                                                                aria-hidden="true" data-prefix="fas"

                                                                data-icon="wmi-warr-l"

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

                        <a class="card-header btn-acc" data-acctarget="#pricing-tab"

                           href="#pricing-tabcontent">Pricing</a>

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

                                            <i class="icon-plus" title="Price Increase"></i> Custom Color Color is

                                            $20.00

                                            more

                                        </li>

                                        <li><i class="icon-plus" title="Price Increase"></i>

                                            High Gloss Finish is 10% more

                                        </li>

                                        <li><i class="icon-plus" title="Price Increase"></i> Matte Finish is 10% more

                                        </li>

                                        <li><i class="icon-plus"

                                               title="Price Increase"></i> Paper Template is $1.00 more per letter

                                        </li>

                                    </ul>

                                </div>



                                @include('theme.partials.table')

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



        <!-- /Example 3 -->

    </div>

</form>



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



        var finish_val1 = $("#finish_val1").val();



        var price1 = $(".price1").text();



        var check = $(this).attr("id");



        var textarea1 = $("#fname1").val();

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



                $('.sple1').css("color", "black");



                $('#finish1 option:eq(0)').prop('selected', true);



                $('.sple1').css("color", "black");



                $('#paper_template1 option:eq(0)').prop('selected', true);



                $('#mounting_hardware1 option:eq(0)').prop('selected', true);



                pr_count1 = 0;



                m_hcount1 = 0;



            }



        }



        if (check == 'mounting_hardware1') {



            $(".projected_section1").show();



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



                $('.sple1').css("color", "black");



                $('#finish1 option:eq(0)').prop('selected', true);



                $('#paper_template1 option:eq(0)').prop('selected', true);



                $('#mounting_hardware1 option:eq(0)').prop('selected', true);



            }



            $('#thickness1 option:eq(1)').hide();



            $('#finish1 option:eq(0)').prop('selected', true);



            $('.sple1').css("color", "black");



        } else {



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



                $('.sple1').css("color", "black");



                $('#finish1 option:eq(0)').prop('selected', true);



                $('#paper_template1 option:eq(0)').prop('selected', true);



                $('#mounting_hardware1 option:eq(0)').prop('selected', true);



            }



            $('#thickness1 option:eq(2)').hide();



            $('#finish1 option:eq(0)').prop('selected', true);



            $('#sple1 option:eq(0)').prop('selected', true);



            $('.sple1').css("color", "black");



            // $('#1_4_inch2').hide();



        } else {



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



                $('.sple1').css("color", "black");



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



                success: function (price) {

                    if (price != '' && textarea1 != '') {

                        cout_val1 = parseFloat(cout_val1);



                        cout_val1 = ((cout_val1) * price.price);

                        finish_val1 = (cout_val1 * finish_val1) / 100;

                        cout_val1 = finish_val1 + cout_val1;

                        cout_val1 = (cout_val1.toFixed(2));

                        $(".price1").text(" ");

                        $(".price1").text(cout_val1);



                        $(".price1").val(cout_val1);



                    }

                }



            });



            $('.price').LoadingOverlay("hide");



        }



        // new section added//





        if (sec_curnt_font_val1 != '' && height1 != null) {



            $(".other_font1").hide();



            var textarea = $("#fname1").val();



            if (textarea == textarea.toUpperCase()) {



                apr_width = 1.1;

                final_apr_width = 1;

                cout_val1 = $(".w_count1").text();

                cout_val1 = parseInt(cout_val1);

                final_apr_width = height1 * apr_width;

                final_apr_width = final_apr_width * cout_val1;

                final_apr_width = final_apr_width.toFixed(1);

                $(".apr_width1").text("");

                $(".apr_width1").text(final_apr_width);



            } else {



                $.ajax({



                    url: '{{route('product.approx_width')}}',



                    data: {'sec_curnt_font_val1': sec_curnt_font_val1},



                    type: "GET",



                    success: function (data) {

                        console.log(data.approx_width)

                        if (data.approx_width != '' && sec_curnt_font_val1 != 'Other Font') {

                            apr_width = data.approx_width;

                            final_apr_width = 1;

                            cout_val1 = $(".w_count1").text();

                            cout_val1 = parseInt(cout_val1);

                            final_apr_width = height1 * apr_width;

                            final_apr_width = final_apr_width * cout_val1;

                            final_apr_width = final_apr_width.toFixed(1);

                            $(".apr_width1").text("");

                            $(".apr_width1").text(final_apr_width);

                        }

                    }



                });



            }





        } else if (sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '') {



            $(".other_font1").show();

            final_apr_width = 1;

            $(".apr_width1").text("Enter text and select a Height to see Approx. Width.");



        }

        if (sec_curnt_font_val1 == 'Other Font') {

            $(".other_font1").show();



            final_apr_width = 1;



            $(".apr_width1").text("Enter text and select a Height to see Approx. Width.");

        } else {

            $(".other_font1").hide();

        }



        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);



        // $('.sple1').css("color", $("#color1").val());



        if (price1 == "NaN") {



            $(".price1").text("6.20");



            $(".price1").val(6.20);



        }





        if ($("#finish1").val() == 'brushed') {



            $('.sple1').css("color", "#91b6bc");



            $('.color1').hide();



            $("#color1").val("#000000");

            $('#finish_val1 option:eq(0)').prop('selected', true);



        } else if ($("#finish1").val() == 'painted') {



            $('.sple1').css("color", "black");



            $('.color1').show();



        } else if ($("#finish1").val() == '') {



            $('.color1').hide();



            $('.sple1').css("color", "black");



            $("#color1").val("#000000");



        }



        if ($("#color1").val() != '#000000') {



            $('.sple1').css("color", $("#color1").val());



        }





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



    //next page funtion show different div



    function onchange_fun_sec2(id) {



        status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form

        var height2 = $("#height" + status_count).val();



        var thickness2 = $("#thickness" + status_count).val();



        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();



        var finish_val2 = $("#finish_val" + status_count).val();



        var paper_template2 = $("#paper_template" + status_count).val();



        var price2 = $(".price" + status_count).text();



        var fname2 = $("#fname" + status_count).val();



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



                $(".finish" + status_count).show();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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



        if (check == 'mounting_hardware' + status_count) {



            $(".projected_section" + status_count).show();



        }



        //hide thickness value



        if (height2 >= 18) {



            if (height2 >= 18 && thickness2 == "1/8") {



                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);



                $(".price" + status_count).text("6.20");



                $(".price" + status_count).val(6.20);



                $(".mounting_section" + status_count).hide();



                $(".paper_template" + status_count).hide();



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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

                    if (price != '' && fname2 != '') {

                        cout_val2 = $(".w_count" + status_count).text();



                        qty2 = $("#qty" + status_count).val();



                        cout_val2 = parseFloat(cout_val2);

                        cout_val2 = ((cout_val2) * price.price);

                        finish_val2 = (cout_val2 * finish_val2) / 100;

                        cout_val2 = finish_val2 + cout_val2;

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



        $('.fname' + status_count).css("color", $("#color" + status_count).val());



        if (price2 == "NaN") {



            $(".price" + status_count).text("6.20");



            $(".price" + status_count).val(6.20);





        }





        // new section added //



        if (current_font_val != null && height2 != null) {

            $(".other_font" + status_count).hide();



            var textarea = $("#fname" + status_count).val();



            if (textarea == textarea.toUpperCase()) {

                apr_width = 1.1;

                final_apr_width = 1;

                $(".apr_width" + status_count).text("");

                cout_val2 = $(".w_count" + status_count).text();

                cout_val2 = parseInt(cout_val2);

                final_apr_width = height2 * apr_width;

                final_apr_width = final_apr_width + cout_val2;

                final_apr_width = final_apr_width.toFixed(1);

                $(".apr_width").text("");

                $(".apr_width" + status_count).text(final_apr_width);



            } else {



                $.ajax({



                    url: '{{route('product.approx_width')}}',



                    data: {'sec_curnt_font_val1': current_font_val},



                    type: "GET",



                    success: function (data) {

                        console.log(data.approx_width)

                        if (data.approx_width != '' && current_font_val != 'Other Font') {

                            apr_width = data.approx_width;

                            final_apr_width = 1;

                            $(".apr_width" + status_count).text("");

                            cout_val2 = $(".w_count" + status_count).text();

                            cout_val2 = parseInt(cout_val2);

                            final_apr_width = height2 * apr_width;

                            final_apr_width = final_apr_width + cout_val2;

                            final_apr_width = final_apr_width.toFixed(1);

                            $(".apr_width").text("");

                            $(".apr_width" + status_count).text(final_apr_width);

                        }

                    }



                });



            }



        } else if (current_font_val != '' && current_font_val == "Other Font" && height2 != '') {



            $(".other_font" + status_count).show();



            final_apr_width = 1;



            $(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



        }

        if (current_font_val == 'Other Font') {



            $(".other_font" + status_count).show();



            final_apr_width = 1;



            $(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



        } else {



            $(".other_font" + status_count).hide();



        }



        //  new section added//





        if ($("#finish" + status_count).val() == 'brushed') {



            $('.fname' + status_count).css("color", "#91b6bc");



            $('.color' + status_count).hide();



            $("#color" + status_count).val("#000000");

            $('#finish_val' + status_count + ' option:eq(0)').prop('selected', true);



        } else if ($("#finish" + status_count).val() == 'painted') {



            $('.fname' + status_count).css("color", "black");



            $('.color' + status_count).show();



        } else if ($("#finish" + status_count).val() == '') {



            $('.color' + status_count).hide();



            $('.fname' + status_count).css("color", "black");



            $("#color" + status_count).val("#000000");



        }



        if ($("#color" + status_count).val() != '#000000') {



            $('.fname' + status_count).css("color", $("#color" + status_count).val());



        }





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





    function gettext1(id) {



        var price1 = $(".price1").text();



        var gettext = $("#" + id).val();



        var txt = $('#sample1').text();



        txt = txt.substr(txt.length - 4); // new code added



        var height1 = $("#height1").val();



        var thickness1 = $("#thickness1").val();



        var finish_val1 = $("#finish_val1").val();



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



        if ($("#finish1").val() == 'brushed') {



            $('.sple1').css("color", "#91b6bc");



        } else {



            $('.sple1').css("color", "black");



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

                    if (price != '') {

                        cout_val1 = $(".w_count1").text();



                        qty1 = $("#qty1").val();



                        cout_val1 = parseFloat(cout_val1);



                        cout_val1 = ((cout_val1) * price.price);

                        finish_val1 = (cout_val1 * finish_val1) / 100;

                        cout_val1 = finish_val1 + cout_val1;

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

                final_apr_width = 1;

                cout_val1 = $(".w_count1").text();

                cout_val1 = parseInt(cout_val1);

                final_apr_width = height1 * apr_width;

                final_apr_width = final_apr_width * cout_val1;

                final_apr_width = final_apr_width.toFixed(1);

                $(".apr_width1").text("");

                $(".apr_width1").text(final_apr_width);



            } else {

                $.ajax({



                    url: '{{route('product.approx_width')}}',



                    data: {'sec_curnt_font_val1': sec_curnt_font_val1},



                    type: "GET",



                    success: function (data) {

                        console.log(data.approx_width)

                        if (data.approx_width != '' && sec_curnt_font_val1 != 'Other Font') {

                            apr_width = data.approx_width;

                            final_apr_width = 1;

                            cout_val1 = $(".w_count1").text();

                            cout_val1 = parseInt(cout_val1);

                            final_apr_width = height1 * apr_width;

                            final_apr_width = final_apr_width * cout_val1;

                            final_apr_width = final_apr_width.toFixed(1);

                            $(".apr_width1").text("");

                            $(".apr_width1").text(final_apr_width);

                        }

                    }



                });



            }



        } else if (sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '') {



            $(".other_font1").show();



            final_apr_width = 1;



            $(".apr_width1").text("Enter text and select a Height to see Approx. Width.");



        }



        if (sec_curnt_font_val1 == 'Other Font') {



            $(".other_font1").show();



            final_apr_width = 1;



            $(".apr_width1").text("Enter text and select a Height to see Approx. Width.");



        } else {



            $(".other_font1").hide();



        }



        if (sec_curnt_font_val1 == 'Other Font') {



            $(".other_font1").show();



        } else {



            $(".other_font1").hide();



        }



        // new section added//





        if ($("#finish1").val() == 'brushed') {



            $('.sple1').css("color", "#91b6bc");

            $('.color1').hide();

            $("#color1").val("#000000");

            $('#finish_val1 option:eq(0)').prop('selected', true);



        } else if ($("#finish1").val() == 'painted') {



            $('.sple1').css("color", "black");



            $('.color1').show();



        } else if ($("#finish1").val() == '') {



            $('.color1').hide();



            $('.sple1').css("color", "black");



            $("#color1").val("#000000");



        }



        if ($("#color1").val() != '#000000') {



            $('.sple1').css("color", $("#color1").val());



        }





    }





    function gettext2(id) {



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



        var finish_val2 = $("#finish_val" + status_count).val();



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



        // $('.sple1').css("color", $("#color1").val());



        if (check == 'height' + status_count) {



            $(".thickness_section" + status_count).show();



        }



        if (check == 'thickness' + status_count) {



            if (height2 <= 17 && thickness2 == "1/8") {



                $(".mounting_section" + status_count).hide();



                $(".paper_template" + status_count).show();



                $(".finish" + status_count).show();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);



                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);



                ///pr_count1 = 0;



                ///m_hcount1 = 0;



            } else {



                $(".mounting_section" + status_count).show();



                $(".paper_template" + status_count).hide();



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



                $('#paper_template' + status_count + ' option:eq(0)').prop('selected', true);



                $('#mounting_hardware' + status_count + ' option:eq(0)').prop('selected', true);



                ///pr_count1 = 0;



                ///m_hcount1 = 0;



            }



        }



        if (check == 'mounting_hardware' + status_count) {



            $(".projected_section" + status_count).show();



        }



        //hide thickness value



        if (height2 >= 18) {



            if (height2 >= 18 && thickness2 == "1/8") {



                $('#thickness' + status_count + ' option:eq(0)').prop('selected', true);



                $(".price" + status_count).text("6.20");



                $(".price" + status_count).val(6.20);



                $(".mounting_section" + status_count).hide();



                $(".paper_template" + status_count).hide();



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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



                $(".finish" + status_count).hide();



                $('#finish' + status_count + ' option:eq(0)').prop('selected', true);



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



                $('#finish1' + status_count + ' option:eq(0)').prop('selected', true);



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

                    if (price != '') {

                        cout_val2 = $(".w_count" + status_count).text();



                        qty2 = $("#qty" + status_count).val();



                        cout_val2 = parseFloat(cout_val2);



                        cout_val2 = ((cout_val2) * price.price);

                        finish_val2 = (cout_val2 * finish_val2) / 100;

                        cout_val2 = finish_val2 + cout_val2;

                        cout_val2 = (cout_val2.toFixed(2));



                        $(".price" + status_count).text(" ");



                        $(".price" + status_count).text(cout_val2);



                        $(".price" + status_count).val(cout_val2);



                    }

                }



            });



            $('.price').LoadingOverlay("hide");



        }





        $('#paper_template2 option:eq(0)').prop('selected', true);



        $('#mounting_hardware2 option:eq(0)').prop('selected', true);





        ///////////////////////////////////////////////////////////// 1 /////////////////////////////////////////////////////////////////////////////////////////////////





        // new section added //



        if (current_font_val != null && height2 != null) {



            $(".other_font" + status_count).hide();



            var textarea = $("#fname" + status_count).val();



            if (textarea == textarea.toUpperCase()) {

                apr_width = 1.1;

                final_apr_width = 1;

                $(".apr_width" + status_count).text("");

                cout_val2 = $(".w_count" + status_count).text();

                cout_val2 = parseInt(cout_val2);

                final_apr_width = height2 * apr_width;

                final_apr_width = final_apr_width + cout_val2;

                final_apr_width = final_apr_width.toFixed(1);

                $(".apr_width").text("");

                $(".apr_width" + status_count).text(final_apr_width);



            } else {



                $.ajax({



                    url: '{{route('product.approx_width')}}',



                    data: {'sec_curnt_font_val1': current_font_val},



                    type: "GET",



                    success: function (data) {

                        console.log(data.approx_width)

                        if (data.approx_width != '' && current_font_val != 'Other Font') {

                            apr_width = data.approx_width;

                            final_apr_width = 1;

                            $(".apr_width" + status_count).text("");

                            cout_val2 = $(".w_count" + status_count).text();

                            cout_val2 = parseInt(cout_val2);

                            final_apr_width = height2 * apr_width;

                            final_apr_width = final_apr_width + cout_val2;

                            final_apr_width = final_apr_width.toFixed(1);

                            $(".apr_width").text("");

                            $(".apr_width" + status_count).text(final_apr_width);

                        }

                    }



                });



            }



        } else if (current_font_val != '' && current_font_val == "Other Font" && height2 != '') {



            $(".other_font" + status_count).show();



            final_apr_width = 1;



            $(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



        }

        if (current_font_val == 'Other Font') {



            $(".other_font" + status_count).show();



            final_apr_width = 1;



            $(".apr_width" + status_count).text("Enter text and select a Height to see Approx. Width.");



        } else {



            $(".other_font" + status_count).hide();



        }



        //  new section added//



        // alert(id+" "+previous)



        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);





        var price2 = $(".price" + status_count + "").text();



        $('.fname' + status_count).css("color", $("#color" + status_count).val());



        if (price2 == "NaN") {



            $(".price" + status_count).text("6.20");



            $(".price" + status_count).val(6.20);



        }





        if ($("#finish" + status_count).val() == 'brushed') {



            $('.fname' + status_count).css("color", "#91b6bc");



            $('.color' + status_count).hide();



            $("#color" + status_count).val("#000000");

            $('#finish_val' + status_count + ' option:eq(0)').prop('selected', true);



        } else if ($("#finish" + status_count).val() == 'painted') {



            $('.fname' + status_count).css("color", "black");



            $('.color' + status_count).show();



        } else if ($("#finish" + status_count).val() == '') {



            $('.color' + status_count).hide();



            $('.fname' + status_count).css("color", "black");



            $("#color" + status_count).val("#000000");



        }



        if ($("#color" + status_count).val() != '#000000') {



            $('.fname' + status_count).css("color", $("#color" + status_count).val());



        }





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

</body>

</html>



