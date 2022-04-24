<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationForm extends Model
{
    use HasFactory;

    protected $table = 'reservation_forms';

    protected $fillable = [
        'name'
    ];

    public function formFields() {
        return $this->hasMany(FormField::class);
    }
}
