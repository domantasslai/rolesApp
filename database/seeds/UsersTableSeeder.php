<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Sukuriamas adminas.
     * Name: Admin,
     * Email: admin@gmail.com,
     * Password: password,
    */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
    }
}
