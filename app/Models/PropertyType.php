<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PropertyType extends Model
{
    // Table Name
    protected $table = 'property_types';

    protected $fillable = ['name'];

    public function get_property_types($id)
    {
        return DB::select('SELECT * FROM property_types WHERE id = "'.$id.'"');
    }
}
