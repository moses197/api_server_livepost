<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableAndEnableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use App\Models\Post;


class CommentSeeder extends Seeder
{
    use TruncateTable, DisableAndEnableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('comments');
        $posts = \App\Models\Comment::factory(3)
        // ->for(Post::factory(1). 'post')
        ->create();
        $this->enableForeignKeys();
    }
}
