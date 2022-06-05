<h2>edit form will be here</h2>

<form action="/designation/{{$data->fid}}" method="post">
    @csrf
    @method('put')
    Employee ID: <input type="number" name="emid" value="{{$data->fid}}" disabled><br>
    Employee Designation: <input type="text" name="designation" value="{{$data->designation}}"><br>
    <button type="submit">Update Designation</button>
</form>