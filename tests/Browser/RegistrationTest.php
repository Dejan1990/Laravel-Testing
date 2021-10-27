<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function register_new_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('register')
                ->type('name', 'John Doe')
                ->type('email', 'john@example.com')
                ->type('password', 'mypassword123')
                ->type('password_confirmation', 'mypassword123')
                ->screenshot('register')
                ->press('REGISTER')
                ->assertAuthenticated()
                ->assertRouteIs('dashboard');
        });
    }
}
