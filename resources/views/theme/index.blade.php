@extends('theme.layouts.master')
@section('content')
<style>
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #707070;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev
{
    left:0px;
}
</style>
    <div class="container-fluid bg-white">
        <div class="mx-auto" style="">
            <div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">
                <div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center text-white">
                    <h1 class="text-warning" style="font-weight: bold;">Custom Signs</h1>
                    <h4>
                        Sign Letters & Logos Made to Order
                    </h4>
                    <!--        <img width="100%" height="90" src="images/services_image.svg">-->
                    <!--        <hr class="my-3">-->
                    <p class="lead">
                        <a class="btn btn bg_green btn_radius" href="{{route('customsign')}}" role="button">
                            <!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
                            <span class="text-white jumbotron_btn ">DESIGN A SIGN</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron jumbotron_indoor_banner text-white text-md-center mr-auto border">
                        <h1 class="text-warning" style="padding-top: 50px">INDOOR SIGNS </h1>
                        <p>
                            Custom interior signs create a professional space. Hang wall sign letters created just for
                            you.
                        </p>
                        <!--        <img width="100%" height="90" src="images/services_image.svg">-->
                        <!--        <hr class="my-3">-->
                        <p class="lead">
                            <a class="btn btn bg_green btn_radius" href="{{route('theme.sub_category','indoor-signs')}}" role="button">
                                <!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
                                <span class="text-white mr-3 jumbotron_btn ">DESIGN A SIGN</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbotron jumbotron_outdoor_banner text-white text-md-center mr-auto">
                        <h1 class="text-warning" style="padding-top: 50px">OUTDOOR SIGNS </h1>
                        <p>
                            Exterior custom signs made to withstand the elements. Get an affordable sign that attracts
                            attention.
                        </p>
                        <!--        <img width="100%" height="90" src="images/services_image.svg">-->
                        <!--        <hr class="my-3">-->
                        <p class="lead">
                            <a class="btn btn bg_green btn_radius" href="{{route('theme.sub_category','outdoor-signs')}}" role="button">
                                <!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
                                <span class="text-white mr-3 jumbotron_btn ">DESIGN A SIGN</span>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="row bg-white p-lg-3">
                @foreach($categories as $r)
                    @foreach($r->subCategory as $r)
                        <div class="col-md-3 py-3">
                            <a href="{{route('theme.sub_category',$r->slug)}}">
                                <div class="card zoom bg-dark">
                                    <img src="{{asset('uploads/images/'.$r->image)}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body bg-dark">
                                        <h5 class="text-center text-warning">{{$r->name}}</h5>
{{--                                                                            <p class="card-text text-white text-center">Natural elegance in wooden letters</p>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="row bg-light p-3">
                <div class="col-md-8">
                    <img class="w-100 rounded" src="{{asset('front_end/images/yard-sign.jpeg')}}"  />
                </div>
                <div class="col-md-4 bg-white">
                    <h2 class=" pt-5 text-center font-weight-bold text-warning">Best Seller: Yard Sign Letters</h2>
                    <p class=" lead text-justify px-2" style="font-size: 16px;">
                        Let your message be seen outdoors! Show appreciation and celebrate a special event by
						displaying customized yard card letters. Having a professional appearance and being relatively
						inexpensive, these event lett
						ers are made of durable material.
                    </p>
                    <div class="pb-3" style="text-align: center">
                        <a class=" btn_radius btn px-3" href="{{route('product_calculator','aluminum-letters-natural-satin')}}" role="button">
                            <!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
                            <span class="jumbotron_phone_no">ORDER NOW</span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="jumbotron jumbotron_expertise text-white text-md-center mr-auto mt-2">
                <h1 class="text-center text-warning font-weight-bold">SIGNS MADE </h1>
                <p class="text-center ">YOUR VISION OUR EXPERTISE.</p>
                <p class="lead text-justify mt-2" style="font-size: 16px;">
                    Our team creates unique signage every day. Each sign letter is custom made according to the
                    specifications of the customer who ordered it. Our expertise allows a vision to become a reality.
                    With this kind of responsibility, passion for our work is essential.
                </p>
                <p class=" lead text-justify mt-2" style="font-size: 16px;">
                    Signs and displays we create for our customers showcase their accomplishments. We help customers
                    install large letters and small business signs, as well as create custom projects with quality and
                    service.
                </p>
                <div class="row">
                    <div class="col-md-4 py-3">
                        <div class="card zoom bg-dark">
                            <a href="#">
                                <img src="{{asset('front_end/images/4b3a53eb_custom-services.jpg')}}"
                                     class="card-img-top"
                                     alt="...">
                                <div class="card-body bg-dark">
                                    <h5 class="text-center text-warning">Custom Manufacturing </h5>
                                    <p class="card-text text-white text-center">Make your vision a reality with our
                                        shop </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="card zoom bg-dark">
                            <a href="#">
                                <img src="{{asset('front_end/images/f0a4439e_church-sign.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body bg-dark">
                                    <h5 class="text-center text-warning">Business Signs </h5>
                                    <p class="card-text text-white text-center">Get a professional look with dimensional
                                        signs</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="card zoom bg-dark">
                            <a href="#">
                                <img src="{{asset('front_end/images/5924fe47_craft-letters.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body bg-dark">
                                    <h5 class="text-center text-warning">Craft Letters </h5>
                                    <p class="card-text text-white text-center">Custom cut unfinished letters just for
                                        your
                                        project</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 bg-light p-3">
				<div class="row">
					<div class="col-md-4">
						<h2 class="pt-5 text-center font-weight-bold text-warning">Aluminum Custom Sign Letters</h2>
						<p class=" lead text-justify px-2" style="font-size: 16px;">
                            Metal Letters made from aluminum are the most affordable and popular choice. We offer an array of rich finishes, all of which are rated for outdoor use and come with a  lifetime warranty.
                            We cut custom metal letters with a computer-guided waterjet that can handle the most detailed designs of intricate logos and script fonts. This means that you will be getting sturdy metal sign letters that will last a long time.
						</p>
						<div class="pb-3" style="text-align: center">
							<a class="btn_radius btn px-3" href="{{route('product_calculator','aluminum-numbers')}}" role="button">
								<!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
								<span class="text-white mr-3 jumbotron_phone_no">CUSTOMER SIGNS LETTERS</span>
							</a>
						</div>
					</div>
					<div class="col-md-8">
						<img class="pt-3 w-100 rounded" src="{{asset('front_end/images/87705258_tutorials.jpeg')}}"/>
					</div>
				</div>
            </div>
        </div>
        <div class="row bg-white border">
            <div class="col-md-12 p-lg-4" style="background: #a7000008;">
                <h2 class="text-center p-2 text-warning" style="font-family:HELVETICANEUELTSTD-bold !important;">Recent Articles</h2>
                    <div class="row">
                        @foreach($blog_posts as $r)
                        <div class="col-md-3 py-3">
							<a style="text-decoration: none " class="text-dark" href="{{route('article-page',$r->slug)}}">
								<div class="card zoom border">
									<img src="{{asset('uploads/post/'.$r->featured_image)}}" class="card-img-top" alt="..." style="height: 343px;">
									<div class="card-body"> <h6 class="text-center"> {{$r->title}} </h6> </div>
									<div class="card-footer">

									<img class="avatar avatar-30 photo lazyload in" height="30" width="30" src="{{asset('uploads/post/'.$r->featured_image)}}" class="card-img-top" alt="...">
										<small class="text-muted">{{$r->created_at}} |<span class="by"> by</span><strong>
                                            {{$r->admin->name}}</strong> </small>
									</div>
								</div>
							</a>
                        </div>
                        @endforeach
                       {{-- <div class="col-md-3 py-3">
                            <a style="text-decoration: none " class="text-dark" href="{{route('article-page',1)}}">
                                <div class="card zoom border">
                                    <img src="{{asset('uploads/products/1992777454tinted-metal-letters.jpg')}}" class="card-img-top" alt="..." style="height: 343px;">
                                    <div class="card-body"> <h6 class="text-center"> Tinted Metal Letters </h6> </div>
                                    <div class="card-footer">

                                        <img class="avatar avatar-30 photo lazyload in" height="30" width="30" src="{{asset('uploads/products/817767952bronze-tinted-metal-letters.jpg')}}" class="card-img-top" alt="...">
                                        <small class="text-muted">March 30, 2021 |<span class="by"> by</span><strong>
                                                SIGNCITI</strong> </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 py-3">
							<a style="text-decoration: none " class="text-dark" href="{{route('article-page',1)}}">
								<div class="card zoom border">
									<img src="{{asset('front_end/images/aluminum-ampersand-photo.png')}}" class="card-img-top" alt="..." style="height: 343px;">
									<div class="card-body">
										<h6 class="text-center">Oxidized Aluminum Letters</h6>
									</div>
									<div class="card-footer">
										<img class="avatar avatar-30 photo lazyload in" height="30" width="30"
											 data-src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-ampersand-photo.png"
											 src="https://www.woodlandmanufacturing.com/skin/frontend/wmi/default/images/product_marketing/aluminum-ampersand-photo.png">
										<small class="text-muted">March 30, 2021 |<span class="by"> by</span><strong>
												SIGNCITI</strong> </small>
									</div>
								</div>
							</a>
                        </div>
                        <div class="col-md-3 py-3">
							<a style="text-decoration: none " class="text-dark" href="{{route('article-page',1)}}">
								<div class="card zoom border">
									<img src="{{asset('uploads/products/1315398824aluminum-letters-oxidized.jpg')}}" class="card-img-top" alt="..." style="height: 343px;">
									<div class="card-body"> <h6 class="text-center">Anodized Aluminum Letters</h6>
									</div>
									<div class="card-footer">
										<img class="avatar avatar-30 photo lazyload in" height="30" width="30" src="{{asset('uploads/products/1036389023aluminum-letters-oxidized-light.jpg')}}" class="card-img-top" alt="...">
										<small class="text-muted">March 30, 2021 |<span class="by"> by</span><strong>
												SIGNCITI</strong> </small>
									</div>
								</div>
							</a>
                        </div>
                        <div class="col-md-3 py-3">
							 <a style="text-decoration: none " class="text-dark" href="{{route('article-page',1)}}">
								<div class="card zoom border">
									<img src="{{asset('uploads/products/baltic-birch-ampersand-photo.png')}}" class="card-img-top" alt="..." style="height: 343px;">
									<div class="card-body">
									   <h6 class="text-center">Aluminum Small Metal Letters</h6>
									</div>
									<div class="card-footer">
										<img class="avatar avatar-30 photo lazyload in" height="30" width="30" src="{{asset('uploads/products/baltic-birch-ampersand-photo.png')}}" class="card-img-top" alt="...">
										<small class="text-muted">March 30, 2021 |<span class="by"> by</span><strong>
												SIGNCITI</strong> </small>
									</div>
								</div>
							</a>
                        </div>--}}
                    </div>
				</div>
				<div class="col-md-12 p-lg-4" style="">
					<div class="row">
						<div class="col-md-12 p-3">
							<h2 class="pt-3 pb-3 text-warning">Sign Letters</h2>
							<p class="">
								CITI SIGNS specializes in the production of quality signs using materials such as wood,
								plastic, metal, and other durable materials for economical signs.
							</p>
							<p class="">
								We design and produce custom lettering at affordable prices. We can outfit any type of organization with a beautiful custom sign for any budget with virtually unlimited capabilities in our shop. Customers' ideas and designs are cut to order using wooden sign letters, plastic sign letters, and metal sign letters embellished with logos and unique shapes. We offer a dedicated staff of experts who are eager to help any customer and will create any custom order within a short timeframe. Find the perfect sign letter at the right price by browsing our sign letter options, or call us with a custom sign design and we'll help you out.
							</p>
						</div>
						<div class="col-md-3 py-3">
                            <div class="card zoom border">
                                <img src="{{asset('uploads/products/1943555160painted-mdf-prod.jpg')}}" class="card-img" alt="..."  data-toggle="modal" data-target="#myModal" onclick="currentSlide(1)">
                                <div class="card-body text-center">
                                    <a style="text-decoration: none " class="text-dark" href="#">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<h6 class="text-center">Personalize New Carport </h6>
										<small class="text-muted text-center">Reviewed by |<span class="by"> by</span><strong> Holly C</strong> </small>
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-3">
                            <div class="card zoom border">
                                <img src="{{asset('uploads/products/2068974510painted-baltic.jpg')}}" class="card-img" alt="..."  data-toggle="modal" data-target="#myModal" onclick="currentSlide(2)">
                                <div class="card-body text-center">
                                    <a style="text-decoration: none " class="text-dark" href="#">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<h6 class="text-center">Excellent quality. Beautiful sign. </h6>
										<small class="text-muted text-center">Reviewed by |<span class="by"> by</span><strong> Holly C</strong> </small>
									</a>
                                </div>
                            </div>
                        </div>
						<div class="col-md-3 py-3">
                            <div class="card zoom border">
                                <img src="{{asset('uploads/products/1492839091x_1.jpg')}}" class="card-img" alt="..."  data-toggle="modal" data-target="#myModal" onclick="currentSlide(3)">
                                <div class="card-body text-center">
                                    <a style="text-decoration: none " class="text-dark" href="#">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<h6 class="text-center">Beautiful custom sign</h6>
										<small class="text-muted text-center">Reviewed by |<span class="by"> by</span><strong> Holly C</strong> </small>
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-3">
                            <div class="card zoom border">
                                <img src="{{asset('uploads/products/357339315premium-mdf.jpg')}}" class="card-img" alt="..."  data-toggle="modal" data-target="#myModal" onclick="currentSlide(4)">
                                <div class="card-body text-center">
                                    <a style="text-decoration: none " class="text-dark" href="#">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<h6 class="text-center">Perfect for nursery!</h6>
										<small class="text-muted text-center">Reviewed by |<span class="by"> by</span><strong> Holly C</strong> </small>
									</a>
                                </div>
                            </div>
                        </div>
					</div>
			    </div>
            </div>
            <div class="modal fade p-0" id="myModal">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Product Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8 border">
                                    <div class="mySlides">
                                      <img src="{{asset('uploads/products/1943555160painted-mdf-prod.jpg')}}" style="width:100%">
                                    </div>
                                    <div class="mySlides">
                                      <img src="{{asset('uploads/products/2068974510painted-baltic.jpg')}}" style="width:100%">
                                    </div>
                                    <div class="mySlides">
                                      <img src="{{asset('uploads/products/1492839091x_1.jpg')}}" style="width:100%">
                                    </div>
                                    <div class="mySlides">
                                      <img src="{{asset('uploads/products/357339315premium-mdf.jpg')}}" style="width:100%">
                                    </div>
                                    <div class="mySlides">
                                      <img src="{{asset('uploads/products/357339315premium-mdf.jpg')}}" style="width:100%">
                                    </div>
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    <div class="caption-container">
                                      <p id="caption"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
										<a style="text-decoration: none " class="text-dark" href="#">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<h6 class="">Perfect for nursery!</h6>
											<small class="text-muted text-center">Reviewed by |<span class="by"> by</span><strong> Holly C</strong> </small>
										</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="border rounded">
                                          <img class="demo cursor" src="{{asset('uploads/products/1943555160painted-mdf-prod.jpg')}}" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
                                        </div>
                                        <div class="border rounded">
                                          <img class="demo cursor" src="{{asset('uploads/products/357339315premium-mdf.jpg')}}" style="width:100%" onclick="currentSlide(2)" alt="Snow">
                                        </div>
                                    </div>
                                    <div class="mt-2">
										<h6>They look great in my foyer. Just as I envisioned it.</h6>
										<P>Chase worked patiently with me so that I could get the correct size, color, and look that I wanted.</P>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn bg-warning text-white" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
            }
        </script>
@endsection
