<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Variables para usar fake de laravel
        $imagePath = 'storage/images/'; // Directorio donde se guardarán las imágenes
        $fullPath = public_path($imagePath);

        return [
            'urlfoto' => fake()->image($fullPath, 200, 150, null, null),
            'name' => fake()->name(),
            'price' => fake()->numberBetween(1, 199),
            'stock' => fake()->numberBetween(1, 55),
            'categoria_id' => Categoria::inRandomOrder()->first()->id
        ];
    }
}
