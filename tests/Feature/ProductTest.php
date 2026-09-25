<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_verified_user_can_create_update_and_delete_a_product(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('products.store'), [
                'description' => 'Producto nuevo',
                'price' => 150,
            ])
            ->assertRedirect(route('products.index'));

        $product = Product::query()->where('description', 'Producto nuevo')->firstOrFail();

        $this->actingAs($user)
            ->put(route('products.update', $product), [
                'description' => 'Producto actualizado',
                'price' => 200,
            ])
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'description' => 'Producto actualizado',
            'price' => 200,
        ]);

        $this->actingAs($user)
            ->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_unverified_user_cannot_access_product_resource(): void
    {
        $user = User::factory()->unverified()->create();

        $this->actingAs($user)
            ->get(route('products.index'))
            ->assertForbidden();
    }

    public function test_product_requests_validate_input(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('products.store'), [
                'description' => '',
                'price' => -1,
            ])
            ->assertSessionHasErrors(['description', 'price']);
    }
}
