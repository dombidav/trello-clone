<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //User::factory(10)->make(); // NEM menti a generált user-eket
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@test.com'
        ]);
        User::factory(64)->create(); // Elmenti a generált user-eket
    }
}
