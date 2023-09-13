<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => '', 'middleware' => 'checkforauth'], function () {

Route::get('/', [App\Http\Controllers\HomeController::class,'index']);

 Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');


Route::get('/jobs/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');

Route::post('/jobs/save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');


Route::post('/jobs/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
// Route::get('/job/{id}/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply1']);
Route::get('/categories/single/{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'jobApply'])->name('categories.single');

Route::get('/users/profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');

Route::get('/users/applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');

Route::get('/users/savedjobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('saved.jobs');

Route::get('/users/edit-details', [App\Http\Controllers\Users\UsersController::class, 'editDetails'])->name('edit.details');

Route::post('/users/edit-details', [App\Http\Controllers\Users\UsersController::class, 'updateDetails'])->name('update.details');

Route::get('/users/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');

Route::post('/users/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');


// Route::get('/home', [App\Http\Controllers\Users\UsersController::class, 'index'])->name('home');


// Route::post('/users/edit-image', [App\Http\Controllers\Users\UsersController::class, 'updateimage'])->name('update.image');


Route::any('/jobs/search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');


});

// Route::middleware(['auth'])->group(function () {
//     Route::get('admin',[App\Http\Controllers\Admins\AdminsController::class, 'adminIndex'])->name('admins.dashboard');
// });

// Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
//     Route::get('/admin',[App\Http\Controllers\Admins\AdminsController::class, 'adminIndex'])->name('admins.dashboard');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'checkforauth'], function () {
    Route::get('/',[App\Http\Controllers\Admins\AdminsController::class, 'viewLogin']);
    Route::get('login',[App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login');
    Route::post('login',[App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
    Route::get('/dashboard', [App\Http\Controllers\Admins\AdminsController::class, 'adminIndex'])->name('admins.dashboard');
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'admins'])->name('view.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('store.admins');
    
    Route::get('/display-categories', [App\Http\Controllers\Admins\AdminsController::class, 'displayCategories'])->name('display.categories');

    Route::get('/create-cates', [App\Http\Controllers\Admins\AdminsController::class, 'createCategories'])->name('create.categories');
    Route::post('/create-cates', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategories'])->name('store.categories');

    //update categories
    Route::get('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateCategories'])->name('update.categories');

    Route::get('/delete-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategories'])->name('delete.categories');


    Route::get('/display-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'allJobs'])->name('display.jobs');
    Route::get('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'storeJobs'])->name('store.jobs');

    Route::get('/delete-jobs/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteJobs'])->name('delete.jobs');


    Route::get('/display-applications', [App\Http\Controllers\Admins\AdminsController::class, 'displayApps'])->name('display.apps');


    Route::get('/delete-apps/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteApps'])->name('delete.apps');
    

});




