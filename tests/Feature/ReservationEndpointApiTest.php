<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Reservation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ReservationEndpointApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testShouldCreateReservation() {
        $response = $this->json(
            'POST', 
            'api/reservations', [
                'host' => 1,
                'guests' => [2,3]
            ]
        );
        $response->assertJson(['code' => 200]);
        $this->assertDatabaseHas('reservations', ['user_id' => 1]);

    }

    public function testFailToCreateReservationWithoutGuests() {
        $response = $this->json(
            'POST', 
            'api/reservations', [
                'host' => 1,
                'guests' => []
            ]
        );
        $response->assertJson([
            'code' => 400,
            'response' => ['errorMessage' => "Unabled to create reservation without guests"]
            ]);
    }

    public function testFailToCreateReservationWhenUserIsNotHost() {
        $response = $this->json(
            'POST', 
            'api/reservations', [
                'host' => 2,
                'guests' => [1,3]
            ]
        );
        $response->assertJson([
            'code' => 400,
            'response' => ['errorMessage' => "Unabled to create reservation, user is not host"]
        ]);
    }

    public function testShouldDeleteUserReservation() {
        $response = $this->delete('api/reservations/hosts/1/guests');
        $response->assertJson(['code' => 200]);
    }
    
    public function testFailToDeleteNonExistingUser() {
        $response = $this->delete('api/users/99999');
        $response->assertJson(['code' => 400]);
    }
}
