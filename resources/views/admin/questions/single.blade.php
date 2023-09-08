<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr class="">
            <th class="text-center" colspan="2"><h5>Question</h5></th>
        </tr>
        <tr>
            <td colspan="2" class="text-center">{{$question->question}}</td>
        </tr>
        <tr class="">
            <th class="text-center" colspan="2"><h5>Answer</h5></th>
        </tr>
        <tr>
            <td colspan="2" class="text-center">{{$question->answer}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($question->status)
                    <span class="btn btn-sm btn-success">Published</span>
                @else
                    <span class="btn btn-sm btn-warning">Not Published</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{$question->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
