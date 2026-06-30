<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['school_name', 'latitude', 'longitude', 'radius', 'time_in', 'time_out'];
}
