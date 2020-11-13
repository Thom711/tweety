<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::post('/tweets',
        [\App\Http\Controllers\TweetController::class, 'store']);

    Route::get('/tweets',
        [\App\Http\Controllers\TweetController::class, 'index'])
        ->name('home');

    Route::post('/tweets/{tweet}/like',
        [\App\Http\Controllers\LikeController::class, 'store']);

    Route::delete('/tweets/{tweet}/like',
        [\App\Http\Controllers\LikeController::class, 'destroy']);

    Route::post('/profiles/{user:username}/follow',
        [\App\Http\Controllers\FollowController::class, 'store'])
        ->name('follow');

    Route::get('/profiles/{user:username}/edit',
        [\App\Http\Controllers\ProfileController::class, 'edit']);

    Route::patch('/profiles/{user:username}',
        [\App\Http\Controllers\ProfileController::class, 'update']);

    Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'index']);
});

Route::get('/profiles/{user:username}',
    [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile');

/*
    The profile page banner image and description are hard-coded. Make these dynamic for each user.
    Add the ability to attach an image when publishing a tweet.
    There is currently no way to unlike a tweet. Add the ability to toggle a like.
    Add a pop-up flash message when a user publishes a tweet or follows someone.
    Consider adding Laravel Livewire to allow for more interactive forms.
    When writing a new tweet, display the number of remaining characters they're allowed.
    Allow tweets to be deleted.
    Add support for mentions and notifications.
    Work on responsiveness.
 */




