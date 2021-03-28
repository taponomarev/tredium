<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleComment;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;

class ArticleCommentController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * ArticleCommentController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateArticleComment $request
     * @return JsonResponse
     */
    public function store(CreateArticleComment $request): JsonResponse
    {
        $data = $request->all(['article_id', 'subject', 'text']);
        \App\Jobs\CreateArticleComment::dispatch($this->articleService, $data);

        return response()->json([
            'status' => 200,
            'message' => __('messages.operation_success')
        ]);
    }
}
