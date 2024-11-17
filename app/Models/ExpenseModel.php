<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'money',
    ];
}
