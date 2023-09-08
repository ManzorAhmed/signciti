@extends('theme.layouts.master')
@section('content')
    <div class="container-fluid bg-white">
        <div class="mx-auto">
            <div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">
                <div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center text-white">
                    <h1 class="text-warning" style="font-weight: bold;">Custom Signs</h1>
                    <h4>
                        CUSTOM SIGN QUESTIONS
                    </h4>
                    <p class="lead">
                        <a class="btn btn bg_green btn_radius" href="https://test.signciti.com/custome-sign"
                           role="button">
                            <span class="text-white jumbotron_btn ">DESIGN A SIGN</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row p-2 mb-3" style="background-color: #ffffff">
            <div class="col-md-12" style="background-color: #e5e5e557 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class=" pt-5 text-center font-weight-bold">{{$about_us->heading1}}</h5>
                            <p class=" lead text-justify px-2" style="font-size: 16px;">
                                {{$about_us->paragraph1}}
                            </p>
                            <p class=" lead text-justify px-2" style="font-size: 16px;">
                                {{$about_us->paragraph2}}
                            </p>
                        </div>

                        <div class="col-md-8 p-2">
                            @isset($about_us->image1)
                                <img class="rounded w-100" src="{{asset('uploads/'.$about_us->image1)}}"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2 mb-3" style="background-color: #ffffff">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 p-2">
                                <img class="rounded w-100" src="{{asset('uploads/'.$about_us->image2)}}"/>
                        </div>
                        <div class="col-md-4">
                            <h5 class=" pt-5 text-center font-weight-bold">{{$about_us->heading2}}</h5>
                            <p class=" lead text-justify px-2" style="font-size: 16px;">
                                {{$about_us->paragraph3}}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2 mb-3" style="background-color: #ffffff">
            <div class="col-md-12" style="background-color: #e5e5e557 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class=" pt-5 text-center font-weight-bold">{{$about_us->heading3}}</h5>
                            <p class=" lead text-justify px-2" style="font-size: 16px;">
                                {{$about_us->paragraph4}}
                            </p>
                            <p class=" lead text-justify px-2" style="font-size: 16px;">
                                {{$about_us->paragraph5}}
                            </p>
                            <div class="pb-3 d-none" style="text-align: center">
                                <a class="btn_radius btn btn-primary btn-sm px-3" href="#" role="button">
                                    <!--                <i class="fa fa-phone ml-3 jumbotron_icon" style=""></i>-->
                                    <span class="text-white mr-3 jumbotron_phone_no">Customize Yard Letters</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 p-2">
                            <img class="rounded w-100" src="{{asset('uploads/'.$about_us->image3)}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


