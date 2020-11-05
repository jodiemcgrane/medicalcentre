<?php
# @Date:   2020-11-03T10:05:08+00:00
# @Last modified time: 2020-11-05T14:56:07+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
//import role model
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //stored in this object called role_admin
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        //saving the role, stores these details in the db
        $role_admin->save();

        //created new instance of role role_doctor
        $role_doctor = new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'A doctor user';
        $role_doctor->save();


        $role_patient = new Role();
        $role_patient->name = 'patient';
        $role_patient->description = 'A patient user';
        $role_patient->save();

        $role_visit = new Role();
        $role_visit->name = 'visit';
        $role_visit->description = 'A visit user';
        $role_visit->save();


    }
}
