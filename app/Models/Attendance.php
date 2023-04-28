<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable=['employee_id','start','end'];
    public $timestamps = true;

    // public function employee()
    // {
    //     return $this->belongsTo('App\Models\Employee', 'employee_id');
    // }
}
