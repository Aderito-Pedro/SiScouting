<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    use HasFactory;

    protected $dates = ['data_fundacao'];

    protected $primaryKey = 'id';
}
