<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\News;
use App\Repositories\Admin\News\NewsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsService
{
    protected $newsRepository;

    /**
     * EstatePhotoService constructor.
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param array $validated
     * @return RedirectResponse
     */
    public function store(array $validated = []): RedirectResponse
    {
        $exceptKey = ['news_categories'];

        DB::beginTransaction();
        try {
            $this->newsRepository->store($validated, $exceptKey);

            DB::commit();

            session()->flash('flash_message', '新規作成が完了しました');
            $res = redirect()->route('admin.news.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }

    /**
     * 更新処理
     * @param array $validated
     * @param News $news
     * @return RedirectResponse
     */
    public function update(array $validated = [], News $news): RedirectResponse
    {
        $exceptKey = ['news_categories'];

        DB::beginTransaction();
        try {
            $this->newsRepository->update($news, $validated, $exceptKey);
            DB::commit();

            session()->flash('flash_message', '更新完了しました');
            $res = redirect()->route('admin.news.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }
}