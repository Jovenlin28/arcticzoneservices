<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceType extends Model
{
    // Table Name
    protected $table = 'service_types';

    protected $fillable = ['name'];

    public function get_service_types($id)
    {
        return DB::select('SELECT * FROM service_types WHERE id = "'.$id.'"');
    }
}
