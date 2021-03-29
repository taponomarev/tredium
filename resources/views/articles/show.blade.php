@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">
            @forelse($article->tags as $tag)
                <a class="btn btn-outline-primary mb-1" href="{{ route('tags.show', $tag) }}">{{ $tag->title }}</a>
            @empty
            @endforelse
        </div>
        <div class="col-9">
            <div class="col-12 mb-3">
                <img
                    class="card-img-top img-fluid"
                    src="{{ $article->preview }}"
                    alt="{{ $article->title }}"
                >
                <div class="article-single">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">
                            {{ $article->text }}
                        </p>
                        @include('articles.bottom-card')
                    </div>
                </div>
                <div class="comments mb-4">
                    <h3>{{ __('messages.comments') }}</h3>
                    @forelse($article->comments as $comment)
                        <div class="card comment mb-3 p-2">
                            <div>{{ __('messages.subject') }}: {{ $comment->subject }}</div>
                            <div>{{ __('messages.message') }}: {{ $comment->text }}</div>
                        </div>
                    @empty
                    @endforelse
                </div>
                @include('articles.form')
            </div>
        </div>
    </div>
@endsection
