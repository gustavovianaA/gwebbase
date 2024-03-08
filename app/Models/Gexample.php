<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gexample extends Model
{
    use HasFactory;

    protected $fillable = ['title','picture','gallery','uploadimagetime','truefalse','price','details','numberinteger'];
}
