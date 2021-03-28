<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleViewController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * ArticleViewController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $article = $this->articleService->createView($request);

        return response()->json([
            'status' => 200,
            'message' => $article->views->count()
        ]);
    }
}
