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



Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'HomeController@index')->name('home');

/*
 *  | Index de resource               | GET|HEAD      | resource                    | resource.index    | App\Http\Controllers\resource\resourceController@index     | web                                             |
 *  | Armazena resource               | POST          | resource                    | resource.store    | App\Http\Controllers\resource\resourceController@store     | web                                             |
 *  | Cria resource                   | GET|HEAD      | resource/create             | resource.create   | App\Http\Controllers\resource\resourceController@create    | web                                             |
 *  | Exibe resource                  | GET|HEAD      | resource/{resource}         | resource.show     | App\Http\Controllers\resource\resourceController@show      | web                                             |
 *  | Atualiza resource               | PUT|PATCH     | resource/{resource}         | resource.update   | App\Http\Controllers\resource\resourceController@update    | web                                             |
 *  | Deleta resource                 | DELETE        | resource/{resource}         | resource.destroy  | App\Http\Controllers\resource\resourceController@destroy   | web                                             |
 *  | Mostra formulario de alteracao  | GET|HEAD      | resource/{resource}/edit    | resource.edit     | App\Http\Controllers\resource\resourceController@edit      | web                                             |
 */
Route::resource('projetos', 'ProjetoController');
Route::resource('alunos', 'AlunoController');
Route::resource('professores', 'ProfessorController');
Route::resource('editais', 'EditalController');

Route::get('/finalizados', 'ProjetoController@index_finalizados')->name('projetos.finalizados');
Route::get('/nao-finalizados', 'ProjetoController@index_nao_finalizados')->name('projetos.nao-finalizados');
Route::get('/egressos', 'AlunoController@index_egressos')->name('alunos.egressos');
Route::get('/nao-egressos', 'AlunoController@index_nao_egressos')->name('alunos.nao-egressos');

Route::get('/contato', 'ContatoController@index')->name('contato.index');