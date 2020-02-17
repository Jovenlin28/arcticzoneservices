<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class TechInfo extends Model
{
    // Table Name
    protected $table = 'tech_info';

    protected $fillable = ['firstname', 'lastname', 'address', 'contact_number', 'tech_id'];
}
