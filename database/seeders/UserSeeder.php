<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableAndEnableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableAndEnableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->truncate('users');
        // DB::table('users')->truncate();
        $users = \App\Models\User::factory(10)->create();
        $this->enableForeignKeys();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
    }
}
