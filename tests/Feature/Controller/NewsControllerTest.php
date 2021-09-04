<?php

namespace Tests\Feature\Controller;

use App\Models\News;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お知らせ一覧ページのレスポンスは正常である()
    {
        $this->get('/news')->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせ詳細ページのレスポンスは正常である()
    {
        $news = News::query()->select(['id'])->orderByDesc('id')->first();
        $this->get('/news/'. $news->id)->assertStatus(200);
    }
}