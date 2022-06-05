<h2>Add designation to employee</h2>

@if (Session::has('msg'))
    {{Session::get('msg')}}
@endif

<form action="/designation" method="post">
    @csrf
    Employee ID: <input type="number" name="emid"><br>
    Employee Designation: <input type="text" name="designation"><br>
    <button type="submit">Add Designation</button>
</form>