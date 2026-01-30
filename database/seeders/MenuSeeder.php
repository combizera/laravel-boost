<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Header Menu',
                'slug' => 'header-menu',
                'location' => 'header',
                'items' => [
                    ['label' => 'Home', 'url' => '/', 'order' => 1],
                    ['label' => 'Docs', 'url' => 'https://laravel.com/docs', 'order' => 2],
                    ['label' => 'Admin', 'url' => '/admin', 'order' => 3],
                ],
            ],
            [
                'name' => 'Footer Menu',
                'slug' => 'footer-menu',
                'location' => 'footer',
                'items' => [
                    ['label' => 'Documentation', 'url' => 'https://laravel.com/docs', 'order' => 1],
                    ['label' => 'GitHub', 'url' => 'https://github.com/laravel/laravel', 'order' => 2],
                    ['label' => 'Laravel.com', 'url' => 'https://laravel.com', 'order' => 3],
                ],
            ],
        ];

        foreach ($menus as $menuData) {
            $items = $menuData['items'];
            unset($menuData['items']);

            $menu = Menu::create($menuData);

            foreach ($items as $item) {
                $menu->items()->create($item);
            }
        }
    }
}
