<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            // [
            //     'name'=>'mas admin',
            //     'email'=>'admin@gmail.com',
            //     'role'=>'admin',
            //     'password'=>bcrypt('123456'),
            //     'barcode'=>'1',
            // ],
            [
                'name'=>'tamma',
                'email'=>'tamma@gmail.com',
                'role'=>'pengguna',
                'password'=>bcrypt('123456'),
                'barcode'=>'2',
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
