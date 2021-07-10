<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  use HasFactory;
  protected $fillable = [
    'residential_unit_id', 'visitor_id'
  ];

  public function visitor()
  {
    return $this->belongsTo(Visitor::class);
  }
}
