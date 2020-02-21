<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ClientContactPerson extends Model
{
    // Table Name
    protected $table = 'client_contact_person';

    protected $fillable = [
      'firstname', 'lastname', 'contact_number', 'email',
      'address'
    ];

    public function service_request() {
      return $this->hasOne(ServiceRequest::class, 'client_contact_person_id');
    }
}
