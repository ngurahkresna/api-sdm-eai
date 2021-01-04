<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEmployee extends Model
{
    protected $primaryKey = 'employee_id';
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division', 'division_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function presence()
    {
        return $this->hasOne('App\Models\Presence', 'presence_id');
    }

    public function payroll()
    {
        return $this->hasOne('App\Models\Payroll', 'payroll_id');
    }

    public function claim()
    {
        return $this->hasMany('App\Models\Payroll', 'claim_id');
    }
}
