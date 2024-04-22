@extends('students/template')
@section('title', 'Create New Student')
@section('content')
<div class="container">
    <form action="{{url('students/'.$student['id'])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{$student['name']}}">
        </div>
        <div>
            <label for="lastName">LastName</label>
            <input type="text" id="lastName" name="lastName" value="{{$student['lastName']}}">
        </div>
        <div>
            <label for="courseId">CourseId</label>
            <input type="number" id="courseId" name="courseId" value="{{$student['courseId']}}">
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection