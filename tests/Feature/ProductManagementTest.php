<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/products');

        $response->assertOk();
    }

    public function test_product_can_be_created(): void
    {
        $response = $this->post('/products', [
            'name' => 'Test Keyboard',
            'sku' => 'TEST-KEY-002',
            'description' => 'Mechanical keyboard',
            'price' => 1499.00,
            'stock_quantity' => 10,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'sku' => 'TEST-KEY-002',
            'name' => 'Test Keyboard',
        ]);
    }

     public function test_duplicate_sku_is_rejected(): void
    {
        Product::create([
            'name' => 'First Product',
            'sku' => 'DUP-001',
            'description' => null,
            'price' => 100,
            'stock_quantity' => 5,
        ]);

        $response = $this->post('/products', [
            'name' => 'Second Product',
            'sku' => 'DUP-001',
            'price' => 200,
            'stock_quantity' => 5,
        ]);

        $response->assertSessionHasErrors('sku');

        $this->assertDatabaseCount('products', 1);
    }

}
