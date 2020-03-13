<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Faker\Provider\ar_SA\Payment;

class ServiceRequest extends Model
{
    // Table Name
    protected $table = 'service_requests';

    protected $fillable = [
        'client_id', 'location_id', 
        'property_id', 'timeslot_id', 'client_contact_person_id', 
        'service_address', 'near_landmark', 'special_instruction', 'status',
        'service_date', 'payment_mode_id', 'is_paid'
    ];

    public function remarks() {
      return $this->hasMany(Remarks::class, 'service_request_id');
    }

    public function appliances() {
      return $this->belongsToMany(Appliance::class, 'service_request_appliances')
      ->withPivot('brand_id', 'unit_id', 'qty', 'service_type_id', 'trouble_id');
    }

    public function troubles() {
      return $this->belongsToMany(
        RepairIssue::class, 'service_request_troubles', 'service_request_id', 'trouble_id'
      );
    }

    public function technicians() {
      return $this->belongsToMany(
          UserTechnician::class, 'service_request_handles', 'service_request_id', 'tech_id'
      );
    }

    public function client_contact_person() {
      return $this->belongsTo(ClientContactPerson::class, 'client_contact_person_id');
    }

    public function user() {
      return $this->hasOne(User::class, 'client_id');
    }

    public function workdone() {
        return $this->belongsToMany(
            Workdone::class, 'service_request_workdone'
        )->withPivot('technician_id');
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function payment_mode() {
        return $this->belongsTo(PaymentMode::class, 'payment_mode_id');
    }

    public function service_type() {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function client() {
        return $this->belongsTo(UserClient::class, 'client_id');
    }

    public function property() {
        return $this->belongsTo(PropertyType::class, 'property_id');
    }

    public function timeslot() {
        return $this->belongsTo(ServiceTimeslot::class, 'timeslot_id');
    }

    public function get_service_types($id)
    {
        return DB::select('SELECT * FROM service_types WHERE id = "'.$id.'"');
    }
}
