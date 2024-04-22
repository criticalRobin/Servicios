<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    private static $url = "http://localhost/Quinto/SchoolApi/controllers/endpoints.php";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(static::$url . "/students");
        $students = $response->json();

        return view('students.list', compact('students'));
    }

    public function indexFiltered(Request $request){
        $response = Http::get(static::$url . "?level=" . $request->input('level') . "&parallel=" . $request->input('parallel'));
        $students = $response->json();

        return view('students.filtered', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::asForm()->post(static::$url, [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'courseId' => $request->input('courseId'),
        ]);

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get(static::$url);
        $students = $response->json();
        $student = collect($students)->firstWhere('id', $id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get(static::$url);
        $students = $response->json();
        $student = collect($students)->firstWhere('id', $id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'courseId' => $request->input('courseId'),
        ];
        $response = Http::put(static::$url . "?id=" . $id, $data);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete(static::$url . "?id=" . $id);

        return redirect('/students');
    }
}
