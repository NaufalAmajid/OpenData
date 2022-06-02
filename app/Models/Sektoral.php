<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektoral extends Model
{
    use HasFactory;

    protected $table = 'sektorals';

    protected $guarded = ['id'];
}
