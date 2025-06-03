<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','anderson.deolliveira@hotmail.com')->first()){
            $adim = User::create([
               'name' => 'anderson',
               'email'=> 'anderson.deolliveria@hotmail.com',
               'password' => Hash::make('demo12345', ['rounds'=> 12]),
               'nivelUser' => 2, //adiministrador 
            ]);
        }
    }
}
