<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /** @var array */
    protected $settings = [
        [
            'key'   => 'company_name',
            // 'value' => 'Zakaria Labib',
            'value' => 'Creative Tech Digital',
        ],
        [
            'key'   => 'site_title',
            // 'value' => 'Zakaria Labib',
            'value' => 'Creative Tech Digital',
        ],
        [
            'key'   => 'company_email_address',
            'value' => 'connect@creativetechdigital.com',
        ],
        [
            'key'   => 'company_phone',
            'value' => '+6281234567890',
        ],
        [
            'key'   => 'company_address',
            'value' => 'Jakarta, Indonesia',
        ],
        [
            'key'   => 'company_tax',
            'value' => '1234567890',
        ],
        [
            'key'   => 'site_logo',
            'value' => '',
        ],
        [
            'key'   => 'site_favicon',
            'value' => '',
        ],
        [
            'key'   => 'footer_copyright_text',
            'value' => '',
        ],
        [
            'key'   => 'seo_meta_title',
            // 'value' => 'Zakaria Labib',
            'value' => 'Creative Tech Digital',
        ],
        [
            'key'   => 'seo_meta_description',
            'value' => 'Creative Tech Digital',
        ],
        [
            'key'   => 'social_facebook',
            'value' => '#',
        ],
        [
            'key'   => 'social_twitter',
            'value' => '#',
        ],
        [
            'key'   => 'social_tiktok',
            'value' => '#',
        ],
        [
            'key'   => 'social_instagram',
            'value' => '#',
        ],
        [
            'key'   => 'social_linkedin',
            'value' => '#',
        ],
        [
            'key'   => 'social_whatsapp',
            'value' => '#',
        ],
        [
            'key'   => 'head_tags',
            'value' => '',
        ],
        [
            'key'   => 'body_tags',
            'value' => '',
        ],
        [
            'key'   => 'header_bg_color',
            'value' => '#ffffff',
        ],
        [
            'key'   => 'footer_bg_color',
            'value' => '#ffffff',
        ],
        [
            'key'   => 'site_maintenance_message',
            'value' => 'Site is under maintenance',
        ],
        [
            'key'   => 'whatsapp_custom_message',
            'value' => "Selamat datang di Creative Tech Digital! \n\nSilakan kirim pesan Anda di sini, dan kami akan segera merespons.",
        ],
    ];

    /** Run the database seeds. */
    public function run(): void
    {
        foreach ($this->settings as $index => $setting) {
            $result = Settings::create($setting);

            if (! $result) {
                $this->command->info(sprintf('Insert failed at record %s.', $index));

                return;
            }
        }

        $this->command->info('Inserted ' . count($this->settings) . ' records');
    }
}
