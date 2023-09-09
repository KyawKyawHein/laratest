<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'front-end']);
        $backend=Category::factory()->create(['name' => 'backend','slug' => 'back-end']);
        Blog::factory(2)->create(['category_id'=>$frontend->id]);
        Blog::factory(2)->create(["category_id"=>$backend->id]);
    }
}
