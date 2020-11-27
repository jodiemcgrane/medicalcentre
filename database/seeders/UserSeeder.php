<?php
# @Date:   2020-11-03T10:04:57+00:00
# @Last modified time: 2020-11-20T12:14:23+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;

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
        //use first method to retrieve as one single role and not an array inace weve more than one admin role user
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();
        $role_visit = Role::where('name', 'visit')->first();



        //admin
        $admin = new User();
        $admin->name = 'Jodie Mcgrane';
        $admin->address = '2 Meadow Park Firhouse';
        $admin->phone = '085 442 8745';
        $admin->email = 'admin@medicalcentre.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        //doctor
        $doctor = new User();
        $doctor->name = 'John Jones';
        $doctor->address = '5 Brookview Lawns Tallaght';
        $doctor->phone = '089 5584 142';
        $doctor->email = 'doctor@medicalcentre.ie';
        $doctor->password = Hash::make('secret');
        $doctor->save();
        //attaching the admin role to this user
        $doctor->roles()->attach($role_doctor);

        //patient
        $patient = new User();
        $patient->name = 'Emma Baker';
        $patient->address = '9 Doddervalley Park Ballycullen';
        $patient->phone = '083 8932 741';
        $patient->email = 'patient@medicalcentre.ie';
        $patient->password = Hash::make('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);

        //visit
        $visit = new User();
        $visit->name = 'Joan Murphy';
        $visit->address = '9 Parklands Drive Dundrum';
        $visit->phone = '083 2587 458';
        $visit->email = 'visit@medicalcentre.ie';
        $visit->password = Hash::make('secret');
        $visit->save();
        $visit->roles()->attach($role_visit);

        $user = new User();
        $user->name = 'Amy Doyle';
        $user->address = 'Marley Park';
        $user->phone = '085 2587 123';
        $user->email = 'amy@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);

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
        $user->roles()->attach($role_user);

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
        $user->roles()->attach($role_user);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '555555555555W';
        $patient->user_id = $user->id;
        $patient->save();
    }
}
