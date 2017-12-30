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
        $response->assertSuccessful();
    }

    /**
     * Create a user, login, try to load user page.
     * Tests active middleware.
     *
     * @return void
     */
    public function testLoginFailRedir()
    {   
        $response = $this->get('/modules/');

        $response->assertRedirect('/?notactive');
    }

    /**
     * Create a user, login, try to load user page.
     * Tests active middleware.
     *
     * @return void
     */
    public function testActiveFailRedir()
    {   
        $user = factory(\ModuleBasedTraining\User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/modules/');

        $response->assertRedirect('/?notactive');
    }

    /**
     * Create an active user, login, try to load user page.
     * Tests active middleware.
     *
     * @return void
     */
    public function testActivePass()
    {   
        $user = factory(\ModuleBasedTraining\User::class)->create(['active' => 1]);

        $response = $this->actingAs($user)
                         ->get('/modules/');

        $response->assertSuccessful()
                 ->assertSee('<h5>Modules:</h5>');
    }

    /**
     * Create a user, login, try to load admin page.
     * Tests admin middleware.
     *
     * @return void
     */
    public function testAdminFailRedir()
    {   
        $user = factory(\ModuleBasedTraining\User::class)->create(['active' => 1]);

        $response = $this->actingAs($user)
                         ->get('/admin/');

        $response->assertRedirect('/?notadmin');
    }

    /**
     * Create an admin user, login, try to load admin page.
     * Tests admin middleware.
     *
     * @return void
     */
    public function testAdminPass()
    {   
        $user = factory(\ModuleBasedTraining\User::class)->create(['admin' => 1]);

        $response = $this->actingAs($user)
                         ->get('/admin/modules/');

        $response->assertSuccessful()
                 ->assertSee('btn">Create Module</a>');
    }

}
