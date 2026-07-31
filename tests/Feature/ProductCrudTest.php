<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_list_can_be_displayed(): void
    {
        $product = Product::query()->create([
            'name' => 'Produk Uji',
            'description' => 'Deskripsi produk uji.',
            'price' => 12500,
            'stock' => 10,
        ]);

        $this->get(route('products.index'))
            ->assertOk()
            ->assertSee($product->name);
    }

    public function test_product_can_be_created(): void
    {
        $response = $this->post(route('products.store'), [
            'name' => 'Produk Baru',
            'description' => 'Produk dari feature test.',
            'price' => 15000.50,
            'stock' => 12,
        ]);

        $response
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Produk Baru',
            'stock' => 12,
        ]);
    }

    public function test_invalid_product_is_rejected(): void
    {
        $this->post(route('products.store'), [
            'name' => '',
            'price' => -1,
            'stock' => -5,
        ])->assertSessionHasErrors(['name', 'price', 'stock']);
    }

    public function test_product_can_be_updated(): void
    {
        $product = Product::query()->create([
            'name' => 'Nama Lama',
            'description' => null,
            'price' => 10000,
            'stock' => 5,
        ]);

        $this->put(route('products.update', $product), [
            'name' => 'Nama Baru',
            'description' => 'Sudah diperbarui.',
            'price' => 11000,
            'stock' => 8,
        ])->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Nama Baru',
            'stock' => 8,
        ]);
    }

    public function test_product_can_be_deleted(): void
    {
        $product = Product::query()->create([
            'name' => 'Produk Dihapus',
            'description' => null,
            'price' => 8000,
            'stock' => 2,
        ]);

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
