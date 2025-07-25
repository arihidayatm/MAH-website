<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Truncate all relevant tables (urutkan dari anak ke induk agar aman)
        DB::table('tags')->truncate();
        DB::table('menus')->truncate();
        DB::table('pages')->truncate();
        DB::table('channels')->truncate();
        DB::table('settings')->truncate();
        DB::table('languages')->truncate();
        DB::table('users')->truncate();

        // Enable again
        Schema::enableForeignKeyConstraints();

        // Call the individual seeders
        // Ensure the order of seeding is correct to avoid foreign key issues
        $this->call([
            LanguagesSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            SuperUserSeeder::class,
            ChannelSeeder::class,
            // TagSeeder::class,
        ]);
    }
}
