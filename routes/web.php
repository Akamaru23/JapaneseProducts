<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


//main
Route::get('/', [ProductsController::class, 'showWeb'])->name('menu');
Route::post('/', [ProductsController::class, 'exeComments'])->name('comments');
Route::post('/SearchPrefecture', [ProductsController::class, 'showPrefecture'])->name('FromPrefecture');
Route::post('/SearchName', [ProductsController::class, 'showProducts'])->name('FromName');
Route::get('/Search/{id}', [ProductsController::class, 'ProductsInfo'])->name('info');



//↓admin

//admin main site
Route::get('/2bVtbHzQ/admin', [ProductsController::class, 'showPass'])->name('pass');
Route::post('/2bVtbHzQ/admin', [ProductsController::class, 'showPass'])->name('pass.post');

Route::middleware(['admin'])->group(function () {
    Route::get('/2bVtbHzQ/admin/database', [ProductsController::class, 'showAdminDatabase'])->name('adminDatabase');
    Route::get('/2bVtbHzQ/admin/uploadImages', [ProductsController::class, 'showUploadImg'])->name('showImg');
    Route::get('/2bVtbHzQ/admin/comments', [ProductsController::class, 'showComments'])->name('showComments');
    Route::post('/2bVtbHzQ/admin/comments/{id}', [ProductsController::class, 'exeDeleteComments'])->name('DeleteComments');
    Route::get('/2bVtbHzQ/admin/top3rank', [ProductsController::class, 'showTop3Rank'])->name('top3rank');
    Route::post('/2bVtbHzQ/admin/top3rank/update', [ProductsController::class, 'showChangeTop3'])->name('showUpdateTop3');
    Route::post('/2bVtbHzQ/admin/top3rank/update/{rank}', [ProductsController::class, 'exeUpdateTop3'])->name('updateTop3');
    Route::post('/2bVtbHzQ/admin/top3rank/Search/edit/SearchProducts/{no}/{no_id}', [ProductsController::class, 'showSearchTop3'])->name('showSearchTop3');
    Route::get('/2bVtbHzQ/admin/rank', [ProductsController::class, 'showRank'])->name('rank');
    Route::get('/2bVtbHzQ/admin/rank/Search', [ProductsController::class, 'showSearchRank'])->name('searchRank');
    Route::post('/2bVtbHzQ/admin/rank/Search/edit/{id}', [ProductsController::class, 'showchangeRank'])->name('changeRank');
    Route::post('/2bVtbHzQ/admin/rank/Search/edit/SearchProducts/{id}', [ProductsController::class, 'showSearchProducts'])->name('showSearchProducts');
    Route::post('/2bVtbHzQ/admin/rank/Search/edit/changeRank/{id}/{no_id}', [ProductsController::class, 'exeUpdateRank'])->name('updateRank');

    //serch database in side bar
    Route::post('/2bVtbHzQ/admin/database', [ProductsController::class, 'exeSearch'])->name('search');
    Route::get('/2bVtbHzQ/admin/database/{id}', [ProductsController::class, 'showDetail'])->name('detail');
    Route::post('/2bVtbHzQ/admin/database/edit', [ProductsController::class, 'exeEdit'])->name('update');
    Route::post('/2bVtbHzQ/admin/database/delete/{id}', [ProductsController::class, 'exeDelete'])->name('delete');

    //upload Img
    Route::post('/2bVtbHzQ/admin/database/uploadImg', [ProductsController::class, 'uploadImg'])->name('Img');
});