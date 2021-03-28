<?php

use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleLikeController;
use App\Http\Controllers\ArticleViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resources([
    'article_likes' => ArticleLikeController::class,
    'article_views' => ArticleViewController::class,
    'article_comments' => ArticleCommentController::class
]);
