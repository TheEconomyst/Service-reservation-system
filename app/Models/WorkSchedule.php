<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $table = 'work_schedules';

    protected $fillable = [
        'time_from',
        'time_to'
    ];

    public function service_provider() {
        return $this->belongsTo(ServiceProvider::class);
    }
}
