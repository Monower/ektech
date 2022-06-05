<form action="/designation/{{$data->id}}" method="POST">
    @csrf

    @method('put')

    <input type="hidden" name="id" value="{{$data->id}}">
    Name: <input type="text" name="name" value="{{$data->name}}"><br>
    Email: <input type="email" name="email" value="{{$data->email}}"><br>
    Age: <input type="number" name="age" value="{{$data->age}}"><br>
    Address: <input type="text" name="address" value="{{$data->address}}"><br>
    Designation: <input type="text" name="designation" value="{{$data->designation}}"><br>
    <button type="submit">submit</button>
</form>
