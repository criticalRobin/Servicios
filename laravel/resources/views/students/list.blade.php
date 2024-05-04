@extends("students/template")
@section("content")
<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>LastName</th>
                <th>CourseId</th>
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
                <td><a href="{{url("/students/" . $student["id"] . "/edit")}}">Update</a></td>
                <td>
                <form action="{{url('/students') . '/' . $student['id']}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{url('students/create')}}">Create</a>
</div>
@endsection