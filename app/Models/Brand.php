<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Brand extends Model
{
    // Table Name
    protected $table = 'brands';

    protected $fillable = ['name'];
}
