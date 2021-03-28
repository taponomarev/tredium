<?php

namespace App\Jobs;

use App\Services\ArticleService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateArticleComment implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     * @param ArticleService $articleService
     * @param array $data
     */
    public function __construct(ArticleService $articleService, array $data)
    {
        $this->articleService = $articleService;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->articleService->createComment($this->data);
    }
}
