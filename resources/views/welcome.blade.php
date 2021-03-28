@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{ __('messages.main_page.title') }}</h1>
            <p>{{ __('messages.main_page.description') }}</p>
        </div>

        <div class="card-columns">
            @forelse($articles as $article)
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ $article->preview }}"
                        alt="{{ $article->title }}"
                    >
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($article->text, 100, '...') }}
                        </p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary mb-3">Подробнее</a>
                        @include('articles.bottom-card')
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
