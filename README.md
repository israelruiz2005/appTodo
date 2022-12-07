<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## AppTodo

Projeto de estudo das funcionalidades e facilidades do framework Laravel, serão criados tabelas no banco de dados utilizando migrates, componentes dos formulários e claro uma aplicação funcional com CRUD na estrutra MVC do Laravel.

### Alimentação de registro para teste
Através de seeds foram criados registros para teste

### Layout
Foi criado layout básico com uso do recurso de componentes

### Controle de usuários
Foi criado o controle de usuários logados e controle de abertura de views conforme situação do login.
### Atualização de status de tarefa
Foi criado uma atualização de status da tarefa utilizando-se javascript

### Uso de OAuth com Socialite
Além da autenticação baseada em formulário, o Laravel também fornece uma maneira simples e conveniente de autenticar com provedores OAuth usando o Laravel Socialite que suporta autenticação via Facebook, Twitter, LinkedIn, Google, GitHub, GitLab e Bitbucket.

#### Passos para instalação
```bash
composer require laravel/socialite
```

#### Uso de API do google
No site do Google Cloud, será necessário criar uma credencial para o aplicativo web,
acredeço ao artigo [Laravel 9 Socialite Login with Google Account Example](https://www.itsolutionstuff.com/post/laravel-9-socialite-login-with-google-account-exampleexample.html) que tem um passo a passo para esta configuração.
Criada a credencial serão fornecedidos duas informações:
- client_id
- client_secret

#### Configurando o config/services.php
Dentro do arquivo services.php deverá ser acrescentda a chave para o google, observar que as informações reais da chave,são acrecentadas no arquivo .env de configurações. O nome da constante pode ser definido pelo desenvelvedor, aqui optei por usar GOOGLE_, GITHUB_ etc para identificar onde serão conseguidas as credenciais de login.
```bash
 'google'=> [
        'client_id'=> env('GOOGLE_CLIENT_ID'),
        'client_secret'=> env('GOOGLE_CLIENT_SECRET'),
        'redirect'=>'http://localhost:8000/auth/google/callback',
    ],
```
#### Configurando o .env
```bash
GOOGLE_CLIENT_ID=Seu_client_id_aqui_sem_aspas
GOOGLE_CLIENT_SECRET=sua_chave_secreta_aqui_sem_aspas
```
#### Preparando a migração na tabela users
```bash
php artisan make:migration add_google_id_column
```
Crie o arquivo de migração, conforme o projeto, execute a migração
```bash
php artisan migrate
```
- Atualize o Models\User.php
- Crie o GoogleController, conforme projeto.
- Atualize o routes\web.php com a rota para incluir a chamada ao googleController
- Atualize o login.blade.php ou arquivo equivalente de login, acrescentando
```bash
<a href="{{ route('auth.google') }}">
<img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
</a>
```


