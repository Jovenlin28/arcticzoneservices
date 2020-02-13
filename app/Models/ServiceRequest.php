<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceRequest extends Model
{
    // Table Name
    protected $table = 'service_requests';

    protected $fillable = [
        'client_id', 'service_type_id', 'location_id', 
        'property_id', 'timeslot_id', 'service_address', 
        'near_landmark', 'special_instruction', 'status',
        'service_date', 'payment_mode_id', 'is_paid'
    ];

    public function appliances() {
        return $this->belongsToMany(Appliance::class, 'service_request_appliances')
        ->withPivot('brand_id', 'unit_id', 'qty');
    }

    public function technicians() {
        return $this->belongsToMany(
            UserTechnician::class, 'service_request_handles', 'service_request_id', 'tech_id'
        );
    }

    public function workdone() {
        return $this->belongsToMany(
            Workdone::class, 'service_request_workdone'
        );
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
