<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route Admin
Route::get('admin/login', 'LoginController@admin_login');

Route::post('admin/do_login', 'LoginController@admin_do_login');

Route::get('admin/logout', 'LoginController@admin_do_logout');

Route::get('/admin/view', 'AdminController@vieworganization');

//upload
Route::post('/admin/add','AdminController@addorganization');

Route::get('/admin/profile', 'AdminController@profile');

//update
Route::post('/update', 'AdminController@update');

Route::get('admin/delete', 'AdminController@delete');

//update Modals
Route::get('/update/modals', 'AdminController@profile_modal_update');

Route::get('/view/update', 'AdminController@view_update');

//view admin detail

/*
	Route Accmgr
*/

Route::get('/login', 'LoginController@accmgr_login');

Route::post('/do_login', 'LoginController@accmgr_do_login');

Route::get('/logout', 'LoginController@accmgr_do_logout');

//halaman organization
Route::get('cari_org', 'OrganizationController@getNameOrganization');

Route::get('cari_org/option/nama', 'OrganizationController@option_nama');

//update organization profile
Route::get('profile', 'OrganizationController@profile');

Route::post('profile/update', 'OrganizationController@update_profile');

Route::get('profile/view_update_profil', 'OrganizationController@view_update_profile');

Route::post('organization/profile/update', 'OrganizationController@profile_update');

Route::post('/profil/update', 'OrganizationController@profil_update');

//Modals update_entry
Route::get('organization/modals/update', 'OrganizationController@profile_modal_update');

Route::post('/password/update', 'OrganizationController@password_update');

/*
	Route Admin
*/

Route::get('admin_org/biodata', 'AdminController@addorganization');

//update organization profile
Route::get('person', 'AdminController@person');
