<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public $fillable = [
        'monthly_income',
        'daily_income',
        'fixed_expenses',
        'variable_expenses',
        'non_necessities_expenses',
        'saving_plan_percentage',
        'balance'
    ];

}
