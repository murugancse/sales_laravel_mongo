<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesListTest extends DuskTestCase
{
    //use RefreshDatabase;

    protected $user;

    public function setUp():void
    {
        parent::setUp();

        //$this->user = factory(User::class)->create();

        //$this->actingAs($this->user);
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/salesproduct')
                ->assertSee('Sales Product');
                //->press('Edit')
                //->assertPathIs('salesproduct/1/edit');
        });
    }
}
