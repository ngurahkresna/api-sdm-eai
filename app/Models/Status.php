<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'status_id';
    use HasFactory;

    public function employee(){
        return $this->hasMany('App\Models\Employee', 'status_id');
    }
}
