# LARAVEL-BOOLPRESS

Blog avanzato con laravel.

Innanzitutto creare lo scaffolding di autenticazione con `php artisan make:auth`.

-----

Mi genera gia anche le migration, quindi vado a renderle effettive nel database con `php artisan migrate`. Ricorda poi di far ripartire il server artisan.

-----

Creo 2 controller: HomeController e Admin/HomeController. E le relative views.

Il middleware e' un metodo del costruttore del controller che mi controlla se sono loggato o no. Possio chiamarlo direttamente in web, dalla rotta autenticazione, cosi che venga chiamata solo se sono autenticato.

-----

Creo la tabella post nel DB `php artisan make:migration create_posts_table`.
Di conseguenza creo model e risorsa:

`php artisan make:model Post`

`php artisan make:controller -r Admin/PostController`

Popolo i post con i seeder:
`php artisan make:seeder PostTableSeeder`

-----

Ricorda di rendere il model Post fillable con i cambi che mi interessano.

`protected $fillable = ['name', 'author', 'content'];`
