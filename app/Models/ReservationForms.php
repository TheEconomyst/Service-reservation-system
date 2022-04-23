<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationForms extends Model
{
    use HasFactory;

    $table = 'reservation_forms';

    $fillable = [
        'name'
    ];

    public function formFields() {
        return $this->hasMany('form_fields');
    }
}
