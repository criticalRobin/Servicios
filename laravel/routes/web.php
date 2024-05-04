<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/students", [StudentController::class, "index"]);
Route::get("/students/create", [StudentController::class, "create"]);
Route::post("/students", [StudentController::class, "store"]);
Route::delete("/student/{id}", [StudentController::class, "delete"]);
Route::get("/students/{id}/edit", [StudentController::class, "edit"]);
Route::put("/students/{id}", [StudentController::class, "update"]);
