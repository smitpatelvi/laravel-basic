<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123@456'),
                'user_type' => '0',
            ],
        ];

        foreach ($user as $ukey => $uvalue) {
            $find = User::where('email', $uvalue['email'])->first();
            if (is_null($find)) {
                $user = User::create($uvalue);
            }
        }
    }
}
