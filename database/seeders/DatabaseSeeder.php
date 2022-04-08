<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        
        User::create([
            "name" => "Malvin Valerian",
            "email" => "malvin@gmail.com",
            "password" => bcrypt("24092003")
        ]);

        Blogs::factory(20)->create();

        Category::create([
            "name" => "Programming",
            "slug" => "programming"
        ]);

        Category::create([
            "name" => "Travelling",
            "slug" => "travelling"
        ]);

        Category::create([
            "name" => "Design",
            "slug" => "design"
        ]);
    }
}
