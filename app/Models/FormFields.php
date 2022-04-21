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
    ];

    public function reservation_form() {
        return $this->belongsTo(ReservationForms::class);
    }

    public function form_field_options() {
        return $this->hasMany(FieldOptions::class);
    }

    public function form_field_choices() {
        return $this->hasMany(FieldChoices::class);
    }
}
