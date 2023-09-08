<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Name</th>
            <td>{{$contact->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$contact->email}}</td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>{{$contact->subject}}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{$contact->message}}</td>
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{$contact->created_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
