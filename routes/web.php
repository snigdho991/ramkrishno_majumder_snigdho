<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProblemSolverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ramkrishno_majumder_snigdho/solution/1', [ProblemSolverController::class, 'problem_one_solution'])->name('problem.one.solution');
Route::get('/ramkrishno_majumder_snigdho/solution/2', [ProblemSolverController::class, 'problem_two_solution'])->name('problem.two.solution');
Route::get('/ramkrishno_majumder_snigdho/solution/3', [ProblemSolverController::class, 'problem_three_solution'])->name('problem.three.solution');


