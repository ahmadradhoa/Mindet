<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Demo User',
            'email' => 'demo@mail.com',
            'password' => Hash::make('password'),
        ]);

        $tech = Category::create(['name' => 'Teknologi', 'description' => 'Diskusi seputar programming dan teknologi.']);
        $gaming = Category::create(['name' => 'Gaming', 'description' => 'Share game favorit dan tips bermain.']);
        Category::create(['name' => 'General', 'description' => 'Apa saja yang ingin kamu obrolkan.']);

        $post = Post::create([
            'user_id' => $user->id,
            'category_id' => $tech->id,
            'title' => 'Belajar Laravel itu gampang banget!',
            'body' => 'Setelah paham MVC, routing, dan Eloquent, bikin CRUD jadi jauh lebih cepat. Ada yang punya tips belajar lain?',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => 'Setuju! Dokumentasi resminya juga lengkap banget.',
        ]);
    }
}