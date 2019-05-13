<?php

//Parte site geral
Route::get('/',         ['as' => 'site.index', 'uses' => 'HomeController@index']);
Route::get('/login',    ['as' => 'site.login', 'uses' => 'HomeController@login']);


//Parte ADM
Route::get('/adm',      ['as' => 'adm.index', 'uses' => 'AdmController@index']);

//Espacos
Route::get('/adm/espacos/formularioAdicionar',          ['as' => 'adm.formAddEspaco', 'uses'    => 'AdmEspacoController@addForm']);
Route::get('/adm/espacos/formularioAtualizar/{id}',     ['as' => 'adm.formAttEspaco', 'uses'    => 'AdmEspacoController@updateForm']);
Route::get('/adm/espacos/formulario',                   ['as' => 'adm.formEspaco', 'uses'       => 'AdmEspacoController@form']);
Route::post('/adm/espacos/adicionar',                   ['as' => 'adm.adicionaEspaco', 'uses'   => 'AdmEspacoController@insert']);
Route::post('/adm/espacos/atualizar/{id}',              ['as' => 'adm.atualizaEspaco', 'uses'   => 'AdmEspacoController@update']);
Route::get('/adm/espacos/listar',                       ['as' => 'adm.listaEspaco', 'uses'      => 'AdmEspacoController@selectAll']);
Route::get('/adm/espacos/deletar/{id}',                 ['as' => 'adm.deletaEspaco', 'uses'     => 'AdmEspacoController@delete']);

//Professores
Route::get('/adm/professores/formularioAdicionar',      ['as' => 'adm.formAddProfessor', 'uses'     => 'AdmProfessorController@addForm']);
Route::get('/adm/professores/formularioAtualizar/{id}', ['as' => 'adm.formAttProfessor', 'uses'     => 'AdmProfessorController@updateForm']);
Route::post('/adm/professores/adicionar',               ['as' => 'adm.adicionaProfessor', 'uses'    => 'AdmProfessorController@insert']);
Route::post('/adm/professores/atualizar/{id}',          ['as' => 'adm.atualizaProfessor', 'uses'    => 'AdmProfessorController@update']);
Route::get('/adm/professores/listar',                   ['as' => 'adm.listaProfessor', 'uses'       => 'AdmProfessorController@selectAll']);
Route::get('/adm/professores/deletar/{id}',             ['as' => 'adm.deletaProfessor', 'uses'      => 'AdmProfessorController@delete']);

//Servidores
Route::get('/adm/servidores/formularioAdicionar',       ['as' => 'adm.formAddServidor', 'uses'   => 'AdmServidorController@addForm']);
Route::get('/adm/servidores/formularioAtualizar/{id}',  ['as' => 'adm.formAttServidor', 'uses'   => 'AdmServidorController@updateForm']);
Route::post('/adm/servidores/adicionar',                ['as' => 'adm.adicionaServidor', 'uses'  => 'AdmServidorController@insert']);
Route::post('/adm/servidores/atualizar/{id}',           ['as' => 'adm.atualizaServidor', 'uses'  => 'AdmServidorController@update']);
Route::get('/adm/servidores/listar',                    ['as' => 'adm.listaServidor', 'uses'     => 'AdmServidorController@selectAll']);
Route::get('/adm/servidores/deletar/{id}',              ['as' => 'adm.deletaServidor', 'uses'    => 'AdmServidorController@delete']);
Route::get('/adm/servidores/index',                   ['as' => 'adm.index', 'uses'               => 'AdmServidorController@index']);

//Disciplina
Route::get('/adm/disciplinas/formularioAdicionar',      ['as' => 'adm.formAddDisciplina', 'uses'    => 'AdmDisciplinaController@addForm']);
Route::get('/adm/disciplinas/formularioAtualizar/{id}', ['as' => 'adm.formAttDisciplina', 'uses'    => 'AdmDisciplinaController@updateForm']);
Route::post('/adm/disciplinas/adicionar',               ['as' => 'adm.adicionaDisciplina', 'uses'   => 'AdmDisciplinaController@insert']);
Route::post('/adm/disciplinas/atualizar/{id}',          ['as' => 'adm.atualizaDisciplina', 'uses'   => 'AdmDisciplinaController@update']);
Route::get('/adm/disciplinas/listar',                   ['as' => 'adm.listaDisciplina', 'uses'      => 'AdmDisciplinaController@selectAll']);
Route::get('/adm/disciplinas/deletar/{id}',             ['as' => 'adm.deletaDisciplina', 'uses'     => 'AdmDisciplinaController@delete']);

//Login Servidores
Route::get('/adm/servidores/login',                     ['as' => 'adm.formLogin', 'uses'    => 'AdmServidorController@login']);
Route::post('/adm/servidores/signUp',                  ['as' => 'adm.verificarLogin', 'uses'   => 'AdmServidorController@signUp']);