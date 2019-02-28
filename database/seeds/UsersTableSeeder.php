<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = BeBack\Models\User::create([
            'user_group_id' => \BeBack\Models\UserGroup::first()->id,
            'name' => 'Interaktiv',
            'email' => 'interaktiv@interaktiv.com.br',
            'password' => Hash::make('inter456$%'),
        ])->assignRole(\BeBack\Models\UserGroup::first()->name);

    }
}
