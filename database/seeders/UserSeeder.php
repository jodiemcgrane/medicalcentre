<?php
# @Date:   2020-11-03T10:04:57+00:00
# @Last modified time: 2021-01-02T17:02:38+00:00




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
        $admin->address = 'BallyCullen';
        $admin->phone = '085 442 8745';
        $admin->email = 'admin@medicalcentre.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        //patient users
        $user = new User();
        $user->name = 'Amy Doyle';
        $user->address = 'Marley Park';
        $user->phone = '0852587123';
        $user->email = 'amy@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '456987123689T';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Mary Jones';
        $user->address = 'Citywest';
        $user->phone = '0893241567';
        $user->email = 'mary@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 3;
        $patient->policy_number = '145876395245G';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Phil Evans';
        $user->address = 'Rathfarnham';
        $user->phone = '0856754342';
        $user->email = 'phil@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '14889652354W';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Lana Anderson';
        $user->address = 'Dundrum';
        $user->phone = '0896544322';
        $user->email = 'lana@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 2;
        $patient->policy_number = '145269875632P';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Susan Boyle';
        $user->address = 'Sandyford';
        $user->phone = '0897854564';
        $user->email = 'susan@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 3;
        $patient->policy_number = '175846523289K';
        $patient->user_id = $user->id;
        $patient->save();

        $user = new User();
        $user->name = 'Jeff Warren';
        $user->address = 'Castleknock';
        $user->phone = '0856758732';
        $user->email = 'jeff@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_id = $insurance_company = 1;
        $patient->policy_number = '234653789231Q';
        $patient->user_id = $user->id;
        $patient->save();

        //doctor users
        $user = new User();
        $user->name = 'Dr Elle Lyons';
        $user->address = 'Springfield';
        $user->phone = '0898596675';
        $user->email = 'elle@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = '1999-11-03';
        $doctor->save();

        $user = new User();
        $user->name = 'Dr Patrick Noonan';
        $user->address = 'Old Bawn';
        $user->phone = '0857854963';
        $user->email = 'patrick@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = '2003-01-09';
        $doctor->save();

        $user = new User();
        $user->name = 'Dr Tim Murphy';
        $user->address = 'Foxrock';
        $user->phone = '0876452541';
        $user->email = 'tim@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = '2007-06-19';
        $doctor->save();

        $user = new User();
        $user->name = 'Dr Jessica Davis';
        $user->address = 'Finglas';
        $user->phone = '0857452563';
        $user->email = 'jessica@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->date_started = '2011-09-22';
        $doctor->save();
    }
}
