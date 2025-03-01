<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorpsLivre extends Model
{
    use HasFactory;
    protected $table="corps_livre";
    protected $fillable = ['id','livre_id','corps_id'];

    
}
