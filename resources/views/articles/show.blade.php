@extends('layouts.default')

@section('title', $article->title)

@section('content')
    <div>
        <img class="img-fluid w-100 mb-4 rounded" src="https://via.placeholder.com/900x300" alt="Card image cap">

        <h1>{{ $article->title }}</h1>
        <div class="d-flex align-items-center mb-3">
            <like-component article="{{ $article->id }}"></like-component>
            <span>Views: {{ $article->views }}</span>
        </div>
        <p>{{ $article->body }}</p>
    </div>

    <comment-component article="{{ $article->id }}"></comment-component>

    @if ($article->comments)
        <div class="mt-4">
            <h4>Комментарии</h4>

            @foreach ($article->comments as $comment)
                <div class="mt-4">
                    <h5>Тема: {{ $comment->subject }}</h5>
                    <p>Текст: {{ $comment->body }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection