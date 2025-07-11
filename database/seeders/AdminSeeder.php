<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'AdminUser',
            'email'=>'admin09@gmail.com',
            'password'=>Hash::make('admin09f'),
            'role'=>'admin',
        ]);
    }
}
