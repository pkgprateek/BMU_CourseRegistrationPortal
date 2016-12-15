<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role;
        $admin->name = "admin";
        $admin->label = "The admin of the system";
        $admin->save();

        $faculty = new Role;
        $faculty->name = "faculty";
        $faculty->label = "Faculty of the University";
        $faculty->save();

        $student = new Role;
        $student->name = "student";
        $student->label = "A student registered to the University";
        $student->save();

        // $permission = new Permission;
        // $permission->name = "edit_students";
        // $permission->label = "Allowed to edit students";
        // $permission->save;

        // $admin->assign($permission);
    }
}
