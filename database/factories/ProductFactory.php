<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            'Laptop Ultrabook Pro 14"',
            'Monitor 27" 4K IPS',
            'Teclado Mecánico RGB',
            'Mouse Inalámbrico Ergonómico',
            'Auriculares Noise-Cancelling',
            'Webcam Full HD 1080p',
            'Disco SSD 1TB NVMe',
            'Hub USB-C 7 puertos',
            'Silla Gamer Ergonómica',
            'Escritorio de Pie Ajustable',
        ];

        return [
            'description' => $this->faker->randomElement($products) . ' ' . $this->faker->bothify('Mod. ##??'),
            'price'       => $this->faker->numberBetween(299, 25000),
        ];
    }
}
