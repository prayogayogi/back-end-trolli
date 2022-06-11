<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function testDashboar()
    {
        $this->get("/dashboard", ["title" => "Dashboard"])
            ->assertSeeText("Dashboard");
    }
}
