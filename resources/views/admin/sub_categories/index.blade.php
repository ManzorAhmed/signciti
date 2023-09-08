@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Sub Categories</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Manage Sub Categories</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <div class="btn-group pull-right" role="group">
                        <a class="btn btn-danger m-l-5" onclick="del_selected()" href="javascript:void(0)">
                            <i class="fa fa-trash"></i> Delete All
                        </a>
                        <a class="btn btn-success pull-right" href="{{route('sub-categories.create')}}">
                            <i class="fa fa-plus"></i> Add New SubCategory
                        </a>
                    </div>
                    <h3 class="box-title m-b-0">Manage Sub Categories</h3>
                    <p class="text-muted m-b-30">Sub Categories List</p>
                    <div class="table-responsive">
                        <form action="{{url('admin/delete-selected-sub-categories')}}" method="post" id="uform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table id="users" class="table table-striped responsive nowrap" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox checkbox-success m-0">
                                            <input id="checkbox3" type="checkbox">
                                            <label for="checkbox3"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($category->subCategory as $r)
                                    <tr>
                                        <td>
                                            <div class="checkbox checkbox-success m-0">
                                                <input id="checkbox3{{$r->id}}" name="categories_id[]"
                                                       value="{{$r->id}}" type="checkbox">
                                                <label for="checkbox3{{$r->id}}"></label>
                                            </div>
                                        </td>
                                        <td>{{$r->name}}</td>
                                        <td>{{$r->slug}}</td>
                                        <td>
                                            <a class="btn btn-info btn-circle"
                                               onclick="event.preventDefault();viewInfo({{$r->id}});"
                                               title="View Details" href="javascript:void(0)">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a title="Edit Row" class="btn btn-primary btn-circle"
                                               href="{{route('sub-categories.edit',$r->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-circle"
                                               onclick="event.preventDefault();del({{$r->id}});"
                                               title="Delete User" href="javascript:void(0)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a title="Sub Categories" class="btn btn-sm btn-success"
                                               href="{{route('inner-sub-categories.index',$r->id)}}">
                                                Inner Sub Categories
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>

                    <!-- sample modal content -->
                    <div id="userModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Category Details</h4></div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script type="text/javascript">
        function del(id) {
            swal({
                    title: "Are you sure?",
                    text: "This Sub Category will be deleted permanently",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function () {
                    var APP_URL = {!! json_encode(url('/')) !!}

                        window.location.href = APP_URL + "/admin/sub-categories/delete/" + id;
                });

        }

        function del_selected() {
            swal({
                title: "Are you sure?",
                text: "These sub-category/categories will be deleted permanently",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $("#uform").submit();
                setTimeout(function () {
                    swal("Sub Category deleted successfully. Thanks");
                }, 2000);
            });
        }
    </script>

    <script>

        $(document).on('click', 'th input:checkbox', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });

        /*var users = $('#users').DataTable({
            "order": [
                [1, 'asc']
            ],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "{{ route('admin.getCategories') }}",
                "dataType": "json",
                "type": "POST",
                "data": {"_token": "<?php echo csrf_token() ?>"}
            },
            "columns": [
                {"data": "id", "searchable": false, "orderable": false},
                {"data": "name"},
                {"data": "slug"},
                {"data": "action", "searchable": false, "orderable": false}
            ]
        });*/

        function viewInfo(id) {
            $.LoadingOverlay("show");
            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getSubCategory') }}", {_token: CSRF_TOKEN, id: id}).done(function (response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#userModel').modal('show');
                $.LoadingOverlay("hide");
            });
        }
    </script>
@endsection
@stop
