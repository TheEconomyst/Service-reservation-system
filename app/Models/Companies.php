<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'company_code'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }
}
