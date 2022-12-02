<?php

use App\Http\Controllers\JournalPostController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [JournalPostController::class, 'index'])->name('journal.index');

Route::get('/postlist', [JournalPostController::class, 'list'])->name('journal.list');
Route::get('/post/{postId}', [JournalPostController::class, 'show'])->name('journal.show'); // Show a single post

Route::get('/createpost', [JournalPostController::class, 'create'])->name('journal.create'); // Show the create post form
Route::post('/createpost', [JournalPostController::class, 'store'])->name('journal.store'); // Store a new post

Route::get('/editpost/{journalPost}', [JournalPostController::class, 'edit'])->name('journal.edit'); // Show the edit post form
Route::put('/editpost/{journalPost}', [JournalPostController::class, 'update'])->name('journal.putedit'); // Update an existing post
Route::delete('/post/{journalPost}', [JournalPostController::class, 'destroy'])->name('journal.destroy'); // Delete an existing post

Route::post('/makeadmin/', [UserRoleController::class, 'makeAdmin'])->name('user.makeadmin');
Route::post('/makewriter/', [UserRoleController::class, 'makeWriter'])->name('user.makewriter');

Route::post('/removeadmin/', [UserRoleController::class, 'removeAdmin'])->name('user.removeadmin');
Route::post('/removewriter/', [UserRoleController::class, 'removeWriter'])->name('user.removewriter');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/posts', function () {
    return view('dashboardpost');
})->middleware(['auth', 'verified'])->name('dashboard.posts');

Route::get('/dashboard/users', function () {
    return view('dashboarduser');
})->middleware(['auth', 'verified'])->name('dashboard.users');

require __DIR__.'/auth.php';
