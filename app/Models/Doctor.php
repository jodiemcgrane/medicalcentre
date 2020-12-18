<?php
# @Date:   2020-11-11T14:56:18+00:00
# @Last modified time: 2020-12-18T13:49:55+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function visits()
    {
      return $this->hasMany('App\Models\Visit', 'doctor_id');
    }
}
