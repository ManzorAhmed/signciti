<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Category</th>
            <td>{{$categories->name}}</td>
        </tr>
        <tr>
            <th>Slug</th>
            <td>{{$categories->slug}}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                @if(File::exists('uploads/images/'.$categories->image))
                    <img src="{{asset('uploads/images/'.$categories->image)}}"
                         style=" width:120px;max-width:100%;margin-top:12px"/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{$categories->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
