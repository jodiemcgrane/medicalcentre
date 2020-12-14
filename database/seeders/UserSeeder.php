<?php
# @Date:   2020-11-03T10:04:57+00:00
# @Last modified time: 2020-12-14T18:42:53+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get the admin role and store it, attach this user which is admin to the admin role
        //use first method to retrieve as one single role and not an array incase weve more than one admin role user
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();
        //$role_visit = Role::where('name', 'visit')->first();



        //admin user
        $admin = new User();
        $admin->name = 'Jodie Mcgrane';
        $admin->address = '2 Meadow Park Firhouse';
        $admin->phone = '085 442 8745';
        $admin->email = 'admin@medicalcentre.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        //patient users
        $user = new User();
        $user->name = 'Amy Doyle';
        $user->address = 'Marley Park';
        $user->phone = '085 2587 123';
        $user->email = 'amy@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '222222222222A';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Mary Jones';
        $user->address = 'Citywest';
        $user->phone = '089 324 1567';
        $user->email = 'mary@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 3;
        $patient->policy_number = '333333333333B';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Phil Evans';
        $user->address = 'Rathfarnham';
        $user->phone = '085 6754 342';
        $user->email = 'phil@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '555555555555W';
        $patient->user_id = $user->id;
        $patient->save();

        //doctor users
        $user = new User();
        $user->name = 'Elle Lyons';
        $user->address = 'Springfield';
        $user->phone = '089 8596 675';
        $user->email = 'elle@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = '1999-11-03';
        $doctor->save();
    }
}
