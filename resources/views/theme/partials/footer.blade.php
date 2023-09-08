<!-- Site footer -->

<div class="container-fluid d-none">
    <div class="row" style="background-color: #E89B00">
        <div class="col-md-12">
            <div class="py-5">
                <h2 class="text-center text-white px-3" style="font-weight: 600;font-family: Roboto Slab,Sans-serif;">
                    SIGN UP & SAVE 5%
                </h2>
                <p class="text-center text-white px-3"
                   style="font-size: 18px; font-weight: 600; font-family: Roboto Slab,Sans-serif;">
                    Get special discounts, funny emails, and unique customer stories.
                </p>
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <div class="input-group px-3">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if($errors->has('subscriber_email'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    {{ $errors->first('subscriber_email') }}
                                </div>
                            @endif
                            <form method="post" action="{{route('subscribe.store')}}">
                                @csrf
                                <input type="text" name="subscriber_email" placeholder="Enter your Email"
                                       class="form-control"
                                       required>
                                <span class="text-danger">{{ $errors->first('subscriber_email') }}</span>
                                <button type="submit" class="btn btn-success form-inline">Subscribe</button>
                            </form>
                            <span>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #134534">
        <div class="col-md-12">
            <div class="py-3">
                <h4 class="text-center text-white px-3" style="font-weight: 600;font-family: Roboto Slab,Sans-serif;">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    Call: 1-800-705-4020
                </h4>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer d-none">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <!--<img class="w-75 pt-2" src="{{asset('front_end/images/logo.png')}}">!-->
                <a href="{{route('home')}}" class="" data-abc="true">
                    <img class="w-40 pt-2"
                         src="@isset($setting['footer_logo']) {{ asset('uploads/'.$setting['footer_logo']) }}@endisset">
                </a>
                <p class="text-justify text-muted">Every business needs sign-making. We streamlined custom sign-making
                    so people
                    can get down to business while looking good doing it. Our friendly customer service with design
                    skills, experienced artisans in our shop, and attention to detail will help you get your custom sign
                    designed and made.
                </p>
            </div>
            <div class="col-xs-6 col-md-3">
                <h6>Helpful Links</h6>
                <ul class="footer-links">
                    <li><a href="{{route('designhelp')}}" class="active">Design Help</a></li>
                    <li><a href="{{route('faqs')}}">FAQ's</a></li>
                    <li><a href=""></a>Shipping Rates</li>
                    <li><a href=""></a>Satisfaction Guarantee</li>
                    <li><a href=""></a>Return Policy</li>
                    <li><a href=""></a>Warranties</li>
                    <li><a href=""></a>Coupons</li>
                    <li><a href=""></a>Fonts</li>

                </ul>
            </div>
            <div class="col-xs-6 col-md-3">
                <h6>Company Info</h6>
                <ul class="footer-links">
                    <li><a href="{{route('about_us')}}">About Us</a></li>
                    <li><a href="{{route('faqs')}}">FAQ's</a></li>
                    <li><a href=""></a>Shipping Rates</li>
                    <li><a href=""></a>Satisfaction Guarantee</li>
                    <li><a href=""></a>Return Policy</li>
                    <li><a href=""></a>Warranties</li>
                    <li><a href=""></a>Coupons</li>
                    <li><a href=""></a>Fonts</li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
                    <a href="#">Direct2Success</a>
                </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<footer class="" style="background-color: #f1f1f182 !important;">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <div class="w-75">
                    <a href="{{route('home')}}" class="" data-abc="true">
                        <img class="w-100 pt-2"
                             src="@isset($setting['footer_logo']) {{ asset('uploads/'.$setting['footer_logo']) }}@endisset">
                    <!--     <img class="pt-2" style="width:70%" src="@isset($setting['admin_logo']) {{ asset('uploads/'.$setting['admin_logo']) }}@endisset">!-->
                    </a>
                    <ul class="list-inline mt-4 text-right">
                        <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i
                                    class="fab fa-lg fa-facebook text-warning fa-2x"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i
                                    class="fab fa-lg fa-instagram text-warning fa-2x"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i
                                    class="fab fa-lg fa-pinterest text-warning fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-warning">Company</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{route('designhelp')}}" class="text-muted">Design Help</a></li>
                    <li class="mb-2"><a class="text-muted" href="{{route('faqs')}}">FAQ's</a></li>
                    <li class="mb-2"><a href="{{route('shipping_rates')}}" class="text-muted">Shipping Rates</a></li>
                    <li class="mb-2"><a href="{{route('about_us')}}" class="text-muted">About Us</a></li>
                    <li class="mb-2"><a href="{{route('contact_us')}}" class="text-muted">Contact Us</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Site Map</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-warning">Newsletter</h6>
                <p class="text-muted mb-4"><span class="font-weight-bold text-dark">SIGNCITI</span> produces signs that
                    are professionally made and affordable. Design your custom sign today and we will be happy to help
                    get your idea made.</p>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if($errors->has('subscriber_email'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $errors->first('subscriber_email') }}
                    </div>
                @endif
                <form method="post" action="{{route('subscribe.store')}}">
                    @csrf
                    <div class="p-1 rounded border border-warning">
                        <div class="input-group">
                            <input type="email" name="subscriber_email" placeholder="Enter your email address"
                                   aria-describedby="button-addon1"
                                   class="form-control border-0 shadow-0">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link"><i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="py-4" style="background-color: #d5d5d554 !important;">
        <div class="container text-center">
           {{-- <p class="text-muted mb-0 py-2 font-weight-bold"><span class="text-dark">©</span> 2021 <a
                    href="{{route('home')}}" <span class="zoom">SIGNCITI</span></a> design made by <a
                    href="https://direct2successltd.com/"><span class="text-dark m-3 zoom">Direct<span
                            class="text-warning" style="font-size:21px">2</span>suc<span class="text-danger">cess</span><span
                            class="i-circle">inc</span></span></a> <a class="zoom" href="{{route('privacy_policy')}}"
                                                                      class="ml-1">Privacy Policy</a>, <a
                    href="{{route('termandcondition')}}" class="zoom">T<span class=""
                                                                             style="font-size: 12px;color: #de505e;">&#38;</span>C.</a>
            </p>
--}}
            <p class="text-muted mb-0 py-2 font-weight-bold">
                <span class="text-dark">© 2001-2021 SignCiti Manufacturing. All Rights Reserved</span>
                <a class="zoom ml-1" href="{{route('privacy_policy')}}">Privacy Policy</a>, <a
                    href="{{route('termandcondition')}}" class="zoom">T<span class=""
                                                                             style="font-size: 12px;">&#38;</span>C.</a>
            </p>
        </div>
    </div>
</footer>

