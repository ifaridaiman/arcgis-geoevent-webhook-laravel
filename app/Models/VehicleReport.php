<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'LicPlate',
        'VehicleType',
        'Speed',
        'ReportedDt',
        'XCoord',
        'YCoord',
        'Wkid',
        'Geometry'
    ];
}
