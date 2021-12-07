<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register');
                    // ->type('name','Sparout')
                    // ->type('email','sparout@gmail.com')
                    // ->type('password','Sparout123')
                    // ->type('password_confirmation','Sparout123')
                    //->press('Register')
                   // ->assertPathIs('/home');
        });
    }
}
