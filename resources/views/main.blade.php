@extends('layouts.default')

@section('title', 'Главная страница')

@section('content')
    <h1>Главная страница</h1>

    <div class="jumbotron mt-4">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque, repellat!</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('articles.index') }}" role="button">Каталог статей</a>
        </p>
    </div>

    <div>
        <h2>Последние статьи</h2>

        @if ($recentArticles->isEmpty())
            <p>Статей не найдено</p>
        @else
            <div class="row mt-4">
                @foreach ($recentArticles as $article)
                    <div class="col-sm-6 col-md-4">
                        @include('includes.article')
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection