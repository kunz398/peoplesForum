<?php

use Illuminate\Support\Facades\DB;
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
    $status = DB::table('users')->where('id', @auth()->user()->id)->value('status');
    return view('welcome')->with('status', $status);
})->name('root');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'load_question_here'])->name('index');
Route::get('/scrape', [App\Http\Controllers\ScrapeController::class, 'scrape_picisco'])->name('scrape_picisco');
Route::get('/scrape_pingo', [App\Http\Controllers\ScrapeController::class, 'scrape_pingo'])->name('scrape_pingo');

Route::post('index/fetch', [App\Http\Controllers\HomeController::class, 'fetch'])->name('pagination.fetch');

Route::post('fetch_vote_up', [App\Http\Controllers\HomeController::class, 'fetch_vote_up'])->name('fetch.vote_up');
Route::post('/post_user_detail', [App\Http\Controllers\HomeController::class, 'post_user_detail'])->name('post_user_detail');


Route::get('/add_discussion_index', [App\Http\Controllers\AddDiscussionController::class, 'index'])->name('adddisscussion.index');
Route::post('/load_comments', [App\Http\Controllers\AddDiscussionController::class, 'load_comments'])->name('load_comments');
Route::get('/discussion/{id}', [App\Http\Controllers\AddDiscussionController::class, 'showDiscussionMainPage'])->name('showdiscussion');
Route::get('/edit_discussion/{id}', [App\Http\Controllers\AddDiscussionController::class, 'editDiscussionMainPage'])->name('editdiscussion');

Route::get('/load_data_auto_comment', [App\Http\Controllers\AddDiscussionController::class, 'load_data_auto_comment'])->name('load_data_auto_comment');

Route::post('/post_add_discussion', [App\Http\Controllers\AddDiscussionController::class, 'create'])->name('post_discussion');
Route::post('/edit_discussion_post', [App\Http\Controllers\AddDiscussionController::class, 'edit_discussion_post'])->name('edit_discussion_post');
Route::post('/delete_discussion_post', [App\Http\Controllers\AddDiscussionController::class, 'delete_discussion_post'])->name('delete_discussion_post');
Route::post('/delete_comment', [App\Http\Controllers\AddDiscussionController::class, 'delete_comment'])->name('delete_comment');
Route::post('/add_comment', [App\Http\Controllers\AddDiscussionController::class, 'add_comment'])->name('add_comment');

Route::post('pagination/fetch_comment', [App\Http\Controllers\PaginationController::class, 'fetch_comment'])->name('pagination.fetch_comment');


Route::post('/follow_a_page', [App\Http\Controllers\FollowController::class, 'follow_a_page'])->name('follow_a_page');
Route::post('/load_follow', [App\Http\Controllers\FollowController::class, 'load_follow'])->name('load_follow');


Route::post('/load_notification', [App\Http\Controllers\NotificationController::class, 'load_notification'])->name('load_notification');
Route::post('/make_noti_read', [App\Http\Controllers\NotificationController::class, 'make_noti_read'])->name('make_noti_read');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

Route::post('/search_search', [App\Http\Controllers\NotificationController::class, 'search_search'])->name('search_search');
