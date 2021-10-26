<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSetup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
