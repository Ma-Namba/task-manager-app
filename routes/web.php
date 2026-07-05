<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

/* ログイン画面のURLへ、ブラウザを強制的に移動（リダイレクト）*/
Route::get('/', function () {
    return redirect()->route('login');
});

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    // カテゴリーのCRUDルート（仮ルートから置き換え）
    Route::resource('categories', CategoryController::class);

    // タスクのCRUDルート（仮ルートから置き換え）
    Route::resource('tasks', TaskController::class);
});
