<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetCompanies()
    {
        $response = $this->json('GET', '/api/company/',[]);
        $response->assertStatus(200)
            ->assertJson([
                'data' => array()
            ]);

    }
    public function testCreateCompany()
    {
        $data = [
            'name' => "main",
            'address' => "main Address",
        ];
        $response = $this->json('POST', '/api/company', $data);
        $response->assertStatus(200)
            ->assertJson([
                'data' => true
            ]);

    }


}
