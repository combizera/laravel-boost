<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id' => \App\Models\Menu::factory(),
            'label' => fake()->words(2, true),
            'url' => fake()->url(),
            'order' => fake()->numberBetween(0, 10),
            'is_active' => fake()->boolean(90),
        ];
    }
}
