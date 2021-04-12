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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addnotes','NotesController@addNotes');
Route::post('/addnotes','NotesController@postNotes');
Route::get('/viewnotes','NotesController@viewnotes');
Route::get('/viewnotes/topic','NotesController@errordisplay');
Route::get('/viewnotes/topic/{subject}','NotesController@viewsubnotes');
Route::get('/viewnotes/topic/subject/{subject}','NotesController@shownotes');
Route::get('/home/uploadfiles','NotesController@showuploadmenu');
Route::post('/home/upload','NotesController@uploadfile');
Route::get('/home/uploadednotes','NotesController@showuploaded');
Route::post('/downloadfile','NotesController@downloadfile');
Route::post('/deletefile','NotesController@deletefile');
Route::post('ckeditor/upload', 'NotesController@upload')->name('ckeditor.upload');
