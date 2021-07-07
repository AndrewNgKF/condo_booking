<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'block_number', 'unit_number', 'occupant_name', 'occupant_contact'
    ];
}
