<div class="card mb-4">
    <img class="card-img-top" src="https://via.placeholder.com/700x300" alt="Card image cap">
    <div class="card-body">
        <h4>{{ Str::limit($article->title, 40) }}</h4>
        <p>{{ Str::limit($article->body) }}</p>

        <a href="{{ route('articles.show', $article->slug) }}" class="stretched-link"></a>
    </div>
</div>