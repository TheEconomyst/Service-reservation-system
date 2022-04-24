<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        "name",
        "is_active",
        "description",
        "company_id"
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function provider_services() {
        return $this->belongsTo(ProviderService::class);
    }

    public function reservations() {
        return $this->belongsTo(Reservation::class);
    }
}
