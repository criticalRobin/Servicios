<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    private static $url = "http://localhost/quinto/students-api/controllers/endpoints.php";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(self::$url . "/students");
        $students = $response->json();

        return view("students.list", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::asForm()->post(self::$url, [
            "id" => $request->input("id"),
            "name" => $request->input("name"),
            "lastName" => $request->input("lastName"),
            "courseId" => $request->input("courseId")
        ]);

        return redirect("/students");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get(self::$url);
        $students = $response->json();
        $student = collect($students)->firstWhere('id', $id);

        return view('students.edit', compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->input("name"),
            'lastName' => $request->input("lastName"),
            'courseId' => $request->input("courseId")
        ];
        $response = Http::put(static::$url . "?id=" . $id, $data);

        return redirect("/students");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete(self::$url . "?id=" . $id);

        return redirect("/students");
    }
}
