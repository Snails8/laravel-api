<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;

/**
 * Class CompanyControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class NewsCategoryControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お知らせカテゴリ管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $newsCategoryId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_categories.edit', ['news_category' => $newsCategoryId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $newsCategoryId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_categories.edit', ['news_categories' => $newsCategoryId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $news_categoriesId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_categories.edit', ['news_categories' => $news_categoriesId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'name'          => 'テスト',
            'zipcode1'      => 000,
            'zipcode2'      => 1111,
            'address'       => 'テスト',
            'address_other' => '',
            'tel'           => 00011112222,
            'email'         => 'sample@sample.com',
            'representative_name' => 'テスト',
        ];

        $res = $this->actingAs($user, 'admin')
            ->post(route('admin.news_categories.store'), $postData);

        $res->assertRedirect(route('admin.news_categories.index'));
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateCompany = Company::query()->inRandomOrder()->first();

        $postData = [
            'name'          => 'テスト',
            'zipcode1'      => 000,
            'zipcode2'      => 1111,
            'address'       => 'テスト',
            'address_other' => '',
            'tel'           => 00011112222,
            'email'         => 'sample@sample.com',
            'representative_name' => 'テスト',
        ];

        $res = $this->actingAs($user, 'admin')
            ->put(route('admin.news_categories.update', ['news_categories' => $updateCompany->id]), $postData);

        $res->assertRedirect(route('admin.news_categories.index'));
    }
}