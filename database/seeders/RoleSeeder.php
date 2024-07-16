<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_default_role_seed = Role::where('name', ' = ', 'super_admin')->first();

        if ($admin_default_role_seed == null) {

            $role = new Role();
            $role->name = "super Admin";
            $role->description = "This role has the highest authority with all the permissions and no restrictions";
            
            $role->save();
        }
    }
}
