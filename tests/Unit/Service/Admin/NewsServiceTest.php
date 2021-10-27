<?php

namespace Tests\Unit\Service\Admin;

use App\Models\News;
use App\Services\Admin\NewsService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class NewsServiceTest extends TestCase
{
    protected $newsService;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->newsService = app()->make(NewsService::class);
    }

    /**
     * @test
     */
    public function 作成処理の返り値は正常である()
    {
        $postData = [
            'title'       => 'テスト',
            'body'        => 'あああああああああああ',
            'news_categories' => [1],
            'public_date' => Carbon::now()->format('Y-m-d'),
            'image'       => '',
            'description' => 'test description',
        ];

        $news = $this->newsService->store($postData);

        $this->assertInstanceOf(RedirectResponse::class, $news);
    }

    /**
     * @test
     */
    public function 編集処理の返り値は正常である()
    {
        $updateNews = News::query()->inRandomOrder()->first();

        $postData = [
            'title'       => 'テスト',
            'body'        => 'あああああああああああ',
            'news_categories' => [1],
            'public_date' => Carbon::now()->format('Y-m-d'),
            'image'       => '',
            'description' => 'test description',
        ];

        $news = $this->newsService->update($postData, $updateNews);

        $this->assertInstanceOf(RedirectResponse::class, $news);
    }
}