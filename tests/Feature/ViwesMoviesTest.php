<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViwesMoviesTest extends TestCase
{
    public function the_main()
    {
        $response = $this->get(route('movies'));

        $response->assertSuccessful();
    }
}
