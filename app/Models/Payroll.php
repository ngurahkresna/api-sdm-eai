<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    protected $primaryKey = 'payroll_id';
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo('App\Models\DataEmployee', 'employee_id');
    }

    public function presence()
    {
        return $this->belongsTo('App\Models\Presence', 'presence_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
