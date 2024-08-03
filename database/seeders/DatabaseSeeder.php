<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create(); 
        // Post::factory(5)->create(); 
        
        // for ($i=1; $i < 11 ; $i++) { 
        //     DB::table('posts')->insert([
        //         ['image' => 'url'.$i, 'title' => "Hoc PHP", "description"=> "description", "user_id"=> 1],
        //     ]);
        // }
       
    }
}
