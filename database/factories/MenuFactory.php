<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement(['Header Menu', 'Footer Menu', 'Sidebar Menu', 'Mobile Menu']);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'location' => fake()->randomElement(['header', 'footer', 'sidebar']),
        ];
    }
}
