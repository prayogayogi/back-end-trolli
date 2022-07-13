<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    public function testReturnRedirect()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/category/index');
        $this->assertGuest($guard = null);
    }
}
