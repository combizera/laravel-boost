<?php

namespace Database\Factories;

use App\Enums\SettingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(SettingType::cases());
        $group = fake()->randomElement(['hero', 'about', 'seo', 'contact', 'footer']);

        return [
            'key' => fake()->unique()->slug(2),
            'value' => $this->generateValueByType($type),
            'type' => $type,
            'group' => $group,
        ];
    }

    protected function generateValueByType(SettingType $type): string
    {
        return match ($type) {
            SettingType::IMAGE => fake()->imageUrl(),
            SettingType::URL => fake()->url(),
            SettingType::BOOLEAN => fake()->boolean() ? '1' : '0',
            SettingType::NUMBER => (string) fake()->numberBetween(1, 100),
            default => fake()->sentence(),
        };
    }
}
