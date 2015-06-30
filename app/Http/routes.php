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

Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * Rotas para o exemplo de formulário de suporte, protegendo o acesso pelo agrupamento
 * de rotas, pode-se adicionar outras rotas para serem protegidas neste agrupamento, como 
 * as rotas para produtos.
 * Porém se uma rota, como suporte/create e suporte (post), que pode ser acessado livremente para 
 * criar uma nova solicitação de suporte
 **/

Route::get('suporte/create', 'SuporteController@getCreate');
$router->group(['middleware' => 'auth'], function($router) {
    Route::controller('suporte', 'SuporteController');
    Route::get('produto/{id}/excluir', 'ProdutoController@excluir');
    Route::resource('produto', 'ProdutoController');
});
/**
 * A rota com post para suporte está depois do agrupamento de autenticação
 * para forçar que seja salva a solicitação sem necessitar login
 */
Route::post('suporte', 'SuporteController@postIndex');


Route::get('ola', function() {
	$html = "<h1>Olá mundo</h1>";
	$html .= "<p>Isto é um exemplo de rota com função embutida.</p>";
	$html .= "<p>Note que não é o ideal a ser realizado, mas é o primeiro teste.</p>";
	return $html;
});

Route::get('olavisao', function(){
	return view('olamundo');
});
