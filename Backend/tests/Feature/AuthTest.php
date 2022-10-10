<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_access_register_page()
    {
        $response = $this->get('/auth/register');

        $response->assertStatus(200);
    }

    public function test_register_user()
    {
        $response = $this->postJson('/auth/store',['name' => 'Unit Test User', 'email' => 'unitTest@email.com','password' => 'testPassword','password_confirmation' => 'testPassword']);

        $this->assertDatabaseHas('users', ['name' => 'Unit Test User']);
    }

    public function test_access_login_page()
    {
        $response = $this->get('/auth/login');

        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $response = $this->postJson('/auth/check',['email' => 'unitTest@email.com','password' => 'testPassword']);

        $response->assertJsonStructure(['token']);
    }

    public function test_delete_user()
    {
        $userCreated = User::where('name','Unit Test User')->first();

        $responseDeletion = $this->delete('/auth/delete?id=' . strval($userCreated['id']));

        $this->assertDatabaseMissing('users', ['name' => 'Unit Test User']);
    }

    

}
