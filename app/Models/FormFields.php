<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    use HasFactory;

    protected $table = 'form_fields';

    protected $fillable = [
        'name',
        'field_type',
        'is_mandatory',
        'attached_data_type',
        'reservation_form_id'
    ];

    public function reservationForm() {
        return $this->belongsTo(ReservationForms::class);
    }

    public function formFieldOptions() {
        return $this->hasMany(FieldOptions::class);
    }

    public function formFieldChoices() {
        return $this->hasMany(FieldChoices::class);
    }
}
