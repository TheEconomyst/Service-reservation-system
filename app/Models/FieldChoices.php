<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldChoices extends Model
{
    use HasFactory;

    protected $table = 'field_choices';

    protected $fillable = [
        'choice',
    ];

    public function form_field() {
        return $this->belongsTo(FormFields::class);
    }

    public function reservation() {
        return $this->belongsTo(Reservations::class);
    }
}
