<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    use HasFactory;

    public $table = "expense";

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'money',
        'budget',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
