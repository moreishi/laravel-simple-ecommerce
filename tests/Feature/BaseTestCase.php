<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Tests\CreatesApplication;

class BaseTestCase extends TestCase
{
    use CreatesApplication;
    
    use RefreshDatabase;

    protected function setUp(): void
    {

        parent::setUp();

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->mockAuthUserToken(),
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
        ]);
        
    }

    public static function mockUser()
    {
        return User::factory()->create();
    }

    public static function mockAuthUserToken()
    {
        return BaseTestCase::mockUser()->createToken('unit-test-token')->plainTextToken;
    }

    public static function mockAsUser()
    {
        return User::first();
    }
}
