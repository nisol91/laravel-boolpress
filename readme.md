# LARAVEL-BOOLPRESS

*Blog avanzato con laravel.*

-----

Innanzitutto creare lo scaffolding di autenticazione con `php artisan make:auth`.

-----

Mi genera gia anche le migration, quindi vado a renderle effettive nel database con `php artisan migrate`. Ricorda poi di far ripartire il server artisan.

-----

Creo 2 controller: HomeController e Admin/HomeController. E le relative views.

Il middleware e' un metodo del costruttore del controller che mi controlla se sono loggato o no. Possio chiamarlo direttamente in web, dalla rotta autenticazione, cosi che venga chiamata solo se sono autenticato.

-----

Creo la tabella post nel DB 

`php artisan make:migration create_posts_table`

`php artisan migrate`

Di conseguenza creo model e risorsa(PostController):

`php artisan make:model Post`

`php artisan make:controller -r Admin/PostController`

Popolo i post con i seeder:
`php artisan make:seeder PostTableSeeder`

*Ricorda* di rendere il model Post fillable con i cambi che mi interessano.

`protected $fillable = ['name', 'author', 'content'];`

In seguito riempio la tabella post con i miei seeder:

`php artisan db:seed --class=PostTableSeeder`

-----

Ricordarsi di copiare app e rinominarla admin_app. Sara' la app relativa a tutto quello che e il backoffice.

Posso quindi modificare admin_app, aggiungendo tutti i comandi per le azioni sui Posts.
Modifico admin_app per comodita' visto che e gia mezza fatta di default.

-----

Per quanto riguarda le rotte, posso creare un group admin, con *middleware* auth e *prefix* admin (mi aggiunge automaticamente */admin* a tutti gli url) e *namespace* Admin (analogamente a prefix, aggiunge al namespace Admin\ ) e *name* admin, analogo agli altri due ma per il nome della route.
