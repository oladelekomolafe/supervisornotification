<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupervisorNotificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_response_from_supervisor_api_data()
    {
        $response = $this->get('/api/supervisors');

        $response->assertStatus(200);
    }

    public function test_submit_form_data_response()
    {
    	$response = $this->post('/api/submit', [
    		'firstName' => "Oladele",
    		'lastName' => "Komolafe",
    		'email' => "oladele@gmail.com",
    		'phoneNumber' => "1343435335",
    		'supervisor' => 7,
    	]);

    	$response->assertStatus(200);
    }
}
