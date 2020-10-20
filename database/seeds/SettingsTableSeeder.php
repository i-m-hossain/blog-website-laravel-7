<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'blogwebsite',
            'contact_number' => '+8801728603351',
            'contact_email' => 'mdimran1409036@gmail.com',
            'address' => 'Fazlul Haque Hall, KUET, Khulna-9203'

        ]);
    }
}
