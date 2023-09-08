@extends('theme.layouts.master')

@section('content')

    <div class="container-fluid mb-5">

        <div class="mx-auto">

            <div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">

                <div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center text-white">

                    <h1 class="text-warning" style="font-weight: bold;">Custom Signs</h1>

                    <h4>

                        CUSTOM SIGN QUESTIONS

                    </h4>

                </div>

            </div>

            <div class="container border" style="background: #fcfbf273;">

                <!--Section: Contact v.2-->

                <section class="mb-4">

                    <!--Section heading-->

                    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

                    <!--Section description-->

                    <p class="text-center w-responsive mx-auto mb-4">Do you have any questions? Please do not hesitate

                        to contact us directly. Our team will come back to you within

                        a matter of hours to help you.</p>

                    <div class="row">

                        <!--Grid column-->

                        <div class="col-lg-12 m-auto mb-md-0 mb-3">

                            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>

                        </div><br>

                        <div class="col-lg-9 mb-md-0 mt-3 mb-5">

                            @if(Session::has('success_message'))

                                <div class="alert alert-success alert-dismissable">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×

                                    </button>

                                    {{ Session::get('success_message') }}

                                </div>

                            @endif



                            <form id="contact-form" name="contact-form" action="{{route('contact_form.store')}}"

                                  method="POST">

                            @csrf

                            <!--Grid row-->

                                <div class="row">



                                    <!--Grid column-->

                                    <div class="col-md-6">

                                        <div class="md-form mb-0">

                                            <input type="text" id="name" name="name" class="form-control" required>

                                            <label for="name" class="">Your name</label>

                                        </div>

                                    </div>

                                    <!--Grid column-->



                                    <!--Grid column-->

                                    <div class="col-md-6">

                                        <div class="md-form mb-0">

                                            <input type="text" id="email" name="email" class="form-control" required>

                                            <label for="email" class="">Your email</label>

                                        </div>

                                    </div>

                                    <!--Grid column-->



                                </div>

                                <!--Grid row-->



                                <!--Grid row-->

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="md-form mb-0">

                                            <input type="text" id="subject" name="subject" class="form-control"

                                                   required>

                                            <label for="subject" class="">Subject</label>

                                        </div>

                                    </div>

                                </div>

                                <!--Grid row-->



                                <!--Grid row-->

                                <div class="row">



                                    <!--Grid column-->

                                    <div class="col-md-12">



                                        <div class="md-form">

                                            <textarea type="text" id="message" name="message" rows="2"

                                                      class="form-control md-textarea" required></textarea>

                                            <label for="message">Your message</label>

                                        </div>



                                    </div>

                                </div>

                                <!--Grid row-->

                                <div class="text-center text-md-left">

                                    <button type="submit" class="btn bg-warning text-white">Send</Button>

                                </div>

                            </form>

                        </div>

                        <!--Grid column-->



                        <!--Grid column-->

                        <div class="col-lg-3 text-center">

                            <ul class="list-unstyled mb-0">

                                <li>

                                    <a href="#">

                                        <i class="fas fa-map-marker-alt  fa-2x text-warning"></i>

                                        <p>San Francisco, CA 94126, USA</p>

                                    </a>

                                </li>



                                <li>

                                    <a href="tel:718-850-4110">

                                        <i class="fa fa-phone mt-4 fa-2x text-warning"></i>

                                        <p>718-850-4110</p>

                                    </a>

                                </li>



                                <li>

                                    <a href="mailto:info@displaysandbeyond.com">

                                        <i class="fa fa-envelope mt-4 fa-2x text-warning"></i>

                                        <p style="overflow-wrap: anywhere;">info@displaysandbeyond.com</p>

                                    </a>

                                </li>

                            </ul>

                        </div>

                        <!--Grid column-->



                    </div>



                </section>

                <!--Section: Contact v.2-->

            </div>

        </div>

    </div>

@endsection

