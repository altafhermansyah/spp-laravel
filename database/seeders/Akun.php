<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'qwer',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asd'),
                'role' => 1
            ],
            [
                'name' => 'adi',
                'email' => 'adi@gmail.com',
                'password' => bcrypt('asd'),
                'role' => 2
            ],
            [
                'name' => 'sir',
                'email' => 'sir@gmail.com',
                'password' => bcrypt('asd'),
                'role' => 3
            ],
        ];

        foreach($data as $key => $d)
        {
            User::create($d);
        }
    }
}
