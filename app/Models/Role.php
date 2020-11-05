<?php
# @Date:   2020-11-03T09:16:26+00:00
# @Last modified time: 2020-11-05T16:17:15+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    public function users()
    {
      //role belongs to many users, defining the inverse of a relationship
      //overriding laravels default
      return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
