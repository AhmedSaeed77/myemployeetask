<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable=['name','employeenumber','employeedate','image'];
    public $timestamps = true;

    // public function attendace()
    // {
    //     return $this->hasMany('App\Models\Attendance', 'employee_id');
    // }

}
