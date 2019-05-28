<?php

//Parte site geral

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@index')->name('home');


//Verficação
Route::group(['middleware' => ['auth']], function () {
    
//Parte ADM
Route::get('/adm/index',  ['as' => 'adm.index', 'uses' => 'AdmController@index'])->middleware('checkRoleAdmin');

//Espacos
Route::get('/adm/espacos/formularioAdicionar',          ['as' => 'adm.formAddEspaco', 'uses'    => 'AdmEspacoController@addForm'])->middleware('checkRoleServidor');
Route::get('/adm/espacos/formularioAtualizar/{id}',     ['as' => 'adm.formAttEspaco', 'uses'    => 'AdmEspacoController@updateForm'])->middleware('checkRoleAdmin');
Route::get('/adm/espacos/formulario',                   ['as' => 'adm.formEspaco', 'uses'       => 'AdmEspacoController@form'])->middleware('checkRoleAdmin');
Route::post('/adm/espacos/adicionar',                   ['as' => 'adm.adicionaEspaco', 'uses'   => 'AdmEspacoController@insert'])->middleware('checkRoleAdmin');
Route::post('/adm/espacos/atualizar/{id}',              ['as' => 'adm.atualizaEspaco', 'uses'   => 'AdmEspacoController@update'])->middleware('checkRoleAdmin');
Route::get('/adm/espacos/listar',                       ['as' => 'adm.listaEspaco', 'uses'      => 'AdmEspacoController@selectAll'])->middleware('checkRoleAdmin');
Route::get('/adm/espacos/deletar/{id}',                 ['as' => 'adm.deletaEspaco', 'uses'     => 'AdmEspacoController@delete'])->middleware('checkRoleAdmin');

//Professores
Route::get('/adm/professores/formularioAdicionar',      ['as' => 'adm.formAddProfessor', 'uses'     => 'AdmProfessorController@addForm'])->middleware('checkRoleAdmin');
Route::get('/adm/professores/formularioAtualizar/{id}', ['as' => 'adm.formAttProfessor', 'uses'     => 'AdmProfessorController@updateForm'])->middleware('checkRoleAdmin');
Route::post('/adm/professores/adicionar',               ['as' => 'adm.adicionaProfessor', 'uses'    => 'AdmProfessorController@insert'])->middleware('checkRoleAdmin');
Route::post('/adm/professores/atualizar/{id}',          ['as' => 'adm.atualizaProfessor', 'uses'    => 'AdmProfessorController@update'])->middleware('checkRoleAdmin');
Route::get('/adm/professores/listar',                   ['as' => 'adm.listaProfessor', 'uses'       => 'AdmProfessorController@selectAll'])->middleware('checkRoleAdmin');
Route::get('/adm/professores/deletar/{id}',             ['as' => 'adm.deletaProfessor', 'uses'      => 'AdmProfessorController@delete'])->middleware('checkRoleAdmin');
Route::get('/adm/professores/index',                    ['as' => 'adm.indexProfessor', 'uses'       => 'AdmProfessorController@index'])->middleware('checkRoleProfessor');

//Servidores
Route::get('/adm/servidores/formularioAdicionar',       ['as' => 'adm.formAddServidor', 'uses'             => 'AdmServidorController@addForm'])->middleware('checkRoleAdmin');
Route::get('/adm/servidores/formularioAtualizar/{id}',  ['as' => 'adm.formAttServidor', 'uses'             => 'AdmServidorController@updateForm'])->middleware('checkRoleAdmin');
Route::post('/adm/servidores/adicionar',                ['as' => 'adm.adicionaServidor', 'uses'            => 'AdmServidorController@insert'])->middleware('checkRoleAdmin');
Route::post('/adm/servidores/atualizar/{id}',           ['as' => 'adm.atualizaServidor', 'uses'            => 'AdmServidorController@update'])->middleware('checkRoleAdmin');
Route::get('/adm/servidores/listar',                    ['as' => 'adm.listaServidor', 'uses'               => 'AdmServidorController@selectAll'])->middleware('checkRoleAdmin');
Route::get('/adm/servidores/deletar/{id}',              ['as' => 'adm.deletaServidor', 'uses'              => 'AdmServidorController@delete'])->middleware('checkRoleAdmin');
Route::get('/adm/servidores/index',                     ['as' => 'adm.indexServidor', 'uses'               => 'AdmServidorController@index'])->middleware('checkRoleServidor');

//Disciplina
Route::get('/adm/disciplinas/formularioAdicionar',      ['as' => 'adm.formAddDisciplina', 'uses'    => 'AdmDisciplinaController@addForm'])->middleware('checkRoleAdmin');
Route::get('/adm/disciplinas/formularioAtualizar/{id}', ['as' => 'adm.formAttDisciplina', 'uses'    => 'AdmDisciplinaController@updateForm'])->middleware('checkRoleAdmin');
Route::post('/adm/disciplinas/adicionar',               ['as' => 'adm.adicionaDisciplina', 'uses'   => 'AdmDisciplinaController@insert'])->middleware('checkRoleAdmin');
Route::post('/adm/disciplinas/atualizar/{id}',          ['as' => 'adm.atualizaDisciplina', 'uses'   => 'AdmDisciplinaController@update'])->middleware('checkRoleAdmin');
Route::get('/adm/disciplinas/listar',                   ['as' => 'adm.listaDisciplina', 'uses'      => 'AdmDisciplinaController@selectAll'])->middleware('checkRoleAdmin');
Route::get('/adm/disciplinas/deletar/{id}',             ['as' => 'adm.deletaDisciplina', 'uses'     => 'AdmDisciplinaController@delete'])->middleware('checkRoleAdmin');

//Solicitações
Route::get('/adm/servidores/listarSolicitacoes',            ['as' => 'adm.listarSolicitacoes', 'uses'           => 'AdmSolicitacaoController@listarSolicitacoes'])->middleware('checkRoleServidor');
Route::get('/adm/servidores/historicoSolicitacoes',         ['as' => 'adm.historicoSolicitacoes', 'uses'        => 'AdmSolicitacaoController@historicoSolitacoes'])->middleware('checkRoleServidor');
Route::get('/adm/servidores/aprovarSolicitacoes/{id}/{op}', ['as' => 'adm.aprovarSolicitacoes', 'uses'          => 'AdmSolicitacaoController@aprovarSolicitacoes'])->middleware('checkRoleServidor');
Route::get('/adm/professores/listarMinhasSolicitacoes',     ['as' => 'adm.listarMinhasSolicitacoes', 'uses'     => 'AdmSolicitacaoController@listarMinhasSolicitacoes'])->middleware('checkRoleProfessor');
Route::get('/adm/professores/solicitaEspaco',               ['as' => 'adm.solicitaEspaco', 'uses'               => 'AdmSolicitacaoController@solicitaEspaco'])->middleware('checkRoleProfessor');
Route::post('/adm/professores/registraSolicitacao',         ['as' => 'adm.registraSolicitacao', 'uses'          => 'AdmSolicitacaoController@registraSolicitacao'])->middleware('checkRoleProfessor');


});


