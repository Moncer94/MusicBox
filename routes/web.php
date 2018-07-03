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
Route::get('/editt',[
    'uses' => 'ProductController@getAdminEditt',
    'as' => 'admin.editt'
]);

Route::get('commands', [
    'uses' => 'CommandController@getAdminIndex',
    'as' => 'admin.commands'
]);
Route::get('deleteCommand/{id}', [
    'uses' => 'CommandController@getCommandDelete',
    'as' => 'command.delete'
]);

/*Route::get('ad', [
    'uses' => 'ProductController@getAdminIndex',
    'as' => 'admin.index'
]);*/

Route::get('create', [
    'uses' => 'ProductController@getAdminCreate',
    'as' => 'admin.create'
]);


Route::post('create', [
    'uses' => 'ProductController@postAdminCreate',
    'as' => 'admin.create'
]);

Route::get('edit/{id}', [
    'uses' => 'ProductController@getAdminEdit',
    'as' => 'admin.edit'
]);

Route::get('delete/{id}', [
    'uses' => 'ProductController@getAdminDelete',
    'as' => 'admin.delete'
]);

Route::post('edit', [
    'uses' => 'ProductController@postAdminUpdate',
    'as' => 'admin.update'
]);
Route::get('product/{id}', [
    'uses' => 'ProductController@getPost',
    'as' => 'blog.post'
]);





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ad', [
    'uses' => 'MenuController@getAdminIndex',
    'as' => 'admin.index.menu'
]);


Route::get('createMenu', [
    'uses' => 'MenuController@getAdminCreate',
    'as' => 'admin.create.menu'
]);


Route::post('createMenu', [
    'uses' => 'MenuController@postAdminCreate',
    'as' => 'admin.create.menu'
]);

Route::get('editMenu/{id}', [
    'uses' => 'MenuController@getAdminEdit',
    'as' => 'admin.edit.menu'
]);

Route::get('deleteMenu/{id}', [
    'uses' => 'MenuController@getAdminDelete',
    'as' => 'admin.delete.menu'
]);

Route::post('editMenu', [
    'uses' => 'MenuController@postAdminUpdate',
    'as' => 'admin.update.menu'
]);
Route::get('menu/{id}', [
    'uses' => 'MenuController@getPost',
    'as' => 'blog.post.menu'
]);
Route::get('editCommand/{id}', [
    'uses' => 'CommandController@getAdminEdit',
    'as' => 'admin.edit.command'
]);

Route::post('sendmessage', 'SocketController@sendMessage');
Route::get('writemessage', 'SocketController@writemessage');

Route::resource('notif', 'NotificationController', [
    'expect' => ['store']
]);
Route::post('user/profile', function () {
    // Update the user's profile...

    return redirect()->action('NotificationController@store');
});
Route::get('/charts', 'ChartController@index');

