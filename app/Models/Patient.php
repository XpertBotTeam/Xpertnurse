<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'dob',
        'phone',
    ];


    public function vitals()
    {
        return $this->hasMany(Vital::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
