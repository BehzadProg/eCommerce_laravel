<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email' , 'admin@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->user_id = $user->id;
        $vendor->banner = '123_Image.jpeg';
        $vendor->phone = '1234566543';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'Iran';
        $vendor->description = 'descripton shop';
        $vendor->save();

    }
}
