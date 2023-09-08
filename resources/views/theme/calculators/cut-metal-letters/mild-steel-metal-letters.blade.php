<!DOCTYPE html>
<?php
$calculator_mode = $calculator_mode;
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
<form method="post" action="{{route('product.add_cart')}}">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}"/>
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6 p-lg-5 mb-3">
            @include('theme.partials.carousal')
        </div>
        <div class="col-md-6 pt-2 p-2 border">
            <div class="col-md-12 p-2 text-left">
                <div class="card-body pl-0 pr-0">
                    <h1>{{$product->name}}</h1>
					<div class="d-lg-flex">
						<div class="col-lg-6">
							<h1>4.9 <span class="text-muted" style="font-size:12px;">OUT OF 5 (Stars)</span></h1>
						</div>
						<div class="col-lg-6" style="font-size: 22px;text-align: -webkit-right;">
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
                        <div class="col-lg-3 text-lg-right align-self-center">
                            Height
                        </div>
                        <div class="col-lg-8 align-self-center p-2">
                            <select id="height1" class="form-control onchange_fun" name="height1" required >
                                <option value="" disabled selected>Choose Height...</option>
                                @foreach($height as $key=>$value)
                                    <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <?php if($calculator_mode == 3 || $calculator_mode == 4){ ?>
                    <div class="">
                        <div class="d-lg-flex border-bottom border-top p-2">
                            <div class="col-lg-3 text-lg-right align-self-center">
                                Color
                            </div>
                            <div class="col-lg-8 align-self-center p-2">
                                <input type="color" id="color1" name="color1" class="form-control onchange_fun"/>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="">
                        <div class="d-lg-flex border-bottom border-top p-2">
                            <div class="col-lg-3 text-lg-right align-self-center">
                                Mounting
                            </div>
                            <div class="col-lg-8 align-self-center p-2">
                                <select name="mounting_hardware1" class="form-control onchange_fun"
                                        id="mounting_hardware1">
                                    <?php if($calculator_mode == 3 || $calculator_mode == 2){ ?>
                                    <option value="" id="none">- Select an Option -</option>
                                    <option value="10">Hanging Strips & Paper Template (+10%)</option>
                                    <option value="10">Mounting Holes, Nails, Spacer (+10%)</option>
                                    <option value="5">Mounting Holes (+5%)</option>
                                    <option value="0">None</option>
                                    <?php }else {?>
                                    <option value="" id="none">- Select an Option -</option>
                                    <option value="4.50">Hanging Strips & Paper Template ($4.50 per letter)</option>
                                    <option value="4.50">Mounting Holes, Nails, Spacers & Paper Template ($4.50 per
                                        letter)
                                    </option>
                                    <option value="2.25">Mounting Holes ($2.25 per letter)</option>
                                    <option value="">None</option>
                                    <?php }
                                    //haroon these data will come from database you can remove all the data from here here is just you will need to
                                    //put for each loop will put data with respect to product  you will no need these if else statement here when you
                                    // set foreach loop for data thanks
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="paper_template1">
                        <div class="d-lg-flex border-bottom border-top p-2 ">
                            <div class="col-lg-3 text-lg-right align-self-center">
                                Paper Template
                            </div>
                            <div class="col-lg-8 align-self-center p-2">
                                <select name="paper_template1" class="form-control onchange_fun" id="paper_template1">
                                    <option value="">- Select an Option -</option>
                                    <option value="1">Yes ($1.00 per letter)</option>
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
                            <div class="col-md-6 align-self-center">
                                Total Letter Count: <span class="w_count1"></span>
                            </div>
                        </div>
                    </div>
                    <?php if($calculator_mode == 2 || $calculator_mode == 3){ ?>
                    <div class="connection_type1">
                        <div class="d-lg-flex border-bottom border-top p-2">
                            <div class="col-lg-3 text-lg-right align-self-center" style="white-space: nowrap;">
                                Connection Type
                            </div>
                            <div class="col-lg-8 align-self-center">
                                <a class="text-info" href="#" data-toggle="modal" data-target="#myModal"><span
                                        class="text-danger">* </span>View Connection Types</a>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center p-3">
                            <select name="connection_type1" class="form-control onchange_fun" id="connection_type1">
                                <option value="">- Select an Option -</option>
                                <option value="baseline">Baseline</option>
                                <option value="letter">Letter</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
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
                                Amount: <b>$<span class="price1">2.00</span></b>
                            </div>
                            <div class="col-lg-3 align-self-center d-flex p-md-2 p-lg-0">
                                <span class="pt-2 mr-2">QTY: </span> <input type="number" id="qty1"
                                                                            class="form-control w-50 onchange_fun"
                                                                            min="1" value="1">
                            </div>
                            <div class="col-lg-5 align-self-end">
                                <button type="submit"
                                        class="btn font-weight-bold bg-danger border-danger btn-block  text-white">
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
                <?php if($calculator_mode == 2 || $calculator_mode == 3){ ?>
                <div class="modal" id="myModal">
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <img class="rounded-top border-0"
                                     src="{{asset('front_end/images/connection-types.jpg')}}"
                                     style="max-width: -webkit-fill-available;"/>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer d-block">
                                <text class="d-inline-flex">Letter Connection Type</text>
                                <div class="float-right">
                                    <a class="text-decoration-none p-1" style="font-size: 24px;"
                                       href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fconnection-types.jpg"
                                       target="_blank" rel="noopener">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                    <a class="text-decoration-none p-1" style="font-size: 24px;"
                                       href="http://pinterest.com/pin/create/link/?url=u=http%3A%2F%2Fconnection-types.jpg"
                                       target="_blank" rel="noopener">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <section class="block block-bordered block-feature bg-gradient-gray-bl ">
        <div class="container-c">
            <div class="row justify-content-around align-items-center">
                <div class="col-12 col-sm-6 pb-5 pb-sm-0">
                    <div class="" style="height: 0; padding-bottom: 75%">
                        <img class="lazyfade in" style="width: 100%"
                             data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/galvanized-steel-custom-photo.png"
                             src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/galvanized-steel-custom-photo.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-5 text-center text-md-left section-intro p-0">
                    <div class="px-3">
                        <h3 class="mb-3 display-3">Made to Order</h3>
                        <p class="lead">We don’t cut it till you order it.</p>
                        <p>Each thin steel letter is custom cut per order. You choose the font. You choose the size.
                            Then we cut it. Just for you.</p>
                        <p class="small"><i>*Font shown is Clarendon Bold</i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block block-bordered block-feature bg-gradient-gray-bl ">
        <div class="container-c">
            <div class="row justify-content-around align-items-center">
                <div class="col-12 col-sm-8">
                    <div class="px-3 text-center">
                        <h3 class="mb-3 display-3">How big is a letter?</h3>
                        <p class="lead">Letter sizing is complicated. In most fonts, different letters have different
                            heights, especially lowercase letters.</p>
                        <p class="lead">We size everything proportionally to an uppercase “B”. Because of this, some
                            letters may be shorter or taller than the height you&nbsp;select.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-10">
                    <div class="mb-3" style="height: 0; padding-bottom: 34.9%;">
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
        <h3 class="section-header display-4 mb-4 text-center">Product Details</h3>
        <div class="nav nav-tabgroup justify-content-center" role="tablist"><a class="nav-link active"
                                                                               id="description-tab" data-toggle="tab"
                                                                               href="#description-tabcontent" role="tab"
                                                                               aria-controls="description-tabcontent"
                                                                               aria-selected="true">Description</a><a
                class="nav-link" id="sizing-tab" data-toggle="tab" href="#sizing-tabcontent" role="tab"
                aria-controls="sizing-tabcontent" aria-selected="false">Sizing</a><a class="nav-link" id="pricing-tab"
                                                                                     data-toggle="tab"
                                                                                     href="#pricing-tabcontent"
                                                                                     role="tab"
                                                                                     aria-controls="pricing-tabcontent"
                                                                                     aria-selected="false">Pricing</a>
        </div>
        <div class="tab-content card card-acc-combo"><a class="card-header btn-acc superactive"
                                                        data-acctarget="#description-tab"
                                                        href="#description-tabcontent">Description</a>
            <div class="card-body tab-pane active show" id="description-tabcontent" role="tabpanel"
                 aria-labelledby="description-tab">
                <div class="row">
                    <div itemprop="description" class="col-sm-8 std long-description article-content article-grid"
                         style="font-size: 1.1rem;">
                        {!! $product->description !!}
                    </div>
                    <div class="col-sm-4 std short-description">
                        <div class="card border">
                            <div class="card-body" style="font-size: .9rem;">
                                <ul>
                                    <li>20 {{$product->name}}</li>
                                    <li>Max Width: 47 inches</li>
                                    <li>Width is approximate and may be significantly different if letter connect option
                                        is selected
                                    </li>
                                    <li>Comment if an exact size is needed</li>
                                    <li>Approximate width above is for separate letters</li>
                                    <li>Words/Names with the Letter Connect option will be approximately 20% less wide
                                    </li>
                                    <li>Words/Names with Baseline Connect will be approximately the width advertised
                                    </li>
                                    <li>Words exceeding 26 inches in length will have over sized shipping</li>
                                    <p style="color:#c00;">Font viewer does not display the letters connected.
                                        Width is approximate, and may be significantly different with certain fonts.
                                        Selecting Letter Connect for this product can greatly reduce the overall width
                                        from what is stated. Please use the comment box if an exact size is needed.
                                    </p></ul>
                            </div>
                            <div class="card-footer text-muted">
                                <ul class="fa-ul">
                                    <li><span class="attribute-icons"><span class="fa-li"><svg
                                                    class="svg-inline--fa fa-wmi-warr-10 fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="wmi-warr-10" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg=""><path fill="currentColor"
                                                                           d="M302.288,153.033c-50.066,0-71.793,42.51-71.793,88.798c0,45.343,20.782,90.686,71.793,90.686 c51.011,0,71.793-45.343,71.793-90.686C374.081,195.543,353.299,153.033,302.288,153.033z M302.288,293.786 c-20.782,0-29.284-23.616-29.284-51.955c0-28.34,8.502-51.956,29.284-51.956s29.284,23.616,29.284,51.956 C331.572,270.17,323.07,293.786,302.288,293.786z M158,155h54v173h-42V184h-12V155z M401,394.149v-6.844l44.637-0.944 c1.889,0,4.842-0.944,5.787-2.834c1.889-1.889,1.948-3.778,1.003-6.612l-13.195-42.51l42.525-13.225 c1.889-0.944,3.786-2.834,3.786-4.723c0.945-2.834,0.948-4.724-0.941-6.613l-25.503-35.896l35.898-26.45 c1.889-1.89,2.834-3.778,2.834-5.668c0-2.834-0.945-4.723-2.834-6.612l-35.896-26.45l25.505-35.896 c1.89-1.89,1.89-3.779,0.945-6.612c0-1.89-1.889-3.779-3.778-3.779l-42.51-15.114l13.225-41.564c0.945-1.89,0.945-4.723-0.944-6.612 c-0.945-1.89-3.779-2.834-5.668-2.834l-44.399-0.944l-0.944-44.399c0-1.889-0.944-3.778-2.834-5.668 c-0.944-0.944-3.778-1.889-5.668-0.944L349.52,57.624l-14.169-41.565c-0.945-2.834-2.834-3.778-4.724-4.723 c-1.889-0.944-4.723,0-6.612,0.944l-35.896,25.506l-26.45-34.952C260.724,0.944,257.89,0,256,0c-2.834,0-4.723,0.944-5.668,2.834 l-26.45,34.952L187.985,12.28c-1.89-0.944-4.724-1.889-6.612-0.944c-1.89,0.944-3.779,1.889-4.724,4.723L162.48,57.624 l-42.509-13.226c-1.89-0.944-4.486,0-6.375,0.944c-1.889,1.89-2.596,3.779-2.596,5.668V95.41l-44.637,0.944 c-1.889,0-4.842,0.944-5.787,2.834c-1.889,1.89-1.948,4.723-1.003,6.612l13.195,41.564l-42.525,15.114 c-1.889,0-3.786,1.89-3.786,3.779c-0.945,2.833-0.948,4.723-0.003,6.612l26.448,35.896l-35.898,26.45 c-1.889,1.89-2.834,3.778-2.834,6.612c0,1.89,0.945,3.778,2.833,5.668l35.897,26.45l-26.45,35.896c-0.945,1.89-0.945,3.779,0,6.613 c0,1.889,1.889,3.778,3.778,4.723l42.51,13.225l-13.225,42.51c-0.945,2.834-0.945,4.724,0.944,6.612 c0.945,1.89,4.017,2.834,5.906,2.834L111,387.306v7.765c-40,7.557-78.231,18.82-110.762,33.801L24.5,512 c61.891-28.339,142.476-45.343,231.56-45.343s169.699,17.004,231.589,44.398l24.128-83.129C478.317,413.883,441,402.626,401,394.149 z M100.133,241.83c0-85.963,69.904-155.866,155.867-155.866s155.867,69.903,155.867,155.866c0,62.348-37.786,116.192-91.631,140.753 c-20.782-0.944-42.509-2.834-64.236-2.834s-43.454,1.89-64.236,2.834C137.919,358.022,100.133,304.178,100.133,241.83z"></path></svg>
                                                <!-- <i class="fas fa-wmi-warr-10"></i> --></span></span><span
                                            class="fontsm">10 Year Indoor Guarantee</span></li>
                                    <li><span class="attribute-icons"><span class="fa-li"><svg
                                                    class="svg-inline--fa fa-wmi-rain-cloud fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="wmi-rain-cloud" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg=""><path fill="currentColor"
                                                                           d="M488.321,230.5c0,43-42.22,80-92.883,80H132.833c-59.952,0-108.082-43-108.082-93c0-37,25.332-70,62.485-85 c-0.844-3-0.844-6-0.844-9c0-58,55.729-105,123.281-105c52.352,0,96.261,27,114.837,65c10.132-8,24.487-13,39.686-13 c34.62,0,61.641,24,61.641,53c0,10-3.377,20-9.288,28C457.079,160.5,488.321,192.5,488.321,230.5z M296.679,357.5l-133,133 c-2,2-4,3-7,3c-2,0-4-1-6-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l133-133c1-2,4-3,6-3c3,0,5,1,7,3l14,14c2,2,3,4,3,7 C299.679,353.5,298.679,355.5,296.679,357.5z M186.679,357.5l-46,46c-2,2-4,3-6,3c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7 l46-46c2-2,4-3,7-3c2,0,4,1,6,3l14,14c2,2,3,4,3,7C189.679,353.5,188.679,355.5,186.679,357.5z M100.679,444.5l-47,46c-1,2-4,3-6,3 c-3,0-5-1-7-3l-14-14c-2-2-3-4-3-7c0-2,1-4,3-6l46-46c2-2,4-3,7-3c2,0,5,1,6,3l15,14c1,2,2,4,2,6 C102.679,440.5,101.679,442.5,100.679,444.5z M406.679,357.5l-46,46c-2,2-5,3-7,3s-5-1-7-3l-14-14c-2-2-3-4-3-6c0-3,1-5,3-7l46-46 c2-2,5-3,7-3s5,1,7,3l14,14c2,2,3,4,3,7C409.679,353.5,408.679,355.5,406.679,357.5z M319.679,444.5l-46,46c-2,2-5,3-7,3s-5-1-6-3 l-15-14c-1-2-3-4-3-7c0-2,2-4,3-6l47-46c1-2,4-3,6-3s5,1,7,3l14,14c2,2,3,4,3,6C322.679,440.5,321.679,442.5,319.679,444.5z"></path></svg>
                                                <!-- <i class="fas fa-wmi-rain-cloud "></i> --></span></span><span
                                            class="fontsm">Outdoor Rated</span></li>
                                    <li><span class="attribute-icons"><span class="fa-li"><svg
                                                    class="svg-inline--fa fa-wmi-recycle-alt fa-w-18" aria-hidden="true"
                                                    data-prefix="fas" data-icon="wmi-recycle-alt" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    data-fa-i2svg=""><path fill="currentColor"
                                                                           d="M299.009,181l35.715-20.404l-42.858-73.469l-69.39,120.412l-102.045-59.189l55.104-93.887 C183.698,39.155,199.005,32,218.394,32h158.169c12.245,0,20.409,4.093,26.532,13.277l32.654,56.135l35.715-20.411L414.319,181 H299.009z M170.433,297.465l35.715,20.464L151.044,219H33.692l35.716,19.271l-27.552,47.902c-2.041,4.082-3.062,10.175-3.062,14.257 c0,5.103,1.021,10.189,3.062,14.271l80.615,137.753C132.676,469.803,145.941,480,164.31,480H273V368H128.927L170.433,297.465z  M536.772,276.931l-54.084-93.881L380.644,241.34L453.645,368H365v-33.27l-59.186,89.145L365,512v-32h62.585 c11.225,0,21.43-6.123,26.531-14.286l80.615-138.781C543.915,309.585,544.937,292.238,536.772,276.931z"></path></svg>
                                                <!-- <i class="fas fa-wmi-recycle-alt "></i> --></span></span><span
                                            class="fontsm">100% Scrap is recycled</span></li>
                                    <li><span class="attribute-icons"><span class="fa-li"><svg
                                                    class="svg-inline--fa fa-wmi-usa-flag fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="wmi-usa-flag" role="img"
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
            <a class="card-header btn-acc" data-acctarget="#sizing-tab" href="#sizing-tabcontent">Sizing</a>
            <div class="card-body tab-pane " id="sizing-tabcontent" role="tabpanel" aria-labelledby="sizing-tab">
                <div class="product-main-content w-75 m-auto">
                    <p>
                        The letter height you order is based on the uppercase letter "B" of the font you specify.
                        Depending on the font, <strong>some uppercase/lowercase letters may be shorter or taller than
                            the height you specify on the order form</strong> so they will look proportionate to each
                        other. Therefore, you may receive some of your lettering in different dimensions than the letter
                        height ordered. If all lettering is ordered in lower case, we still scale the lettering to an
                        uppercase "B" which will make most of the letters smaller than what was ordered. Please <a
                            href="/contactus.html" target="_blank">contact us</a> if you would like to size your
                        lettering differently from our standards. Please see examples below.
                    </p>
                    <div class="align-center" style="text-align: center;">
                        <img class="p lazyload" style="max-width: 100%; height: auto;"
                             data-src="https://res.cloudinary.com/woodland/image/upload/c_limit,d_ni.png,f_auto,h_300,q_auto,w_700/v1/woodland_media/skin/frontend/wmi/default/images/sizing/Ashley-Example.png">
                    </div>
                </div>
            </div>
            <a class="card-header btn-acc" data-acctarget="#pricing-tab" href="#pricing-tabcontent">Pricing</a>
            <div class="card-body tab-pane " id="pricing-tabcontent" role="tabpanel" aria-labelledby="pricing-tab">
                <div>
                    <div class="mb-6 product-main-content">
                        <ul class="addOptions">
                            <li><i class="icon-plus" title="Price Increase"></i> Hanging Strips &amp; Paper Template
                                Mounting is 10% more
                            </li>
                            <li><i class="icon-plus" title="Price Increase"></i> Mounting Holes, Nails, Spacers &amp;
                                Paper Template Mounting is 10% more
                            </li>
                            <li><i class="icon-plus" title="Price Increase"></i> Mounting Holes Mounting is 5% more</li>
                            <li><i class="icon-plus" title="Price Increase"></i> Paper Template is $1.00 more per letter
                            </li>
                        </ul>
                    </div>

                    @include('theme.partials.pricing_height')
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
    <div class="row mt-md-3">
        <div class="col-md-12">
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
    //find previous value of selection box

    $(".onchange_fun").change(function () {
        var height1 = $("#height1").val();
        var thickness1 = $("#thickness1").val();
        var mounting_hardware1 = $("#mounting_hardware1").val();
        var paper_template1 = $("#paper_template1").val();
        var fname1 = $("#fname1").val();
        var price1 = $(".price1").text();
        var check = $(this).attr("id");
        // alert(check);
        var cout_val1 = $(".w_count1").text();
        var qty1 = $("#qty1").val();
        $('.sple1').css("color", $("#color1").val());
        if (mounting_hardware1 == '') {
            mounting_hardware1 = 0.00;
        }
        if (paper_template1 == '') {
            paper_template1 = 0.00;
        }
        if (mounting_hardware1 == 0) {
            $(".paper_template1").show();
            $('#paper_template1 option:eq(0)').prop('selected', true);
        } else {
            $(".paper_template1").hide();
            $('#paper_template1 option:eq(0)').prop('selected', true);

        }
        if (height1 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();
            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    if (price != 0 && fname1 != '') {
                        cout_val1 = $(".w_count1").text();
                        cout_val1 = parseFloat(cout_val1);
                        mounting_hardware1 = parseFloat(mounting_hardware1);
                        paper_template1 = parseFloat(paper_template1);
                        mounting_hardware1 = ((cout_val1) * mounting_hardware1.toFixed(2));
                        paper_template1 = ((cout_val1) * paper_template1.toFixed(2));
                        cout_val1 = ((+(cout_val1) * price.price) + (+mounting_hardware1) + (+paper_template1));
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
        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);
        if (cout_val1 == 0) {
            $(".price1").text("2.00");
            $(".price1").val(2.00);
        }
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
    //next page funtion show different div
    function onchange_fun_sec2(id) {

        status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form
        var height2 = $("#height" + status_count).val();
        var thickness2 = $("#thickness" + status_count).val();
        var mounting_hardware2 = $("#mounting_hardware" + status_count).val();
        var paper_template2 = $("#paper_template" + status_count).val();
        var fname2 = $("#fname" + status_count).val();
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
        if (mounting_hardware2 == '') {
            mounting_hardware2 = 0.00;
        }
        if (paper_template2 == '') {
            paper_template2 = 0.00;
        }
        if (mounting_hardware2 == 0) {
            $(".paper_template2").show();
            $('#paper_template2 option:eq(0)').prop('selected', true);
        } else {
            $(".paper_template2").hide();
            $('#paper_template2 option:eq(0)').prop('selected', true);
        }

        if (height2 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();

            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    if (price != 0 && fname2 != '') {
                        cout_val2 = $(".w_count" + status_count).text();
                        qty2 = $("#qty" + status_count).val();
                        cout_val2 = parseFloat(cout_val2);
                        mounting_hardware2 = parseFloat(mounting_hardware2);
                        paper_template2 = parseFloat(paper_template2);
                        mounting_hardware2 = ((cout_val2) * mounting_hardware2.toFixed(2));
                        paper_template2 = ((cout_val2) * paper_template2.toFixed(2));
                        cout_val2 = ((+(cout_val2) * price.price) + (+mounting_hardware2) + (+paper_template2));
                        cout_val2 = (cout_val2.toFixed(2));
                        $(".price" + status_count).text(" ");
                        $(".price" + status_count).text(cout_val2);
                        $(".price" + status_count).val(cout_val2);
                    }
                }
            });
            $('.price').LoadingOverlay("hide");
        }

        if (cout_val2 == 0) {
            $(".price1").text("2.00");
            $(".price1").val(2.00);
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
        $('.fname' + status_count).css("color", $("#color" + status_count).val());
    }

    /////////  end ///////////////////////

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
        txt = txt.substr(txt.length - 4);
        var height1 = $("#height1").val();
        var thickness1 = $("#thickness1").val();
        var fname1 = $("#fname1").val();
        var mounting_hardware1 = $("#mounting_hardware1").val();
        var cout_val1 = $(".w_count1").text();
        var qty1 = $("#qty1").val();
        if (txt == "Text") {
            $("#sample1").html("");
            $("#sample1").append('<div class="sple1">' + gettext + '<div>');
        } else {
            $(".sple1").remove("");
            $("#sample1").append('<div class="sple1">' + gettext + '<div>');
        }
        var count = $('.sple1').text().replace(/\s+/g, '').length;
        $(".w_count1").text(count);
        applyFont('.sple1', sec_curnt_font_val1);
        $('.sple1').css("color", $("#color1").val());
        if (mounting_hardware1 == '') {
            mounting_hardware1 = 0.00;
        }
        if (paper_template1 == '') {
            paper_template1 = 0.00;
        }
        if (mounting_hardware1 == 0 || mounting_hardware1 == 5) {
            $(".paper_template1").show();
            $('#paper_template1 option:eq(0)').prop('selected', true);
        } else {
            $(".paper_template1").hide();
            $('#paper_template1 option:eq(0)').prop('selected', true);
        }
        if (height1 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();
            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height1, 'thickness': thickness1, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    if (price != 0 && fname1 != '') {
                        cout_val1 = $(".w_count1").text();
                        qty1 = $("#qty1").val();
                        cout_val1 = parseFloat(cout_val1);
                        mounting_hardware1 = parseFloat(mounting_hardware1);
                        paper_template1 = parseFloat(paper_template1);
                        mounting_hardware1 = ((cout_val1) * mounting_hardware1.toFixed(2));
                        paper_template1 = ((cout_val1) * paper_template1.toFixed(2));
                        cout_val1 = ((+(cout_val1) * price.price) + (+mounting_hardware1) + (+paper_template1));
                        cout_val1 = (cout_val1.toFixed(2));
                        $(".price1").text(" ");
                        $(".price1").text(cout_val1);
                        $(".price1").val(cout_val1);
                    }
                }
            });
            $('.price').LoadingOverlay("hide");
        }
        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);
        if (cout_val1 == 0) {
            $(".price1").text("2.00");
            $(".price1").val(2.00);
        }
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
    }

    function gettext2(id) {
        var gettext = $("#" + id).val();
        var txt = $('#sample1').text();
        txt = txt.substr(txt.length - 4) // new code added
        status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form
        // status_count = id.slice(-1);
        status_count = parseInt(status_count);
        var fname_txt = $('#fname' + status_count).text();
        var fname2 = $('#fname' + status_count).val();
        var height2 = $("#height" + status_count).val();
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
        applyFont('.fname' + status_count, fontfamily2);
        if (mounting_hardware2 == '') {
            mounting_hardware2 = 0.00;
        }
        if (paper_template2 == '') {
            paper_template2 = 0.00;
        }
        if (mounting_hardware2 == 0) {
            $(".paper_template2").show();
            $('#paper_template2 option:eq(0)').prop('selected', true);
        } else {
            $(".paper_template2").hide();
            $('#paper_template2 option:eq(0)').prop('selected', true);
        }
        if (height2 != '') {
            var resp = 1;
            var product_id = $('.prod_id').val();

            $('.price').LoadingOverlay("show");
            $.ajax({
                url: '{{route('product.price')}}',
                data: {'height': height2, 'thickness': thickness2, 'product_id': product_id},
                type: "GET",
                success: function (price) {
                    if (price != 0 && fname2 != '') {
                        cout_val2 = $(".w_count" + status_count).text();
                        qty2 = $("#qty" + status_count).val();
                        cout_val2 = parseFloat(cout_val2);
                        mounting_hardware2 = parseFloat(mounting_hardware2);
                        paper_template2 = parseFloat(paper_template2);
                        mounting_hardware2 = ((cout_val2) * mounting_hardware2.toFixed(2));
                        paper_template2 = ((cout_val2) * paper_template2.toFixed(2));
                        cout_val2 = ((+(cout_val2) * price.price) + (+mounting_hardware2) + (+paper_template2));
                        cout_val2 = (cout_val2.toFixed(2));
                        $(".price" + status_count).text(" ");
                        $(".price" + status_count).text(cout_val2);
                        $(".price" + status_count).val(cout_val2);
                    }
                }
            });
            $('.price').LoadingOverlay("hide");
        }
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
        $(".total_count").val($("#sample1").text().replace(/\s+/g, '').length);
        if (cout_val2 == 0) {
            $(".price1").text("2.00");
            $(".price1").val(2.00);
        }
        // alert(id+" "+previous)
        // $('.fname'+status_count).css("color",$("#m2_2_color"+status_count).val());
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

