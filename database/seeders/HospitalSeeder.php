<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = [
            [
            'name'=>'Aga Khan Hospital',
            'email'=>'agakhan012@gmail.com',
            'password'=>'agakhan09fc',
            'address'=>'Gulshan Iqbal block 6',
            'role'=>'hospital',
            ],

            [
            'name'=>'Indus Hospital',
            'email'=>'indus12@gmail.com',
            'password'=> 'Indus09fc',
            'address'=>'Korangi karachi',
            'role'=>'hospital',
            ]
        ];

        foreach($hospitals as $data){
            $user = User::Create(

                [
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                    'role' => 'hospital',
                ]
            );

       Hospital::Create(

        [
            'email'=>$data['email'],
            'user_id'=> $user->id,
            'name'=> $data['name'],
            'password'=> Hash::make($data['password']),
            'address' => $data['address'],
            'role'=>'hospital',
        ]
    );
        }
        
    }
}
