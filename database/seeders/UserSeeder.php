<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //User::factory(10)->make(); // NEM menti a generált user-eket
        User::factory(64)->create(); // Elmenti a generált user-eket
    }
}
