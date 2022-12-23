<?php

namespace Database\Seeders;

use App\Models\RechargePlanCategory;
use Illuminate\Database\Seeder;

class RechargePlanCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RechargePlanCategory::truncate();
        RechargePlanCategory::create(["plan_category_name"=>"Popular"]);
        RechargePlanCategory::create(["plan_category_name"=>"Special Recharge"]);
        RechargePlanCategory::create(["plan_category_name"=>"Top Up"]);
        RechargePlanCategory::create(["plan_category_name"=>"2G/3G/4G Data"]);
        RechargePlanCategory::create(["plan_category_name"=>"Full Talktime"]);
    }
}
