<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Services\Admin\NewsService;
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
    protected $newsService;

    /**
     * NewsController constructor.
     * @param UtilityService $utility
     * @param NewsService $newsService
     */
    public function __construct(UtilityService $utility, NewsService $newsService)
    {
        $this->utility     = $utility;
        $this->newsService = $newsService;
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
    public function store(NewsPostRequest $request):RedirectResponse
    {
        $res = $this->newsService->store($request);

        return $res;
    }

    /**
     * 更新処理
     * @param NewsPostRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsPostRequest $request, News $news): RedirectResponse
    {
        return $this->newsService->update($request, $news);
    }
}
