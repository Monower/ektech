@extends('layout.master')




@section('form')
    <div style="text-align: center">
        <form action="{{route('designation.store')}}" method="POST">

            @if (Session::has('msg'))
                <div style="color: rgb(11, 26, 189)">{{Session::get('msg')}}</div>
            @endif
            @csrf
            @error('name')
                <div style="color: red">{{$message}}</div>                
            @enderror
            <br>
            Name: <input type="text" name="name" value="{{old('name')}}"><br>
            @error('email')
            <div style="color: red">{{$message}}</div>                
        @enderror
            Email: <input type="email" name="email" value="{{old('email')}}"><br>
            @error('age')
            <div style="color: red">{{$message}}</div>                
        @enderror
            Age: <input type="number" name="age" value="{{old('age')}}"><br>
            @error('address')
            <div style="color: red">{{$message}}</div>                
        @enderror
            Address: <input type="text" name="address" value="{{old('address')}}"><br>
            @error('designation')
            <div style="color: red">{{$message}}</div>                
        @enderror
            Designation: <input type="text" name="designation" value="{{old('designation')}}"><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    
@endsection