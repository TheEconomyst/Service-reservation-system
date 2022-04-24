<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'creation_date',
        'price',
        'provider_service_id'
    ];

    public function providerService() {
        return $this->belongsTo(ProviderService::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function fieldChoices() {
        return $this->belongsToMany(FieldChoice::class);
    }

    public function fieldOptions() {
        return $this->belongsTo(FieldOption::class);
    }
}
