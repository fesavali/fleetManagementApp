<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected  $fillable = ['vehicle_registration_number','client_details',
        'vehicle_make','vehicle_model','chassis_number','engine_number','color','other_interest'];

}
