<div class="table-responsive">
    <table cellspacing="0" cellpadding="0" class="table pmd-table table-striped"
           id="table-propeller">
        <thead class="thead-light">
        <tr>
            <th>Height</th>
            <th>Pricing</th>
        </tr>
        </thead>
        <tbody>
        @foreach($height as $index=>$value)
            @php
                $pricing = App\PriceHeight::where('height',$value)
                 ->where('product_id',$product->id)
                 ->first();
            @endphp
            {{--                            @dd($pricing->price)--}}
            <tr>
                <td>{{$value}}</td>
                @if($pricing!==null)
                    <td>$ {{number_format((float)$pricing->price, 2, '.', '')}}</td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
