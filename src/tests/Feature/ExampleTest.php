<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    public function setUp(): void
    {
        // dd(env('APP_ENV'), env('DB_HOST'));
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 環境確認()
    {
        // logger()->debug(env('DB_HOST'));
        $this->assertEquals('testing', $this->app->environment());
    }

    /**
     * @test
     */
    public function DBホスト確認()
    {
        // logger()->debug(env('DB_HOST'));
        $this->assertEquals('db-testing', env('DB_HOST'));
    }
}
