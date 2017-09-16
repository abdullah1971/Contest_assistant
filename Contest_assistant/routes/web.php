<?php

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

Route::get('/', 'StudentController@contestShow')->name('home_page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('/admin/problem/new', 'problemController@pdfShow');



Route::group(['middleware' => ['auth']], function(){






	Route::get('/admin/contest/{id}/upload/problem/{number}','problemController@uploadProblem')->name('problem.upload');

	Route::get('/admin/contest/{id}/upload/additional_problem', 'problemController@addAdditionalProblem')->name('problem.additional_problem');

	Route::post('/admin/contest/{id}/upload/addtional_problem/store', 'problemController@addAdditionalProblemStore')->name('problem.additional_problem_store');

	Route::get('/admin/contest/{id}/problem/{number}/update', 'problemController@singleProblemUpdate')->name('problem.singleProblemUpdate');

	Route::post('/admin/contest/{id}/problem/{number}/update', 'problemController@singleProblemUpdateStore')->name('problem.singleProblemUpdateStore');

	Route::DELETE('/admin/contest/{id}/problem/{number}/delete', 'problemController@singleProblemDelete')->name('problem.singleProblemDelete');




	Route::get('admin/contest/{id}/problem/{number}/solution/{no}', 'SolutionController@update_page')->name('solution.update_page');

	Route::post('admin/contest/{id}/problem/{number}/solution/{no}', 'SolutionController@updateSolution')->name('solution.update');

	Route::DELETE('admin/contest/{id}/problem/{number}/solution/{no}', 'SolutionController@deleteSolution')->name('solution.delete');




	Route::get('admin/contest/{id}/problem/{number}/judges_io', 'SolutionController@judgesIO')->name('solution.judges_io');

	Route::post('admin/contest/{id}/problem/{number}/judges_io', 'SolutionController@judgesIOStore')->name('solution.judges_io_store');

	Route::get('admin/contest/{id}/problem/{number}/judges_io_update/{no}', 'SolutionController@judgesIOUpdate')->name('solution.judges_io_update');

	Route::post('admin/contest/{id}/problem/{number}/judges_io_update/{no}', 'SolutionController@judgesIOUpdateStore')->name('solution.judges_io_update_store');



	Route::get('admin/contest/{id}/editorial', 'problemController@addEditorial')->name('problem.add_editorial');

	Route::post('admin/contest/{id}/editorial', 'problemController@addEditorialStore')->name('problem.add_editorial_store');


	Route::get('admin/contest/{id}/editorial/update', 'problemController@addEditorialUpdate')->name('problem.add_editorial_update');


	Route::post('admin/contest/{id}/editorial/update', 'problemController@addEditorialUpdateStore')->name('problem.add_editorial_update_store');




	Route::get('admin/contest/{id}/problem/{number}/add_judges_solution', 'problemController@addJudgesSolution')->name('problem.add_judges_solution');

	Route::post('admin/contest/{id}/problem/{number}/add_judges_solution', 'problemController@addJudgesSolutionStore')->name('problem.add_judges_solution_store');

	Route::get('admin/contest/{id}/problem/{number}/update_judges_solution/{no}', 'problemController@updateJudgesSolution')->name('problem.update_judges_solution');

	Route::post('admin/contest/{id}/problem/{number}/update_judges_solution/{no}', 'problemController@updateJudgesSolutionStore')->name('problem.update_judges_solution_store');






	Route::get('/admin/problem/add-solution/{id}', 'problemController@addSolution')->name('problem.solution');
	Route::post('/admin/problem/add-solution/{id}', 'problemController@storeSolution')->name('problem.solution_store');


	Route::resource('/admin/contest', 'contestController');
	Route::resource('/admin/problem', 'problemController');


});



Route::get('/student/contest', 'StudentController@contestShow')->name('student.contest_show');
Route::get('/student/contest/{id}', 'StudentController@contestDetails')->name('student.contest_details');
Route::get('/student/problem/{id}', 'StudentController@problemDetails')->name('student.problem_details');


