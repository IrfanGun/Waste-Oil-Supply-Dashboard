<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Suplai;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSupplyControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function can_create_user_supply()
    {
        // Arrange
        $user = User::factory()->create();
        $requestData = [
            // ... valid request data
        ];

        // Act
        $response = $this->actingAs($user)->post('/user-supply', $requestData);

        // Assert
        $this->assertDatabaseHas('suplai', [
            'user_id' => $user->id,
            'menunggu' => true,
            'diterima' => false,
            'ditolak' => false,
            // ... other assertions
        ]);
    }
}
