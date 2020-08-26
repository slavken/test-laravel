@extends('layouts.default')

@section('title', 'Каталог статей')

@section('content')
    <h1>Каталог статей</h1>

    @if ($articles->isNotEmpty())
        <div class="row mt-4">
            @foreach ($articles as $article)
                <div class="col-sm-6">
                    @include('includes.article')
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @else
        <div>Статей не найдено</div>
    @endif
@endsection