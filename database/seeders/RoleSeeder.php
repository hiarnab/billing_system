<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Super Admin',
            'description' => 'This is super admin',
        ]);
          Role::create([
            'name' => 'Student',
            'description' => 'This is student',
        ]);
          Role::create([
            'name' => 'Admin',
            'description' => 'This is Admin',
        ]);
           Role::create([
            'name' => 'Excutive',
            'description' => 'This is excutive',
        ]);
    }
}
