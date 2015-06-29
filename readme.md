## Parte 6 - Autenticação

Na parte 6 de nosso exemplo integraremos a autenticação disponível como um "esqueleto"
para esta funcionalidade.

Veja:

 - http://laravel.com/docs/5.1/authentication

O arquivo de configuração é localizado em `config/auth.php`, o qual contem
várias opções documentadas para adequar o comportamento da autenticação.

### Banco de dados

O modelo de usuário que extende `Eloquent/Model` está em no arquivo `App/User.php`.
É possível mudar o driver de autenticação se necessário.

Ao usar o esquema padrão do framework, a largura do campo senha deve ter 60 caracteres.

Também é necessário um campo `remember_token` que permite valor nulo.

### Controlador

O controlador está no caminho `App\Http\Controllers\Auth\AuthController.php` o qual 
registra e autentica o usuário, ja o controlador `App\Http\Controllers\Auth\PasswordController.php`
é responsável pela recuperação de senha do usuário.

### Rotas

Rotas necessárias para o funcionamento, devem ser inseridas em `app/Http/routes.php`
caso não existam.

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

### Visões

Algumas visões devem ser utilizadas para as funções de autenticação e localizadas em 
`resources/views/auth`. 

- resources/views/auth/login.blade.php
- resources/views/auth/register.blade.php

## Autenticando

Após o usuário entrar com usuário e senha, será redirecionado para a rota indicada na
propriedade `protected $redirectPath = '/dashboard';` do controlador `AuthController`.