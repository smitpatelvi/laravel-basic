<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $sessings = [
                ['name'=>'logo', 'value'=>'logo.png'],
                ['name'=>'favicon_icon', 'value'=>'logo.png'],
                ['name'=>'page_title', 'value'=>'Sample Project'],
                ['name'=>'google_cloud_project_id', 'value'=>''],
                ['name'=>'google_cloud_storage_bucket', 'value'=>''],
                ['name'=>'google_cloud_key_file', 'value'=>''],
                ['name'=>'mail_mailer', 'value'=>''],
                ['name'=>'mail_host', 'value'=>''],
                ['name'=>'mail_port', 'value'=>''],
                ['name'=>'mail_username', 'value'=>''],
                ['name'=>'mail_password', 'value'=>''],
                ['name'=>'mail_encryption', 'value'=>''],
                ['name'=>'mail_from_address', 'value'=>''],
                ['name'=>'mail_from_name', 'value'=>''],
                ['name'=>'fcm_server_key', 'value'=>''],
            ];

        foreach ($sessings as $key => $value) {
            $find = Setting::where('name', $value['name'])->first();
            if (is_null($find)) {
                Setting::create($value);
            }
        }
    }
}
