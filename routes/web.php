<?php

//Parte site geral
Route::get('/',         ['as' => 'site.index', 'uses' => 'HomeController@index']);
Route::get('/login',    ['as' => 'site.login', 'uses' => 'HomeController@login']);


//Parte ADM
Route::get('/adm',      ['as' => 'adm.index', 'uses' => 'AdmController@index']);

//Espacos
Route::get('/adm/espacos/formularioAdicionar',          ['as' => 'adm.formAddEspaco', 'uses'    => 'AdmEspacoController@formularioAdicionar']);
Route::get('/adm/espacos/formularioAtualizar/{id}',     ['as' => 'adm.formAttEspaco', 'uses'    => 'AdmEspacoController@formularioAtualizar']);
Route::get('/adm/espacos/formulario',                   ['as' => 'adm.formEspaco', 'uses'       => 'AdmEspacoController@formulario']);
Route::post('/adm/espacos/adicionar',                   ['as' => 'adm.adicionaEspaco', 'uses'   => 'AdmEspacoController@adicionar']);
Route::post('/adm/espacos/atualizar/{id}',              ['as' => 'adm.atualizaEspaco', 'uses'   => 'AdmEspacoController@atualizar']);
Route::get('/adm/espacos/listar',                       ['as' => 'adm.listaEspaco', 'uses'      => 'AdmEspacoController@listar']);
Route::get('/adm/espacos/deletar/{id}',                 ['as' => 'adm.deletaEspaco', 'uses'     => 'AdmEspacoController@deletar']);

//Professores
Route::get('/adm/professores/formularioAdicionar',      ['as' => 'adm.formAddProfessor', 'uses'     => 'AdmProfessorController@formularioAdicionar']);
Route::get('/adm/professores/formularioAtualizar/{id}', ['as' => 'adm.formAttProfessor', 'uses'     => 'AdmProfessorController@formularioAtualizar']);
Route::post('/adm/professores/adicionar',               ['as' => 'adm.adicionaProfessor', 'uses'    => 'AdmProfessorController@adicionar']);
Route::post('/adm/professores/atualizar/{id}',          ['as' => 'adm.atualizaProfessor', 'uses'    => 'AdmProfessorController@atualizar']);
Route::get('/adm/professores/listar',                   ['as' => 'adm.listaProfessor', 'uses'       => 'AdmProfessorController@listar']);
Route::get('/adm/professores/deletar/{id}',             ['as' => 'adm.deletaProfessor', 'uses'      => 'AdmProfessorController@deletar']);

//Servidores
Route::get('/adm/servidores/formularioAdicionar',       ['as' => 'adm.formAddServidor', 'uses'   => 'AdmServidorController@formularioAdicionar']);
Route::get('/adm/servidores/formularioAtualizar/{id}',  ['as' => 'adm.formAttServidor', 'uses'   => 'AdmServidorController@formularioAtualizar']);
Route::post('/adm/servidores/adicionar',                ['as' => 'adm.adicionaServidor', 'uses'  => 'AdmServidorController@adicionar']);
Route::post('/adm/servidores/atualizar/{id}',           ['as' => 'adm.atualizaServidor', 'uses'  => 'AdmServidorController@atualizar']);
Route::get('/adm/servidores/listar',                    ['as' => 'adm.listaServidor', 'uses'     => 'AdmServidorController@listar']);
Route::get('/adm/servidores/deletar/{id}',              ['as' => 'adm.deletaServidor', 'uses'    => 'AdmServidorController@deletar']);

//Disciplina
Route::get('/adm/disciplinas/formularioAdicionar',      ['as' => 'adm.formAddDisciplina', 'uses'    => 'AdmDisciplinaController@formularioAdicionar']);
Route::get('/adm/disciplinas/formularioAtualizar/{id}', ['as' => 'adm.formAttDisciplina', 'uses'    => 'AdmDisciplinaController@formularioAtualizar']);
Route::post('/adm/disciplinas/adicionar',               ['as' => 'adm.adicionaDisciplina', 'uses'   => 'AdmDisciplinaController@adicionar']);
Route::post('/adm/disciplinas/atualizar/{id}',          ['as' => 'adm.atualizaDisciplina', 'uses'   => 'AdmDisciplinaController@atualizar']);
Route::get('/adm/disciplinas/listar',                   ['as' => 'adm.listaDisciplina', 'uses'      => 'AdmDisciplinaController@listar']);
Route::get('/adm/disciplinas/deletar/{id}',             ['as' => 'adm.deletaDisciplina', 'uses'     => 'AdmDisciplinaController@deletar']);