<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corps extends Model
{
    use HasFactory;
    protected $table="corps";
    protected $fillable = ['nom'];

    
}
