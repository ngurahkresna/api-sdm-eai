<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimReimbursement extends Model
{
    protected $primaryKey = 'claim_id';
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo('App\Models\DataEmployee', 'employee_id');
    }
}
