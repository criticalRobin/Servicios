@extends('students/template')
@section('title', 'Show Student')
@section('content')
<h1>Students List</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>LastName</th>
            <th>Course Id</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student['id']}}</td>
            <td>{{$student['name']}}</td>
            <td>{{$student['lastName']}}</td>
            <td>{{$student['courseId']}}</td>
            <td><a href="#">Edit</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table> 
<a href="#">Create</a>