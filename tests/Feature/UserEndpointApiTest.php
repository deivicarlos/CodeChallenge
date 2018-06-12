<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserEndpointApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testGetUserWithExistingId() {
        $response = $this->get('api/users/1');
        $response->assertJson(['code' => 200]);
        $this->assertDatabaseHas('users', ['id' => 1]);
    }

    public function testGetUserWithNonExistingId() {
        $response = $this->get('api/users/55');
        $response->assertJson(['code' => 400]);
        $this->assertDatabaseMissing('users', ['id' => 55]);
    }

    public function testUpdateUserWithExistingId() {
        $response = $this->json('PUT', 'api/users/1', ['name' => 'XXXXXXXXXXXX']);
        $response->assertJson(['code' => 200]);   
        $this->assertDatabaseHas('users', ['name' => 'XXXXXXXXXXXX']);
        $response = $this->json('PUT', 'api/users/1', ['name' => 'Testing']);
        $response->assertJson(['code' => 200]);   
        $this->assertDatabaseHas('users', ['name' => 'Testing']);
    }

    public function testUpdateUserWithNonExistingId() {
        $response = $this->json('PUT', 'api/users/99999', ['name' => 'XXXXXXXXXXXX']);
        $response->assertJson(['code' => 400]);   
        $this->assertDatabaseMissing('users', ['id' => 99999]);
    }

    public function testCreateUser() {
        $response = $this->json('POST', 'api/users', [
            'email' => 'phpunittest@testing.com',
            'name' => 'Testing',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'is_host' => false,
            'date_of_birth' => '1979-06-09',
            'latitude' => 18.909438,
            'longitude'  => -70.732642
            ]);
        
        $response->assertJson(['code' => 200]);
        $this->assertDatabaseHas('users', ['email' => 'phpunittest@testing.com']);

    }

    public function testShouldDeleteExistingUser() {
        $user = User::where('email','phpunittest@testing.com')->first();
        $response = $this->delete('api/users/'.$user->id);
        $response->assertJson(['code' => 200]);
    }
    
    public function testFailToDeleteNonExistingUser() {
        $response = $this->delete('api/users/99999');
        $response->assertJson(['code' => 400]);
    }
}
