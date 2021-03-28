<div class="row justify-content-between">
    <div class="visibility col d-flex align-items-center">
        <span class="material-icons mr-1">visibility</span>
        <span class="view-label">{{ $article->views->count() }}</span>
    </div>
    <div class="views col text-right d-flex align-items-center justify-content-end">
        <button
            class="btn-like d-flex align-items-center"
            data-id="{{ $article->id }}"
        >
            <span class="material-icons mr-1">favorite_border</span>
            <span class="like-label">{{ $article->likes->count() }}</span>
        </button>
    </div>
</div>
