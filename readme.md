# LARAVEL-BOOLPRESS

 ***Guida passo passo e best practice in fondo***

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

Per quanto riguarda le rotte, posso creare un group admin, con *middleware* auth e *prefix* admin (mi aggiunge automaticamente */admin* a tutti gli url), *namespace* Admin (analogamente a prefix, aggiunge al namespace Admin\ ) e *name* admin., analogo agli altri due ma per il nome della route(in questo caso col punto alla fine).

-----

Vado quindi a creare il mio index dei post, dentro a admin/posts.

Posso aiutarmi con gli **Helper** di Laravel, metodi utili, che per esempio limitano le stringhe. [piccola nota: la versione 5.7 di laravel mi propone una classe, mentre la 5.6 un metodo, cosa molto piu comoda. Fortunatamente Laravel e' retroattivo quindi posso usarle entrambe indifferentemente]


-----

 ```public function show($slug)
    {
        // dd($post->category->slug);
        $post = Post::where('slug', $slug)->first();


        return view('posts.show', compact('post'));

    }
 
 ```

 si puo fare con lo **slug** come sopra con quella query where, con l **id** e devo solo cambiare la *query* mettendo`$post = Post::find($id);`, oppure con la **dependence injection** e posso direttamente ritornare la view. 

 L altra differenza fra slug e id sta nella *route* della view: in un caso passo `$post->slug`, nell altro passo `$post->id`.


-----
-----


 **Categories**

 Mi genero la nuova tabella come fatto per i post:

`php artisan make:migration create_categories_table`

`php artisan migrate`

*Utile comando:* `php artisan migrate:rollback` mi serve per tornare indietro, per esempio nel caso in cui ho gia fatto la migrate, aggiungo successivamente nuove colonne alla tabella e voglio aggiornare il db, uso rollback e riuso migrate.

Anche qui genero il model e il controller:

`php artisan make:model Category` (ricordare **fillable**)

`php artisan make:controller -r Admin/CategoryController`

Per evitare di fare la CRUD sulle categories, popolo la tabella con i soliti seeder.

**Ricorda sempre di importare il model dove serve.** `App\NOMEMODEL`(lo stesso vale per tutte le altre classi, ove servano).

-----
-----

**RELAZIONI**

Ora c e' una parte molto importante che riguarda le **relazioni**. Per collegare due tabelle tramite *foreign key*.

Innanzitutto utilizzo *update* per la tabella posts:

`php artisan make:migration update_posts_table --table=posts`
Questa migration mi permette di **aggiungere una relazione fra tabelle**.

Nella migration andro a copiare cio che c e nella documentazione.  

La sintassi della foreign key sta per:

*category_id(colonna tabella post) e' l id della tabella categories (id e colonna tabella da joinare con tabella post, ovvero tabella categories)*

A questo punto posso agiungere ai seeder e al fillable del post anche *category_id*

Faccio girare i seeder e rigenero la tabella dei post: `php artisan db:seed --class=PostTableSeeder`


A questo punto devo agire sui **model** delle due tabelle Category e Post per dire a laravel le effettive relazioni. Inizio chiedendomi: 'chi e che ha tanti fra i due?'
In questo caso una categoria puo avere tanti post. iniziamo quindi dal modello Category.

 ```language
 public function nomealtroelementorelazione() {

        return $this->relazione('App\altromodello');
    }
 ```

 **nota**`$post->category->title`. Category e' un vero e proprio array con title e id(sono le colonne della tabella Categories)

-----

Nella CRUD dei post, nel create devo fare la query per prendere tutte le categorie tramite il model, e poi col compact le passo alla view e da li con un foreach le rendo disponibili alla select. Cosi e' dinamico.

-----

**query sql**

`$category = Category::where('slug', $slug)->first();`



cerca nel model Controller (che ho debitamente importato con use) tutti gli elementi in cui 'slug' e' uguale allo $slug che gli ho dato in ingresso nella mia funzione.

Questa invece e' la query che si usa solo per l id.
`Category::find($id)`

----- 


per passare lo **slug** lo metto nel secondo argomento della route!!


-----

**importante** se io utilizzo la dependence injection, es: (Post $post), allora nell url della mia rotta dovro mettere per esempio /show/{post}. Deve coincidere il nome "post" per poterlo passare dall url al controller.

-----

il titolo dell app e' il primo campo dell ENV, poi riavvia il server per vedere la modifica e reinstalla debugbar con composer.

-----

importante: utilizzo operatore ternario per selezionare automaticamente la categoria che ho in origine nel post che voglio editare.

`{{ $category->id }}" {{$category->id == ($post->category_id ) ? "selected" : null}}`

-----

I **namespace** sono sempre col backslash: in pratica in laravel si usa backslash(namespace e controller) e dot point dove dovrei usare slash, nel terminale uso sempre solo lo slash.

-----

Se ho un *controller* nella stessa cartella del file **Controller.php** allora non lo devo richiamare con *use*. Se invece il mio controller e' in una cartella diversa da **Controller.php** allora devo chiamarlo con use.

-----

**Deendency Injection**:

`(Post $post)` equivale a `$post = new Post`

-----

**Comando molto utile**

`composer dump-autoload`
In caso in cui laravel non ricarichi quello che ho fatto e dia errore nonostante il codice scritto sia giusto.


-----

**Delete** di categories che sono relazionate ad altre tabelle non e' possibile. Dovrei cancellare tutti i post in cui sono presenti quelle categorie. Posso comunque modificare quelle categorie.

------


Nota sulla **dependency injection**:

essa funziona SOLO se la classe della mia dependency injection e' *identica* al nome del controller: per esempio classe `Post` nel controller `PostController`.

-----

-----

# DA FINIRE:


*facoltative:*


1 - aggiusta select nel filter home categories

2 - text area per html







