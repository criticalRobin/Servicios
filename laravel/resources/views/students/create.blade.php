@extends("students/template")
@section("content")
<form action="{{url('/students')}}" method="POST">
    @csrf
    <div>
        <label for="id">Id</label>
        <input type="text" id="id" name="id">
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="lastName">LastName</label>
        <input type="text" id="lastName" name="lastName">
    </div>
    <div>
        <label for="courseId">Course</label>
        <input type="text" id="courseId" name="courseId">
    </div>
    <button type="submit">Save</button>
</form>