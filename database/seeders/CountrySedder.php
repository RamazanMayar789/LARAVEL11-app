<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $countries=[];

       foreach($countries as $country){

        Country::query()->create(['name'=>$country]);
       }
    }
}
