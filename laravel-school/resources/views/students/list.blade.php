@extends('students/template')
@section('title', 'Show Student')
@section('content')
<h1>Students List</h1>
<div>
    <form action="{{url('/students/filtered')}}">
        <label for="level">Filtrar por Nivel de Curso:</label>
        <input type="text" id="level" name="level" placeholder="Levele">
        <label for="parallel">Filtrar por Paralelo de Curso:</label>
        <input type="text" id="parallel" name="parallel" placeholder="Levele">
        <button type="submit">Filtrar</button>
    </form>
</div>
<div>
    <form id="studentForm">
        <label for="id">ID del Estudiante:</label>
        <input type="text" id="id" name="id" placeholder="Ingresa el ID del estudiante">
        <button type="submit">Ir al Estudiante</button>
    </form>
<script>
    document.getElementById("studentForm").addEventListener("submit", function(event) {
        event.preventDefault(); 
        
        var id = document.getElementById("id").value; // 
        window.location.href = "/students/" + id;
    });
</script>
</div>
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
            <td>
                <form action="{{url('/students') . '/' . $student['id']}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            <td><a href="{{url('/students') . '/' . $student['id'] . '/edit'}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table> 
<a href="{{url('/students/create')}}">Create</a>
@endsection