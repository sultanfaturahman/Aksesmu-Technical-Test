<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_product_list(): void
    {
        $this->get('/')
            ->assertRedirect('/products');
    }
}
