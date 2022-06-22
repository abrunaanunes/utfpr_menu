<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday_id',
        'food_id'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }

    public function weekday()
    {
        return $this->hasOne(Weekay::class);
    }
}
