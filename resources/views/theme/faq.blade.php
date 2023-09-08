@extends('theme.layouts.master')
@section('content')
<?php $count = 1; ?>
<div class="container-fluid"> 
    <div class="mx-auto">
            <div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">
                <div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center text-white"> 
                <h2 class="text-warning" style="font-weight: bold;">Custom Signs</h2> 
                <h5> 
                    CUSTOM SIGN QUESTIONS  
                </h5>
            </div>
        </div>
        <div class="container">
            <div class="row mb-md-3">
                <div class="col-md-12 mx-auto p-2 text-center">
                    <h2>Custom Sign Questions</h2>
                    <div class="before"></div>
                </div>    
                <div class="col-md-12 mx-auto">
                    <div class="accordion" id="faqExample">
                        @foreach($questions as $r)
                        
                            <div class="card border-bottom">
                                <div class="card-header p-2 bg-white" id="heading{{$r->id}}">
                                    <h5 class="mb-0 d-flex toggle_icon" data-toggle="collapse"
                                                data-target="#collapse{{$r->id}}" aria-expanded="false"
                                                aria-controls="collapse{{$r->id}}">
                                        <button class="btn btn-link text-muted font-weight-normal mr-auto collapse{{$r->id}}" type="button">
                                            Q<?php echo $count++; ?>: {{$r->question}}
                                        </button> 
                                        <i class="fas fa-plus text-dark align-self-center"></i>
                                    </h5>
                                </div>
                                <div id="collapse{{$r->id}}" class="collapse" aria-labelledby="heading{{$r->id}}"
                                     data-parent="#faqExample">
                                    <div class="card-body border p-3" style="height: 133px;background-color: #fffafa !important;">
                                        <b>Answer:</b> {{$r->answer}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> 

<script>
 
$('.collapse').on('shown.bs.collapse', function(){
    $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
}).on('hidden.bs.collapse', function(){
    $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
});
</script>
@stop

