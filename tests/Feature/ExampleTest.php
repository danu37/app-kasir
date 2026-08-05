<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_redirects_guests_to_login(): void
    {
        $response = $this->get('/');

        $response->assertRedirectToRoute('login');
    }

    public function test_registration_and_password_reset_pages_are_available(): void
    {
        $this->get('/register')->assertOk();
        $this->get('/forgot-password')->assertOk();
        $this->get('/reset-password/test-token?email=admin%40kasir.local')->assertOk();
    }
}
