<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RepairIssue extends Model
{
    // Table Name
    protected $table = 'repair_issues';

    protected $fillable = ['name'];

    public function get_repair_issues($id)
    {
        return DB::select('SELECT * FROM repair_issues WHERE id = "'.$id.'"');
    }
}
