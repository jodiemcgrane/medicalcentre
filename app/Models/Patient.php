<?php
# @Date:   2020-11-13T16:34:55+00:00
# @Last modified time: 2020-12-19T15:13:52+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function insuranceCompany()
    {
      return $this->belongsTo('App\Models\InsuranceCompany', 'insurance_id');
    }

    public function visits()
    {
      return $this->hasMany('App\Models\Visit', 'patient_id');
    }
}
