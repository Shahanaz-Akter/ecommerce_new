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
        $super_admin_role_seed = Role::where('name', '=', 'Super Admin')->first();
        // dd($super_admin_role_seed);

        if ($super_admin_role_seed == null) {

            $role = new Role();
            $role->name = "Super Admin";
            $role->description = "This role has the highest authority with all the permissions and no restrictions";

            $role->save();
        }

        $admin_role_seed = Role::where('name', '=', 'Admin')->first();

        if ($admin_role_seed == null) {

            $role = new Role();
            $role->name = "Admin";
            $role->description = "This role has the Second authority with all the permissions and no restrictions";

            $role->save();
        }
        $manager_role_seed = Role::where('name', '=', 'Manager')->first();

        if ($manager_role_seed == null) {

            $role = new Role();
            $role->name = "Manager";
            $role->description = "This role has authority to manage management related activities";

            $role->save();
        }

        $supplier_role_seed = Role::where('name', '=', 'Supplier')->first();

        if ($supplier_role_seed == null) {

            $role = new Role();
            $role->name = "Supplier";
            $role->description = "This role has authority to maange supplier related activities";

            $role->save();
        }
    }
}
