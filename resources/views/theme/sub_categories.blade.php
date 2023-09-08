@extends('theme.layouts.master')
@section('content')
    <div class="container-fluid bg-white">
        <div class="row bg-white">
            <div class="col-md-12 p-3 text-center">
                <h2 class="text-warning">Custom Signs</h2>
            </div>
            @foreach($categories as $r)
                @foreach($r->innerSubCategory as $r)
                    <div class="col-md-3 mb-lg-5 p-4">
                        <div class="card zoom border">
                            <a style="text-decoration: none " class="text-dark" href="{{route('products',$r->slug)}}">
                                <img src="{{asset('uploads/images/'.$r->image)}}" class="w-100 rounded-top"
                                     style="height:300px">
                                <div class="card-body">
                                    <h6 class="text-left">{{$r->name}}</h6>
                                </div>
                            </a>
                            <div class="card-footer d-none">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
