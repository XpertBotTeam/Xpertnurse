<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'temperature',
        'pressure',
        'oxygene',
        'glucose',
        'heartbeat',
        'patient_id',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
