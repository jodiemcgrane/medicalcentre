<?php
# @Date:   2020-11-03T10:04:57+00:00
# @Last modified time: 2021-01-18T13:34:07+00:00




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

        //patient user
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

        //doctor user
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

        //creating 5 doctor users using Factory
        for($i = 1; $i <= 5; $i++) {
          //calling the factory where the info needing to be filled is declared
          $user = User::factory()->create();
          //attach doctor roles
          $user->roles()->attach($role_doctor);
          //calling the factory where the info needing to be filled is declared
          $doctor = Doctor::factory()->create([
            'user_id' => $user->id,
          ]);
        }

        //creating 5 patient users using Factory
        for($i = 1; $i <= 20; $i++) {
          //calling the factory where the info needing to be filled is declared
          $user = User::factory()->create();
          //attach patient roles
          $user->roles()->attach($role_patient);
          //calling the factory where the info needing to be filled is declared
          $doctor = Patient::factory()->create([
            'user_id' => $user->id,
          ]);
        }


    }
}
