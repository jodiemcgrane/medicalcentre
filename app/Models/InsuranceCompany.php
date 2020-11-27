<?php
# @Date:   2020-11-18T18:13:42+00:00
# @Last modified time: 2020-11-24T09:52:41+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;

    public function patients()
    {
      return $this->hasMany('App\Models\Patient', 'insurance_id');
    }
}
