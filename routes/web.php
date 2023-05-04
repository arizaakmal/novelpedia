<?php

use App\Models\Genre;
use App\Models\Novel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\DashboardNovelController;

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

Route::get('/', [NovelController::class, 'index'])->name('home');

Route::get('/cari', [NovelController::class, 'cari'])->name('cari');



// Route::get('/?genre={genre:slug}', [NovelController::class, 'index'])->name('home');

Route::get('/create', [NovelController::class, 'create'])->name('novel.create');


Route::get('/genre', function () {
    $genres = Genre::all();
    return view('genre', ['title' => 'Genre', 'active' => 'genre', 'genres' => $genres]);
});

// Route::get('/genre/{genre:slug}', [GenreController::class, 'show'])->name('genre.show');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/signUp', function () {
    return view('signUp', ['title' => 'Sign Up', 'active' => 'signUp']);
})->name('signUp')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/signUp', [SignUpController::class, 'store'])->name('signUp.submit');

Route::get('/profile', [UserController::class, 'show'])->name('profile');

//Route::get('/change-password', [UserController::class, 'show'])->name('changePasswordForm');

Route::get('/change-password', function () {
    return view('changePassword', ['title' => 'Change Password', 'active' => 'changePasswordForm']);
})->name('changePasswordForm');

Route::post('/change-password', [UserController::class, 'changePassword'])->name('changePassword');



Route::get('/rangking', function () {
    return view('rangking', ['title' => 'Rangking', 'active' => 'rangking', 'novels' => Novel::all()->sortByDesc('rating')]);
})->name('rangking');

Route::get('/hot', function () {
    return view(
        'hot',
        [
            'title' => 'Hot',
            'active' => 'hot'
        ]
    );
});

Route::get('/novel/{novel:slug}', [NovelController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard', 'active' => 'dashboard']);
});

Route::resource('dashboard/novels', DashboardNovelController::class)->names([
    'index' => 'dashboard.novels.index',
    'create' => 'dashboard.novels.create',
    'store' => 'dashboard.novels.store',
    'show' => 'dashboard.novels.show',
    'edit' => 'dashboard.novels.edit',
    'update' => 'dashboard.novels.update',
    'destroy' => 'dashboard.novels.destroy',
]);


