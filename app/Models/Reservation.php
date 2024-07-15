<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'reservations';

    protected $fillable = [
        'uuid', 'user_id', 'resource_id', 'dt_from', 'dt_to', 'hours', 'days', 'weeks',
        'months', 'status', 'ip', 'created', 'modified'
    ];

    protected $dates = ['dt_from', 'dt_to', 'created', 'modified'];

    protected $casts = [
        'status' => 'boolean'
    ];
}
