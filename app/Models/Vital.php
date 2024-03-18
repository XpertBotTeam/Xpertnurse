<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'temperature',
        'blood_pressure',
        'oxygene',
        'heartbeats',
        'patient_id',
        'user_id'
    ];



    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }


}
