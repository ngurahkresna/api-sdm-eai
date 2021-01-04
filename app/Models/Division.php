<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    protected $primaryKey = 'division_id';
    use HasFactory;

    public function employee(){
        return $this->hasMany('App\Models\Employee', 'division_id');
    }
}
