<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PaymentMode extends Model
{
    // Table Name
    protected $table = 'payment_mode';

    protected $fillable = ['name'];

    public function get_payment_mode($id)
    {
        return DB::select('SELECT * FROM payment_mode WHERE id = "'.$id.'"');
    }
}
