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

Em nosso controlador `AuthController` definimos `suporte/list` como nosso redirecionamento 
após o login.

    ...
    protected $redirectPath = '/suporte/listar';
    ...

O método `validator` é responsável pela autenticação, e pode ser sobrescrito para 
que você possa definir o comportamento de autenticação que melhor se adeque à sua aplicação.

O método `create` é responsável pela criação de novos registros do modelo `App\User`, e pode
ser sobrescrito para que você possa definir o comportamento de acordo com a necessidade de
sua aplicação.

### Acessando o objeto de usuário

Para pegar o usuário autenticado, acesse o facade Auth:

    $user = Auth::user();

Para verificar se o usuário atual está autenticado

    if (Auth::check()) {
        // Usuário está "logado (ugh)" ...
    }

## Protegendo rotas

Para proteger o acesso à rotas que exigem o usuário estar autenticado, é possível utilizar 
middlewares configurados à cada rota. Laravel dispõe do middleare `auth` localizado em 
`app\Http\Middleware\Authenticate.php`, bastando anexar à rota que deve ser protegida.

    // Usando uma closure na rota...

    Route::get('profile', ['middleware' => 'auth', function() {
        // Somente usuários autenticados podem entrar no perfil ...
    }]);

    // Usando um controlador ...

    Route::get('profile', [
        'middleware' => 'auth',
        'uses' => 'ProfileController@show'
    ]);

Ao usar classes de controle você pode chamar o middleware no construtor ao invés
de anexar à sua rota:

    <?php

    class AuthController {
        public function __construct() {
            $this->middleware('auth');
        }

        ...
    }