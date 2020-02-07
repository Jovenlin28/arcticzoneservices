<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class UnitType extends Model
{
    // Table Name
    protected $table = 'units';

    protected $fillable = ['name', 'fee'];

    public function get_units($id)
    {
        return DB::select('SELECT * FROM units WHERE id = "'.$id.'"');
    }
}
