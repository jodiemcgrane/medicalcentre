<?php
# @Date:   2021-01-02T14:07:20+00:00
# @Last modified time: 2021-01-14T10:51:59+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visit = new Visit();
        $visit->patient_id = $patient = 2;
        $visit->doctor_id = $doctor = 1;
        $visit->date = '2021-01-21';
        $visit->time = '12:30:00';
        $visit->duration = '30 minutes';
        $visit->cost = '49.99';
        $visit->save();

        $visit = new Visit();
        $visit->patient_id = $patient = 1;
        $visit->doctor_id = $doctor = 3;
        $visit->date = '2021-01-18';
        $visit->time = '15:00:00';
        $visit->duration = '45 minutes';
        $visit->cost = '59.99';
        $visit->save();

        $visit = new Visit();
        $visit->patient_id = $patient = 4;
        $visit->doctor_id = $doctor = 1;
        $visit->date = '2021-01-18';
        $visit->time = '11:00:00';
        $visit->duration = '30 minutes';
        $visit->cost = '49.99';
        $visit->save();

        $visit = new Visit();
        $visit->patient_id = $patient = 3;
        $visit->doctor_id = $doctor = 2;
        $visit->date = '2021-02-03';
        $visit->time = '10:45:00';
        $visit->duration = '60 minutes';
        $visit->cost = '79.99';
        $visit->save();

        $visit = new Visit();
        $visit->patient_id = $patient = 5;
        $visit->doctor_id = $doctor = 1;
        $visit->date = '2021-01-23';
        $visit->time = '16:00:00';
        $visit->duration = '30 minutes';
        $visit->cost = '49.99';
        $visit->save();


    }
}
