@extends('theme.layouts.master')
@section('content')
    <div class="container">
        <div class="mx-auto px-5">
            <h2 class="text-center mt-5">Pricing</h2>
            <table cellspacing="0" cellpadding="0" class="table pmd-table table-striped" id="table-propeller">
                <thead class="thead-light">
                <tr>
                    <th scope="col" colspan="2">Thickness</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    @foreach($thickness as $key_thickness=>$value_thickness)
                        <th scope="col" style="text-align: center">{{$value_thickness}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($height as $index=>$name)
                    <tr>
                        <th scope="row" width="100px">{{ $name }}</th>
                        @foreach($thickness as $key_thickness=>$value_thickness)
                            @php
                                $pricing = App\Pricing::where('thickness',$value_thickness)
                                 ->where('height',$name)
                                 ->get();
                            @endphp
                            @if($pricing->count() == 0)
                                <td style="text-align: center"></td>
                            @else
                                @php $price=\App\Pricing::where('thickness',$value_thickness)->get(); @endphp
                                @foreach($price as $r)
                                    @if($name == $r->height && $value_thickness)
                                        <td style="text-align: center">$ {{$r->price}}
                                        </td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
