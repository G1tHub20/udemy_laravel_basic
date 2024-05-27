<?php

use Illuminate\Support\Facades\Route;
// ファイル内で使えるようにする
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ShopController;


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

// URLにアクセスされたら、TestControllerのindexメソッドを呼び出す
Route::get('test/test', [TestController::class, 'index']);
Route::get('shops', [ShopController::class, 'index']);
// Route::resource('contacts', ContactFormController::class);

// 1行ずつ書く場合                                              // ルート情報に名前（フォルダ名.ファイル名）をつける
// Route::get('contacts', [ContactFormController::class, 'index'])->name('contacts.index');

// グループ化してまとめる場合（シンプルに書ける）
Route::prefix('contacts') // 頭に contacts をつける
	->middleware(['auth']) // 認証
	->controller(ContactFormController::class) // コントローラ指定（Laravel9から）
	->name('contacts.')
	->group(function() { // グループ化
		Route::get('/', 'index')->name('index'); // 名前付きルート
		Route::get('/create', 'create')->name('create'); 
		Route::post('/', 'store')->name('store');
		Route::get('/{id}', 'show')->name('show');
		Route::get('/{id}/edit', 'edit')->name('edit');
		Route::post('/{id}', 'update')->name('update');
		Route::post('/{id}/destroy', 'destroy')->name('destroy');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
