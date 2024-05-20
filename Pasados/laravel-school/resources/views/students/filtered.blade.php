@extends('students/template')
@section('title', 'Student')
@section('content')
<h1>Students List</h1>
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
        @foreach($students as $student)
        <tr>
            <td>{{$student['id']}}</td>
            <td>{{$student['name']}}</td>
            <td>{{$student['lastName']}}</td>
            <td>{{$student['courseId']}}</td>
        </tr>
        @endforeach
    </tbody>
</table> 
<a href="{{url('/students')}}">Home</a>
@endsection