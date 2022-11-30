<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(["name"=>"Admin"]);
        Role::create(["name"=>"Retailer"]);
        Role::create(["name"=>"Employee"]);
        Role::create(["name"=>"Distributor"]);
        Role::create(["name"=>"Super Distributor"]);
        Role::create(["name"=>"B2C"]);
        Role::create(["name"=>"Api User"]);
    }
}
