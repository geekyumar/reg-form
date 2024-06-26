<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'dob', 'address'];
}
