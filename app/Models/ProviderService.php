<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    use HasFactory;

    protected $table = 'provider_services';

    protected $fillable = [
        'duration',
        'price',
        'service_id',
        'service_provider_id'
    ];

    public function serviceProvider() {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
