<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'Rizki Bagus Penjual',
        //         'username' => 'rizkipenjual',
        //         'kategori' => 'Penjual',
        //         'email' => 'rizkipenjual@gmail.com',
        //         'password' => '00000000'
        //     ],
        //     [
        //         'nama' => 'Rizki Bagus Pembeli',
        //         'username' => 'rizkipembeli',
        //         'kategori' => 'Pembeli',
        //         'email' => 'rizkipembeli@gmail.com',
        //         'password' => '00000000'
        //     ]
        // ];

        // foreach ($data as $value) {
        //     User::create([
        //         'nama' => $value['nama'],
        //         'username' => $value['username'],
        //         'kategori' => $value['kategori'],
        //         'email' => $value['email'],
        //         'password' => Hash::make($value['password'])
        //     ]);
        // }
        Admin::create([
            'nama' => 'Rizki Bagus Pangestu',
            'username' => 'admin',
            'password' => Hash::make('admin')
            // 'created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time())
        ]);
    }
}
