<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class BankDetails extends Model
{
    // Table Name
    protected $table = 'bank_details';

    protected $fillable = ['name', 'number'];

    public function get_bank_details($id)
    {
        return DB::select('SELECT * FROM bank_details WHERE id = "'.$id.'"');
    }
}
