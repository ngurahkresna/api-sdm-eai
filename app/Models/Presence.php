<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $primaryKey = 'presence_id';
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo('App\Models\DataEmployee', 'employee_id');
    }

    public function payroll()
    {
        return $this->hasOne('App\Models\payroll', 'presence_id');
    }
}
