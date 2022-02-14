<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //User::factory()->times(10)->make(); // NEM menti a generált user-eket
        User::factory()->times(64)->create(); // Elmenti a generált user-eket

        for ($i = 0; $i < 100; $i++) {
            User::factory()->create();
        }
    }
}
