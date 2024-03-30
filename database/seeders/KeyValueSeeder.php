<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class KeyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::query()->truncate();

        $keys = [
            ['key' => 'server_username' , 'value' => 'root'],
            ['key' => 'server_password' , 'value' => 'root' ],
            ['key' => 'panel_username' , 'value' => 'admin'],
            ['key' => 'panel_password' , 'value' => 'admin'],
        ];

        foreach ($keys as $key)
        {
           Settings::query()->create($key);
        }
    }
}
