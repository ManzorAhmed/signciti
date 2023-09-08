@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Questions</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Manage Questions</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            @include('admin.partials._msg')
            <div class="col-sm-12">
                <div class="white-box">
                    <a class="btn btn-danger pull-right m-l-5" onclick="del_selected()" href="javascript:void(0)">
                        <i class="fa fa-trash"></i> Delete All
                    </a>
                    <a class="btn btn-success pull-right" href="{{route('questions.create')}}">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                    <h3 class="box-title m-b-0">Manage Questions</h3>
                    <p class="text-muted m-b-30">Question List</p>
                    <div class="table-responsive">
                        <form action="{{url('admin/delete-selected-questions')}}" method="post" id="uform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table id="users" class="table table-striped responsive nowrap" width="100%">
                                <thead>
                                <th>
                                    <div class="checkbox checkbox-success m-0">
                                        <input type="checkbox">
                                        <label for="checkbox3"></label>
                                    </div>
                                <th>Question</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($questions as $r)
                                    <tr id="{{$r->id }}">
                                        <td>
                                            <div class="checkbox checkbox-success m-0">
                                                <input id="checkbox3' . {{$r->id}}. '" type="checkbox"
                                                       name="questions[]" value="{{$r->id }}">
                                                <label for="checkbox3' . {{$r->id }} . '"></label>
                                            </div>
                                        </td>
                                        </td>
                                        <td>{{$r->question}}</td>
                                        @if ($r->status)
                                            <td><span class="btn btn-xs btn-success">Published</span></td>
                                        @else
                                            <td><span class="btn btn-xs btn-warning">Not Published</span></td>
                                        @endif
                                        <td>{{date('m-d-Y', strtotime($r->created_at))}}</td>
                                        <td class="">
                                            <a class="btn btn-info btn-circle" onclick="event.preventDefault();
                                                viewInfo({{$r->id}});" title="View Questions"
                                               href="javascript:void(0)">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a title="Edit Questions" class="btn btn-primary btn-circle"
                                               href="{{route('questions.edit', $r->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-circle"
                                               onclick="event.preventDefault();del({{$r->id}});"
                                               title="Delete Board Members" href="javascript:void(0)">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
                                    <h4 class="modal-title" id="myModalLabel">Question Detail</h4></div>
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
    <script src="{{asset('js/sortable.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $(".table tbody").sortable({
                    opacity: 0.6, cursor: 'move', update: function () {
                        var order = $(this).sortable("toArray");
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.post("{{ url('admin/update-questions-order') }}", {
                            'order': order,
                            '_token': CSRF_TOKEN
                        }, function (theResponse) {
                            $("#contentRight").html(theResponse);
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        function del(id) {
            swal({
                    title: "Are you sure?",
                    text: "This question will be deleted permanently",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function () {
                    var APP_URL = {!! json_encode(url('/')) !!}

                        window.location.href = APP_URL + "/admin/questions/delete/" + id;
                });

        }

        function del_selected() {
            swal({
                title: "Are you sure?",
                text: "These question/questions will be deleted permanently",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $("#uform").submit();
                setTimeout(function () {
                    swal("Questions deleted sucessfully. Thanks");
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

        /*
                var users = $('#users').DataTable({
                    "order": [
                        [1, 'asc']
                    ],
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,
                    "ajax": {
                        "url": "{{ route('admin.getQuestions') }}",
                "dataType": "json",
                "type": "POST",
                "data": {"_token": "<?php echo csrf_token() ?>"}
            },
            "columns": [
                {"data": "id", "searchable": false, "orderable": false},
                {"data": "question"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "action", "searchable": false, "orderable": false}
            ]
        });
*/

        function viewInfo(id) {
            $.LoadingOverlay("show");
            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getQuestion') }}", {_token: CSRF_TOKEN, id: id}).done(function (response) {
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
