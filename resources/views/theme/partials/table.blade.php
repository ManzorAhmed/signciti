<div class="table-responsive">
	<table cellspacing="0" cellpadding="0" class="table pmd-table table-striped"
		   id="table-propeller">
		<thead class="thead-light">
		<tr>
			<th scope="col"></th>
			@foreach($thickness as $key_thickness=>$value_thickness)
				<th scope="col" style="text-align: center">{{$value_thickness}} Inch</th>
			@endforeach
		</tr>
		</thead>
		<tbody>
		@foreach($height as $index=>$name)
			<tr>
				<th scope="row" width="100px">{{ $name }} Inch</th>
				@foreach($thickness as $key_thickness=>$value_thickness)
					@php
						$pricing = App\Pricing::where('thickness',$value_thickness)
						 ->where('height',$name)
						 ->where('product_id',$product->id)
						 ->get();
					@endphp
					@if($pricing->count() == 0)
						<td style="text-align: center"></td>
					@else
						@php $price=\App\Pricing::where('thickness',$value_thickness)
						->where('product_id',$product->id)
						->get();
						@endphp
						@foreach($price as $r)
							@if($name == $r->height && $value_thickness)
								<?php /*print_r($r->height) */?>
								<td style="text-align: center">
									$ {{number_format((float)$r->price, 2, '.', '')}}
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
