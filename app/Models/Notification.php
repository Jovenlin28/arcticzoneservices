<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Notification extends Model
{
    // Table Name
    protected $table = 'notifications';

    protected $fillable = ['data', 'read_at', 'created_at', 'updated_at'];

}
