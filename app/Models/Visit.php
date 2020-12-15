<?php
# @Date:   2020-11-13T16:41:20+00:00
# @Last modified time: 2020-12-15T20:47:19+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public function doctor()
    {
      return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

    public function patient()
    {
      return $this->belongsTo('App\Models\Patient', 'patient_id');
    }

}
