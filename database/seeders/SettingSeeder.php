<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Site General
            ['key' => 'site.name', 'value' => config('app.name', 'Laravel'), 'type' => SettingType::TEXT, 'group' => 'general'],
            ['key' => 'site.logo', 'value' => null, 'type' => SettingType::IMAGE, 'group' => 'general'],
            ['key' => 'site.favicon', 'value' => null, 'type' => SettingType::IMAGE, 'group' => 'general'],

            // SEO
            ['key' => 'seo.title', 'value' => 'Laravel - The PHP Framework for Web Artisans', 'type' => SettingType::TEXT, 'group' => 'seo'],
            ['key' => 'seo.description', 'value' => 'Laravel is a web application framework with expressive, elegant syntax.', 'type' => SettingType::TEXT, 'group' => 'seo'],
            ['key' => 'seo.keywords', 'value' => 'laravel, php, framework, web development', 'type' => SettingType::TEXT, 'group' => 'seo'],
            ['key' => 'seo.og_image', 'value' => null, 'type' => SettingType::IMAGE, 'group' => 'seo'],

            // Hero Section
            ['key' => 'hero.title', 'value' => 'Welcome to Laravel', 'type' => SettingType::TEXT, 'group' => 'hero'],
            ['key' => 'hero.subtitle', 'value' => 'The PHP Framework for Web Artisans', 'type' => SettingType::TEXT, 'group' => 'hero'],
            ['key' => 'hero.description', 'value' => 'Laravel is a web application framework with expressive, elegant syntax. We\'ve already laid the foundation.', 'type' => SettingType::TEXT, 'group' => 'hero'],
            ['key' => 'hero.image', 'value' => null, 'type' => SettingType::IMAGE, 'group' => 'hero'],
            ['key' => 'hero.cta_text', 'value' => 'Get Started', 'type' => SettingType::TEXT, 'group' => 'hero'],
            ['key' => 'hero.cta_url', 'value' => 'https://laravel.com/docs', 'type' => SettingType::URL, 'group' => 'hero'],

            // About Section
            ['key' => 'about.title', 'value' => 'About Us', 'type' => SettingType::TEXT, 'group' => 'about'],
            ['key' => 'about.description', 'value' => 'We are passionate developers building amazing web applications.', 'type' => SettingType::TEXT, 'group' => 'about'],
            ['key' => 'about.image', 'value' => null, 'type' => SettingType::IMAGE, 'group' => 'about'],

            // Contact Section
            ['key' => 'contact.email', 'value' => 'hello@example.com', 'type' => SettingType::TEXT, 'group' => 'contact'],
            ['key' => 'contact.phone', 'value' => '+1 (555) 123-4567', 'type' => SettingType::TEXT, 'group' => 'contact'],
            ['key' => 'contact.address', 'value' => '123 Main Street, City, Country', 'type' => SettingType::TEXT, 'group' => 'contact'],

            // Social Media
            ['key' => 'social.facebook', 'value' => null, 'type' => SettingType::URL, 'group' => 'social'],
            ['key' => 'social.twitter', 'value' => null, 'type' => SettingType::URL, 'group' => 'social'],
            ['key' => 'social.instagram', 'value' => null, 'type' => SettingType::URL, 'group' => 'social'],
            ['key' => 'social.linkedin', 'value' => null, 'type' => SettingType::URL, 'group' => 'social'],
            ['key' => 'social.github', 'value' => 'https://github.com/laravel', 'type' => SettingType::URL, 'group' => 'social'],

            // Footer
            ['key' => 'footer.copyright', 'value' => '© ' . date('Y') . ' Laravel. All rights reserved.', 'type' => SettingType::TEXT, 'group' => 'footer'],
            ['key' => 'footer.newsletter_text', 'value' => 'Subscribe to our newsletter', 'type' => SettingType::TEXT, 'group' => 'footer'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
