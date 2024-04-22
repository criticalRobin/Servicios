@extends('students/template')
@section('title', 'Show Student')
@section('content')
<h1>Student {{$student['name']}} {{$student['lastName']}}</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>LastName</th>
            <th>Course Id</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$student['id']}}</td>
            <td>{{$student['name']}}</td>
            <td>{{$student['lastName']}}</td>
            <td>{{$student['courseId']}}</td>
        </tr>
    </tbody>
</table> 
<a href="{{url('/students')}}">Home</a>
@endsection