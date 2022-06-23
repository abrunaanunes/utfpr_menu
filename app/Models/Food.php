<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id'
    ];

    public function weekdays()
    {
        return $this->belongsToMany(Meal::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
