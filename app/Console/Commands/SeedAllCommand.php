<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeedAllCommand extends Command
{
    protected $signature = 'db:seed:all';
    protected $description = 'Run all database seeders';

    public function handle(): int
    {
        // Jalankan migrasi dulu (opsional)
        $this->info('📦 Migrating database...');
        Artisan::call('migrate', [], $this->getOutput());

        // Jalankan semua seeder terdaftar
        $this->info('🌱 Seeding all...');
        Artisan::call('db:seed', [], $this->getOutput());

        $this->info('✅ All seeders executed successfully.');
        return Command::SUCCESS;
    }
}
