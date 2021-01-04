<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    use HasFactory;

    public function employee(){
        return $this->hasMany('App\Models\Employee', 'category_id');
    }

    public function payroll(){
        return $this->hasMany('App\Models\Payroll', 'category_id');
    }
}
