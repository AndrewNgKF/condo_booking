<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_name', 'NRICLast3Digits', 'visitor_contact', 'occupant_contact'
    ];

    public function visits()
    {
        // dd($this->hasMany(Visit::class));
        return $this->hasMany(Visit::class);
    }
}
