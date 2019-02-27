<h1>Tutti i post della categoria {{ $category->title }}</h1>
<a href="{{ route('home') }}">Torna alla home</a>

@forelse ($posts as $post)
    <li>
        {{ $post->title }}
    </li>
@empty
    <h2>nessun post da visualizzare</h2>
@endforelse
