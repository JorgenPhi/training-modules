<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    /**
     * Get the homepage, make sure it loads correctly
     *
     * @return void
     */
    public function testHomePage()
    {   
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
