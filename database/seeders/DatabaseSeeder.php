<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(20)->create();
        Post::factory(50)->create();
        Comment::factory(100)->create();
    }
}
