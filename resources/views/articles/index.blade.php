@extends('layouts.app')

@section('content')
    <div class="row">
            @forelse($articles as $article)
                <div class="col-12 card mb-3">
                    <img
                        class="card-img-top img-fluid"
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
        <div class="paginate">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
