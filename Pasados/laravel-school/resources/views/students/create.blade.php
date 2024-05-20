@extends('students/template')
@section('title', 'Create New Student')
@section('content')
<div class="container">
    <form action="{{url('/students')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div>
            <label for="id">Id</label>
            <input type="number" id="id" name="id" placeholder="Type the Id">
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Type the name">
        </div>
        <div>
            <label for="lastName">LastName</label>
            <input type="text" id="lastName" name="lastName" placeholder="Type the lastName">
        </div>
        <div>
            <label for="courseId">CourseId</label>
            <input type="number" id="courseId" name="courseId" placeholder="Type the courseId">
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection