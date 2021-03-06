<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model
{
    use HasFactory;

    protected $table = 'field_options';

    protected $fillable = [
        'text_option',
        'integer_option',
        'reservation_id',
        'form_field_id'
    ];

    public function formField() {
        return $this->belongsTo(FormField::class);
    }

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
}
