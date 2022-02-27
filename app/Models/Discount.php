<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $fillable = ['percentage', 'starts_at', 'expires_at'];
    protected $primary = 'id';
    public $timestamps = false;
    use HasFactory;
}
