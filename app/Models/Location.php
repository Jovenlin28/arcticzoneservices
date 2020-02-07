<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    // Table Name
    protected $table = 'locations';

    protected $fillable = ['name'];

    public function get_locations($id)
    {
        return DB::select('SELECT * FROM locations WHERE id = "'.$id.'"');
    }
}
