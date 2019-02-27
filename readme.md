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

**Post**

Creo la tabella post nel DB 

`php artisan make:migration create_posts_table`

Ricorda di utilizzare lo stesso schema: create_NOMETABELL_table.

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

@extends(layouts.admin_app) sia nella home admin che nella pagina login.

Posso quindi modificare admin_app, aggiungendo tutti i comandi per le azioni sui Posts.
Modifico admin_app per comodita' visto che e gia mezza fatta di default.

-----

Per quanto riguarda le rotte, posso creare un group admin, con *middleware* auth e *prefix* admin (mi aggiunge automaticamente */admin* a tutti gli url), *namespace* Admin (analogamente a prefix, aggiunge al namespace Admin\ ) e *name* admin, analogo agli altri due ma per il nome della route.

-----

Vado quindi a creare il mio index dei post, dentro a admin/posts.

Posso aiutarmi con gli **Helper** di Laravel, metodi utili, che per esempio limitano le stringhe. [piccola nota: la versione 5.7 di laravel mi propone una classe, mentre la 5.6 un metodo, cosa molto piu comoda. Fortunatamente Laravel e' retroattivo quindi posso usarle entrambe indifferentemente]

-----
-----


 **Categories**

 Mi genero la nuova tabella come fatto per i post:

`php artisan make:migration create_categories_table`

`php artisan migrate`

*Utile comando:* `php artisan migrate:rollback` mi serve per tornare indietro, per esempio nel caso in cui ho gia fatto la migrate, aggiungo successivamente nuove colonne alla tabella e voglio aggiornare il db, uso rollback e riuso migrate.

Anche qui genero il model e il controller:

`php artisan make:model Category`

`php artisan make:controller -r Admin/CategoryController`

Per evitare di fare la CRUD sulle categories, popolo la tabella con i soliti seeder.

