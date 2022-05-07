<?php
use Illuminate\Support\Facades\App;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function() {
    
    Route::get('/register', 'UserController@register')->name('user.register')->middleware('permission:user_create');;
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit')->middleware('permission:user_edit');
    Route::post('/store', 'UserController@store')->name('user.store')->middleware('permission:user_edit');
    Route::post('/delete','UserController@destroy')->name('user.delete')->middleware('permission:user_delete');
    Route::post('/changeP','UserController@changeP')->name('user.changeP')->middleware('permission:user_password');

   
    Route::post('/Editeprf','UserController@Editeprf')->name('user.Editeprf');
    Route::post('/passProf','UserController@passProf')->name('user.passProf');
    Route::get('/profile','UserController@profile')->name('user.profile');

    Route::get('/role_Page','RoleController@role_Page')->name('user.role_Page')->middleware('role:Administrateur|Client');
    Route::get('/role_update/{id}','RoleController@role_update')->name('user.role_update')->middleware('role:Administrateur');
    Route::post('/store_Role','RoleController@store_Role')->name('user.store_Role')->middleware('role:Administrateur');
    Route::get('/create_Role', 'RoleController@create_Role')->name('user.create_Role')->middleware('role:Administrateur');
    Route::post('/destroy_role', 'RoleController@destroy_role')->name('user.destroy_role')->middleware('role:Administrateur');

    Route::get('/permission_matrix', 'RoleController@permission_matrix')->name('user.permission_matrix')->middleware('role:Administrateur');
    Route::post('/save_permission', 'RoleController@save_permission')->name('user.save_permission')->middleware('role:Administrateur');


  
});


Route::name('language')->get('language/{lang}', 'UserController@language');



  