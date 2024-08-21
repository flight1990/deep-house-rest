<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $pages = Page::query()->select('name', 'slug')->get();

        foreach ($pages as $page) {
            Menu::create([
                'name' => $page->name,
                'url' => env('APP_URL').'/'.$page->slug
            ]);
        }
    }
}
