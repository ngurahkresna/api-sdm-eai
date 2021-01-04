<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeBudget extends Model
{
    protected $primaryKey = 'income_budget_id';
    use HasFactory;
}
