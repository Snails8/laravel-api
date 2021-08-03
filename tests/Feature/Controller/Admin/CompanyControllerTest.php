<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;

/**
 * Class CompanyControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class CompanyControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 会社管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $companyId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.company.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 会社管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.company.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 会社管理の編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $companyId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.company.edit', ['company' => $companyId]))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function 会社管理の新規登録処理のレスポンスは正常である()
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
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.company.index'))
            ->post(route('admin.company.store'), $postData);

        $res->assertRedirect(route('admin.company.index'));
    }

    /**
     * @test
     */
    public function 会社管理のアップデート処理のレスポンスは正常である()
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
            ->from(route('admin.company.index'))
            ->put(route('admin.company.update', ['company' => $updateCompany->id]), $postData);

        $res->assertRedirect(route('admin.company.index'));
    }
}