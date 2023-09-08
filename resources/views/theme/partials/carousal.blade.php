
<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
    <!-- slides -->
    <div class="carousel-inner">
        <div class="carousel-item active"> <img src="{{asset('uploads/products/'.$product->image)}}" width="75" alt="Hills"> </div>
        @foreach($product->images as $r)
            <div class="carousel-item"> <img src="{{asset('uploads/products/'.$r->image)}}" width="75" alt="{{$r->image}}"> </div>
        @endforeach
    </div> <!-- Left right -->
    <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
    <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
    <!-- Thumbnails -->
    <ol class="carousel-indicators list-inline">
        <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="{{asset('uploads/products/'.$product->image)}}" width="100" class="img-fluid"> </a> </li>
        @php
            $count=1;
        @endphp
        @foreach($product->images as $r)
            <li class="list-inline-item"> <a id="carousel-selector-{{$count}}" data-slide-to="{{$count}}" data-target="#custCarousel"> <img src="{{asset('uploads/products/'.$r->image)}}" width="100" class="img-fluid"></a></li>
            <?php $count++ ?>
        @endforeach
        {{--<li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letters.jpg" class="img-fluid"> </a> </li>
        <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letter-wood-sign.jpg" class="img-fluid"> </a> </li>
        <li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="3" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" class="img-fluid"> </a> </li>
        <li class="list-inline-item"> <a id="carousel-selector-4" data-slide-to="4" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" class="img-fluid"> </a> </li>
    --}}</ol>
</div>