<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderServices extends Model
{
    use HasFactory;

    protected $table = 'provider_services';

    protected $fillable = [
        'duration',
        'price',
    ];

    public function service_provider() {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
