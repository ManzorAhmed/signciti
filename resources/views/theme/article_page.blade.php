@extends('theme.layouts.master')
@section('content')
<style>
@media screen and (max-width: 768px)
{
    .w-md-0 {
        width: 100% !important;
    }
}
.w-93
{
	width:93%;
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 m-auto">
			<section class="mbr-section content4 cid-qv5zj5r8jw" id="content4-12" data-rv-view="10651">
				<div class="p-4">
					<div class="media-container-row">
						<div class="title col-md-12 ">
							<h2 class="text-center mbr-fonts-style display-3">
                                {{$blog_post->title}}
							</h2>
							<h3 class="mbr-section-subtitle text-center mbr-light mbr-fonts-style display-5">
								We provide the best and most gorgeous looking letters that will captivate everyone in the room.
							</h3>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<section class="mbr-section content6 cid-qv5zlioaYy" id="content6-1a" data-rv-view="10653">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-12">
                <div class="media-container-row d-lg-flex">
                    <div class="mbr-figure" style="">
{{--                      <img class="w-93" src="https://test.signciti.com/uploads/products/352924536aluminum-letters-oxidized-medium.jpg" alt="Mobirise" title="" media-simple="true">--}}
                      <img class="w-93" src="{{asset('uploads/post/'.$blog_post->blog_image)}}" alt="Mobirise" title="" media-simple="true">
                    </div>
                    <div class="media-content align-self-center w-75 m-auto">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7">
                               <strong>{{$blog_post->title}}</strong>
                                {{$blog_post->paragraph1}}
                            </p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div><br>
    <div class="container-fluid">
		<div class="row" style="background-color: #dad4baa8 !important;">
			<div class="col-md-7 m-auto p-3  text-center">
				<hr class="line" style="width: 50%;border: 1px solid #bcbaba;background: #828282bf;border-radius: 9px;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">
                    {{$blog_post->paragraph2}}
                </div>
				<hr class="line" style="width: 50%;border: 1px solid #bcbaba;background: #828282bf;border-radius: 9px;">
			</div>
		</div>
	</div>  <br>
    <div class="container">
		<div class="media-container-row">
            <div class="col-12 col-md-12">
                <div class="media-container-row d-lg-flex">
                    <div class="media-content align-self-center w-75 m-auto">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7">
                               <strong>{{$blog_post->title}}</strong>
                                {{$blog_post->paragraph3}}
						   </p>
                        </div>
                    </div><br>
					<div class="mbr-figure" style="">
                      <img class="w-93"  src="{{asset('uploads/post/'.$blog_post->blog_image2)}}" alt="Mobirise" title="" media-simple="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br>
@endsection
