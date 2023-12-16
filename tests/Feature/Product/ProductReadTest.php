<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\ProductTestCase;

class ProductReadTest extends ProductTestCase
{
    public function test_read_product(): void
    {
        $response = $this->actingAs(ProductTestCase::mockAsUser())->get(ProductTestCase::HTTP_API_PRODUCT);

        $response->assertStatus(200);
        $response->assertSee('Course');
        $response->assertSee('Orders');
    }
}
