<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * お知らせ管理のCRUD
 * Class NewsController
 * @package App\Http\Controllers\Admin
 */
class NewsController extends Controller
{
    private $uploadTo = 'uploads/news';
    const SELECT_LIMIT = 15;
    private $utility;

    /**
     * NewsController constructor.
     * @param UtilityService $utility
     */
    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * 一覧表示
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $newsLists = $this->utility->getSearchResultAtPagerByColumn('News', $params, 'title', self::SELECT_LIMIT, false);

        $title = 'お知らせ 一覧';

        $data = [
            'params'    => $params,
            'newsLists' => $newsLists,
            'title'     => $title,
        ];

        return view('admin.news.index', $data);
    }

    /**
     * 新規作成 画面表示
     * @param News $news
     * @return View
     */
    public function create(News $news): View
    {
        // カテゴリ取得
        $newsCategories = $this->utility->getTargetColumnAssocWithSearch('NewsCategory', 'name', '','', false);
        $newsCategories = $this->utility->addEmptyRowToAssoc($newsCategories, false);

        $title = 'お知らせ 登録';

        $data = [
            'newsCategories' => $newsCategories,
            'news'  => $news,
            'title' => $title,
        ];

        return view('admin.news.create', $data);
    }

    /**
     * 編集画面表示
     * @param News $news
     * @return View
     */
    public function edit(News $news): View
    {
        // カテゴリ取得
        $newsCategories = $this->utility->getTargetColumnAssocWithSearch('NewsCategory', 'name', '','', false);
        $newsCategories = $this->utility->addEmptyRowToAssoc($newsCategories, false);

        $title = $news->title . '編集';

        $data = [
            'newsCategories' => $newsCategories,
            'title' => $title,
            'news'  => $news,
        ];

        return view('admin.news.edit', $data);
    }

    /**
     * 登録処理
     * @param NewsPostRequest $request
     * @return RedirectResponse
     */
    public function store(NewsPostRequest $request) :RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $news = new News();

            $news->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            Log::critical($e->getMessage());;
        }
        session()->flash('flash_message', '新規作成完了しました');

        return redirect()->route('admin.news.index');
    }

    /**
     * 更新処理
     * @param NewsPostRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsPostRequest $request, News $news)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $news->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            return redirect()->back()->withInput();
        }
        session()->flash('flash_message', '更新完了しました');

        return redirect()->route('admin.news.index');
    }
}
