<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOptions extends Model
{
    use HasFactory;

    protected $table = 'field_options';

    protected $fillable = [
        'text_option',
        'integer_option'
    ];

    public function form_field() {
        return $this->belongsTo(FormFields::class);
    }

    public function reservation() {
        return $this->belongsTo(Reservations::class);
    }
}
