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

    public function formField() {
        return $this->belongsTo(FormFields::class);
    }

    public function reservation() {
        return $this->belongsToMany(Reservations::class);
    }
}
