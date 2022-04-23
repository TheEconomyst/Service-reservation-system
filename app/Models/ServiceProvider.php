<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $table = 'service_providers';

    protected $fillable = [
        'description',
        'is_company_admin',
        'is_active',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function workSchedules() {
        return $this->hasMany(WorkSchedule::class);
    }

    public function providerServices() {
        return $this->hasMany(ProviderServices::class);
    }
}
