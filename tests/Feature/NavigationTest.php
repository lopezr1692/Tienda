<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_access_root_and_root_links_to_login(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('href="' . route('login') . '"', false);
        $response->assertDontSee('href="' . route('dashboard') . '"', false);
        $response->assertDontSee('href="' . route('products.index') . '"', false);
    }

    public function test_authenticated_user_can_access_root_and_root_links_to_dashboard(): void
    {
        $user = User::factory()->create();
        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->get('/');

        $response->assertOk();
        $response->assertSee('href="' . route('dashboard') . '"', false);
        $response->assertDontSee('href="' . route('products.index') . '"', false);
    }

    public function test_dashboard_navigation_links_are_present(): void
    {
        $user = User::factory()->create();
        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee('href="' . url('/') . '"', false);
        $response->assertSee('href="' . route('dashboard') . '"', false);
        $response->assertSee('href="' . route('products.index') . '"', false);
    }

    public function test_dashboard_displays_administration_modules(): void
    {
        $user = User::factory()->create();
        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee('Panel de administración');
        $response->assertSee('Productos');
        $response->assertSee('Usuarios');
        $response->assertSee('Políticas');
        $response->assertSee('Seguridad');
        $response->assertSee('Auditoría');
        $response->assertSee('Configuración');
        $response->assertSee('Próximamente');
        $response->assertDontSee('href="#"', false);
        $response->assertDontSee('javascript:', false);
        $response->assertDontSee("You're logged in!");
    }

    public function test_products_navigation_links_point_to_home_and_dashboard(): void
    {
        $user = User::factory()->create();
        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->get(route('products.index'));

        $response->assertOk();
        $response->assertSee('href="' . url('/') . '"', false);
        $response->assertSee('href="' . route('dashboard') . '"', false);
    }
}
