<h2>Data will be shown here</h2>

{{-- {{print_r($data)}} --}}


<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Foreign Key</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Age</th>
        <th>Address</th>
        <th>Operations</th>
    </tr>

    @foreach ($data as $data)
        <tr>
            
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->user_id}}</td>
            <td>{{$data->designation}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->age}}</td>
            <td>{{$data->address}}</td>
            <td><a href="designation/{{$data->id}}/edit">Edit</a> <a href="delData/{{$data->id}}">Delete</a></td>

        </tr>
    @endforeach



</table>