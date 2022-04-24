<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
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
        return $this->belongsTo(ReservationForm::class);
    }

    public function fieldOptions() {
        return $this->hasMany(FieldOption::class);
    }

    public function fieldChoices() {
        return $this->hasMany(FieldChoice::class);
    }
}
