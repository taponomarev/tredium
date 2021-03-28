<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleService
{
    /**
     * @var int
     */
    private $limit = 6;

    /**
     * @var int
     */
    private $paginate = 10;

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Article::sorted()->limit($this->limit);
    }

    /**
     * @return mixed
     */
    public function getAllWithPaginate()
    {
        return Article::sorted()->paginate($this->paginate);
    }

    /**
     * @param array $data
     * @return null
     */
    public function createComment(array $data)
    {
        $article = Article::find($data['article_id']);
        if ($article == null) {
            return null;
        }

        $article->comments()->create($data);

        return $article;
    }

    /**
     * @param Request $request
     * @return null
     */
    public function createLike(Request $request)
    {
        $article = Article::find($request->get('articleId'));
        if ($article == null) {
            return null;
        }

        $article->likes()->create();

        return $article;
    }

    /**
     * @param Request $request
     * @return null
     */
    public function createView(Request $request)
    {
        $article = Article::find($request->get('articleId'));
        if ($article == null) {
            return null;
        }

        $article->views()->create();

        return $article;
    }
}
