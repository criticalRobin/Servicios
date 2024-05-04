@extends("students/template")
@section("content")
<form action="{{url("/students/" . $student["id"])}}" method="POST">
    @csrf
    @method("PUT")
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{$student["name"]}}">
    <label for="lastName">LastName</label>
    <input type="text" id="lastName" name="lastName" value="{{$student["lastName"]}}">
    <label for="courseId">Course</label>
    <input type="text" id="courseId" name="courseId" value="{{$student["courseId"]}}">
    <button type="submit">Save</button>
</form>