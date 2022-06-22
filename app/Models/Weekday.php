<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday_name'
    ];

    public function weekday()
    {
        return $this->hasOne(Weekday::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
