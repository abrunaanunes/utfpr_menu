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
    
    protected $with = [
        'foods',
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
