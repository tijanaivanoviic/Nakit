<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nakit extends Model
{
    use HasFactory;

    protected $fillable = ['vrstaID', 'naziv', 'materijalID', 'cena'];

    protected $table = 'nakit';
}
