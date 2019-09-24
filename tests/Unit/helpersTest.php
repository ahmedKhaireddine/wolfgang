<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class helpersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /** @test */
    public function page_title_return_the_base_title_if_title_is_emty()
    {
        // dd(page_title(''));
        $this->assertEquals('WolfGang - Boutique Moto', page_title(''));
    }

    /** @test */
    public function page_title_return_the_correct_title_if_title_is_provided()
    {
        $this->assertEquals(
            'Acceuil | WolfGang - Boutique Moto', 
            page_title('Acceuil')
        );
        $this->assertEquals(
            'Nos produits | WolfGang - Boutique Moto', 
            page_title('Nos produits')
        );
        $this->assertEquals(
            'Contactez-nous | WolfGang - Boutique Moto',
            page_title('Contactez-nous')
        );
    }
    /** @test */
    public function set_active_route_should_return_the_correct_class_based_on_a_given_route()
    {
        $this->get(route('homepage'));
        $this->assertEquals('active', set_active_route('homepage'));
        $this->assertEquals('', set_active_route('products.index') );
        $this->assertEquals('', set_active_route('messages.create') );
        
        $this->get(route('products.index'));
        $this->assertEquals('active', set_active_route('products.index'));
        $this->assertEquals('', set_active_route('homepage') );
        $this->assertEquals('', set_active_route('messages.create') );
        
        $this->get(route('messages.create'));
        $this->assertEquals('active', set_active_route('messages.create'));
        $this->assertEquals('', set_active_route('homepage') );
        $this->assertEquals('', set_active_route('products.index') );
    }

}
