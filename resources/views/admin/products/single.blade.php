<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <th>Slug</th>
            <td>{{$product->slug}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">Description</th>
        </tr>
        <tr>
            <td colspan="2">{{$product->description}}</td>
        </tr>
        <tr>
            <th>Image</th>
            @if(File::exists('uploads/products/'.$product->image))
                <td>
                    <img src="{{asset('uploads/products/'.$product->image)}}"
                         style=" width:120px;max-width:100%;margin-top:12px"/>
                </td>


            @endif
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{$product->created_at}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if($product->status=="1")
                    <span class="btn btn-sm btn-success">Published</span>
                @else
                    <span class="btn btn-sm btn-warning">Not Published</span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
