<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $fillable = ['title', 'description', 'duration', 'price', 'is_active'];
    protected $primary = 'id';
    public $timestamps = false;
    use HasFactory;
}
