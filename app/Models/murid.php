<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class murid extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'grade_id'
    ];
}
