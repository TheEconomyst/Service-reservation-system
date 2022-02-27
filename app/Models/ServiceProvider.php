<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $table = 'serviceProvider';
    protected $fillable = ['name', 'last_name', 'description', 'role'];
    protected $primary = 'id';
    public $timestamps = false;
    use HasFactory;
}
