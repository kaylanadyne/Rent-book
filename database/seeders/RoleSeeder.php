<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'nadin',
                'email' => 'nadin@gmail.com',
                'password' => Hash::make('nadin917'),
                'no_hp' => '089692007686',
                'address' => 'bgr',
                'role_id' => 1,

            ],
            [
                'name' => 'siti',
                'email' => 'siti@gmail.com',
                'password' => Hash::make('siti917'),
                'no_hp' => '089692007686',
                'address' => 'ciawi',
                'role_id' => 2,
            ]
            ]);
    }
}
