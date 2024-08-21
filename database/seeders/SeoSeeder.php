<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        $menu = Menu::query()->select('name', 'url')->get();

        foreach ($menu as $menuItem) {
            Seo::factory()->create([
                'title' => $menuItem->name,
                'url' => $menuItem->url
            ]);
        }

    }
}
