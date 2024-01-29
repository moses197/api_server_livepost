<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableAndEnableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableAndEnableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('posts');
        $posts = \App\Models\Post::factory(3)
        // ->has(Comment::factory(3), 'comments')
        ->untitled()
        ->create();

        $posts->each(function (Post $post){
            $post->users()->sync([FactoryHelper::getRandomModelId(User::class)]);
        });
        $this->enableForeignKeys();
    }
}
