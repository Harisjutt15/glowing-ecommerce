<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 WAY
        // DB::table('categories')->insert([
        //     'title'=>Str::random(10),
        //     'slug'=>Str::random(10),
        // ]);
        for ($i = 0; $i < 50; $i++) {
            $title = fake()->name();
            Category::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => fake()->sentence(1),
                'show_on_home' =>  fake()->boolean(),
                'created_at' => now(),
            ]);
        }
    }
}
