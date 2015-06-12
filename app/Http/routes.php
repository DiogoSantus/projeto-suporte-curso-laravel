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

/* Rotas para o exemplo de formulário de suporte */

Route::controller('suporte', 'SuporteController');

Route::get('ola', function() {
	$html = "<h1>Olá mundo</h1>";
	$html .= "<p>Isto é um exemplo de rota com função embutida.</p>";
	$html .= "<p>Note que não é o ideal a ser realizado, mas é o primeiro teste.</p>";
	return $html;
});

Route::get('olavisao', function(){
	return view('olamundo');
});
