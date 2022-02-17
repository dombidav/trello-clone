<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        /** Admin */
        $admin = User::where('email', '=', 'admin@test.com')->first();
        $admin->assign('admin');

        BouncerFacade::allow('admin')->everything();

        /** User */
        User::where('email', '<>', 'admin@test.com')
            ->each(fn ($user) => $user->assign('user'));

        BouncerFacade::allow('user')->to(['project.create']);
        BouncerFacade::allow('user')->toOwn(Project::class)->to(['project.update', 'project.delete']);

        BouncerFacade::forbid('user')->toManage(User::class);
    }
}
