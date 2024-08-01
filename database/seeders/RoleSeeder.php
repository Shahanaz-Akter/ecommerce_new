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
        $super_admin_role_seed = Role::where('name', '=', 'super admin')->first();
        // dd($super_admin_role_seed);

        if ($super_admin_role_seed == null) {

            $role = new Role();
            $role->name = "super Admin";
            $role->description = "This role has the highest authority with all the permissions and no restrictions";

            $role->save();
        }

        $admin_role_seed = Role::where('name', '=', 'admin')->first();

        if ($admin_role_seed == null) {

            $role = new Role();
            $role->name = "admin";
            $role->description = "This role has the Second authority with all the permissions and no restrictions";

            $role->save();
        }
        $manager_role_seed = Role::where('name', '=', 'manager')->first();

        if ($manager_role_seed == null) {

            $role = new Role();
            $role->name = "manager";
            $role->description = "This role has authority to manage management related activities";

            $role->save();
        }

        $supplier_role_seed = Role::where('name', '=', 'supplier')->first();

        if ($supplier_role_seed == null) {

            $role = new Role();
            $role->name = "supplier";
            $role->description = "This role has authority to manage supplier related activities";

            $role->save();
        }

        $customer_role_seed = Role::where('name', '=', 'customer')->first();

        if ($customer_role_seed == null) {

            $role = new Role();
            $role->name = "customer";
            $role->description = "This role has authority to manage customer related activities";

            $role->save();
        }
    }
}
