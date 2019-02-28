<?php

use Illuminate\Database\Seeder;
use BeBack\Models\UserGroup;
use Spatie\Permission\Models\Role;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userGroup = new BeBack\Models\UserGroup();
        $userGroup->name = 'Administrador';
        $userGroup->save();

        $userGroup = new BeBack\Models\UserGroup();
        $userGroup->name = 'Site';
        $userGroup->save();
    }
}
