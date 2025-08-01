<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /** Run the database seeders. */
    public function run(): void
    {
        Language::insert([
            [
                'id'         => 1,
                'name'       => 'English',
                'code'       => 'en',
                'status'     => 1,
                'is_default' => 1,
            ],
            [
                'id'         => 2,
                'name'       => 'Arabic',
                'code'       => 'ar',
                'status'     => 1,
                'is_default' => 0,
            ],
            [
                'id'         => 3,
                'name'       => 'French',
                'code'       => 'fr',
                'status'     => 1,
                'is_default' => 0,
            ],
            [
                'id'         => 4,
                'name'       => 'Indonesian',
                'code'       => 'id',
                'status'     => 1,
                'is_default' => 0,
            ],

        ]);
    }
}
