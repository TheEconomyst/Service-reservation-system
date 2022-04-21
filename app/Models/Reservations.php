<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'creation_date',
        'price'
    ];

    public function provider_service() {
        return $this->belongsTo(ProviderServices::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    /* TODO */
}
