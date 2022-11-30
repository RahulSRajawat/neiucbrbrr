<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
       $adminRole = User::create([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "role"=>1,
            "password"=> Hash::make("admin123"),
            "status"=>1
        ]);
        $retailerRole = User::create([
            "name"=>"Retailer",
            "email"=>"retailer@gmail.com",
            "role"=>2,
            "password"=> Hash::make("retailer123"),
            "status"=>1
        ]);
        $employeeRole = User::create([
            "name"=>"Employee",
            "email"=>"employee@gmail.com",
            "role"=>3,
            "password"=> Hash::make("employee123"),
            "status"=>1
        ]);
        $distributorRole = User::create([
            "name"=>"Distributor",
            "email"=>"distributor@gmail.com",
            "role"=>4,
            "password"=> Hash::make("distributor123"),
            "status"=>1
        ]);
        $superdistributorRole = User::create([
            "name"=>"Super Distributor",
            "email"=>"superdistributor@gmail.com",
            "role"=>5,
            "password"=> Hash::make("superdistributor123"),
            "status"=>1
        ]);
        $b2cRole = User::create([
            "name"=>"B2C",
            "email"=>"b2c@gmail.com",
            "role"=>6,
            "password"=> Hash::make("b2c123"),
            "status"=>1
        ]);
        $apiuserRole = User::create([
            "name"=>"Api User",
            "email"=>"apiuser@gmail.com",
            "role"=>7,
            "password"=> Hash::make("apiuser123"),
            "status"=>1
        ]);
    }
}
