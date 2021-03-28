<h3>{{ __('messages.add_comment') }}</h3>
{{ Form::model(['url' => route('article_comments.store')], ['class' => 'comment-form']) }}
<div class="col-6">
    {{ Form::hidden('article_id', $article->id) }}
    <div class="form-group">
        {{ Form::label('subject', __('messages.articles.form.subject')) }}
        {{ Form::text('subject', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('text', __('messages.articles.form.text')) }}
        {{ Form::textarea('text', null, ['class' => 'form-control']) }}
    </div>
</div>
{{ Form::submit(__('messages.send'), ['class' => 'btn btn-primary btn-submit']) }}
{{ Form::close() }}
