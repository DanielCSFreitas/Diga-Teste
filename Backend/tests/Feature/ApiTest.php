<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Movie;
use App\Models\MovieTag;

class ApiTest extends TestCase

{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected function setUp() :void {
        parent::setUp();
      
        $this->postJson('/auth/store',['name' => 'Api Test User', 'email' => 'apiTest@email.com','password' => 'testPassword','password_confirmation' => 'testPassword']);
        $test = 'test';
    }

    public function test_access_movies_page_denied()
    {   
        $response = $this->get('/api/v1/movie');

        $response->assertStatus(401);
    }

    public function test_access_movies_page()
    {   
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->get('/api/v1/movie');

        $response->assertStatus(200);
    }

    public function test_access_tags_page_denied()
    {
        $response = $this->get('/api/v1/tag');

        $response->assertStatus(401);
    }

    public function test_access_tags_page()
    {   
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->get('/api/v1/tag');

        $response->assertStatus(200);
    }

    public function test_create_movie()
    {   
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->postJson('/api/v1/movie',['name' => 'Api Test Movie','fileSize' => '4']);
        $this->assertDatabaseHas('movie', ['name' => 'Api Test Movie']);
    }

    public function test_create_tag()
    {   
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->postJson('/api/v1/tag',['name' => 'Api Test Tag']);
        $this->assertDatabaseHas('tag', ['name' => 'Api Test Tag']);
    }

    public function test_add_tag_to_movie()
    {   
        $movieCreated = Movie::where('name','Api Test Movie')->first();
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->patch('/api/v1/movie/' . strval($movieCreated['id']),['name' => 'Api Test Updated Movie','fileSize' => '0',"tagId" => [1,2,3]]);
        
        //Checks if there are any tags in the movie
        $this->assertDatabaseHas('movie_tag', ['movie_id' => $movieCreated['id']]);

        //Checks whether the tags are the correct ones
        $tags = MovieTag::where('movie_id',$movieCreated['id'])->take(5)->get();
        $checkTags = [];
        foreach ($tags as $tag) {
            array_push($checkTags, $tag['tag_id']);
        }
        $this->assertEquals([1,2,3], $checkTags);
    }

    public function test_delete_movie()
    {   
        $movieCreated = Movie::where('name','Api Test Updated Movie')->first();
        $responseLogin = $this->postJson('/auth/check',['email' => 'apiTest@email.com','password' => 'testPassword']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $responseLogin['token'],
        ])->delete('/api/v1/movie/' . strval($movieCreated['id']));
        $this->assertDatabaseMissing('movie', ['name' => 'Api Test Updated Movie']);
    }

    public function test_if_tags_are_not_deleted()
    {   
        $this->assertDatabaseHas('tag', ['id' => 1]);
        $this->assertDatabaseHas('tag', ['id' => 2]);
        $this->assertDatabaseHas('tag', ['id' => 3]);
    }

    

}
