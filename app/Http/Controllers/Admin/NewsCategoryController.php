<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCategoryPostRequest;
use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\NewsCategory;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * News Category
 * Class NewsCategoryController
 * @package App\Http\Controllers\Admin
 */
class NewsCategoryController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * 一覧
     * @Method GET
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $params = $this->utility->initIndexParamsAdmin($request);
        $newsCategories = $this->utility->getSearchResultAtPagerByName('NewsCategory', $params, self::SELECT_LIMIT, true);

        $title = 'お知らせカテゴリ 一覧';

        $data = [
            'newsCategories' => $newsCategories,
            'params'  => $params,
            'title'   => $title,
        ];

        return view('admin.news_categories.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  NewsCategory  $newsCategory
     * @return View
     */
    public function create(NewsCategory $newsCategory): View
    {
        $title = 'お知らせカテゴリ 新規作成';

        $data = [
            'newsCategory'     => $newsCategory,
            'title'      => $title,
        ];

        return view('admin.news_categories.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  NewsCategory  $newsCategory
     * @return View
     */
    public function edit(NewsCategory $newsCategory): View
    {
        $title = 'お知らせカテゴリ 編集: '. $newsCategory->name;

        $data = [
            'newsCategory' => $newsCategory,
            'title'        => $title,
        ];

        return view('admin.news_categories.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param NewsPostRequest $request
     * @return RedirectResponse
     */
    public function store(NewsPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {

            $newsCategory = new NewsCategory;
            $newsCategory->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }


        session()->flash('flash_message', '新規作成が完了しました');

        return redirect()->route('admin.news_categories.index');

    }

    /**
     * アップデート
     * @Method PUT
     * @param   $request
     * @param  NewsCategory  $newsCategory
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(NewsCategoryPostRequest $request, NewsCategory $newsCategory): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $newsCategory->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '更新が完了しました');

        return redirect()->route('admin.news_categories.index');
    }

    /**
     * 削除
     * @Method DELETE
     * @param  NewsCategory  $newsCategory
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(NewsCategory $newsCategory): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $newsCategory->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $newsCategory->name.'を削除しました');

        return redirect()->route('admin.news_categories.index');
    }
}
