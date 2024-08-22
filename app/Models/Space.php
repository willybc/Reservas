<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'spaces';
    
    /* 
    reservation_length_limit
    Limita la cantidad total de tiempo que un usuario puede reservar un espacio dentro de un periodo de tiempo
    Ejm: usuario puede reservar el espacio varias veces, pero con un limite total de 10 horas 

    reservation_length_limit_unit
    Se utiliza para especificar la unidad de reservation_length_limit como horas

    reservation_lengeth_limit_per
    Se utiliza para especificar el periodo de tiempo durante el cual se aplica este limite como semana o mes

    Resumen: un usuario puede reservar el espacio varias veces, pero con un limite total de 10 horas por semana 
    */

    protected $fillable = [
        'title', 'description',
        'image', 'thumb', 
        'min_reservation_length', 'min_reservation_length_unit', 
        'max_reservation_length', 'max_reservation_length_unit',
        'reservation_length_limit', 'reservation_length_limit_unit', 'reservation_length_limit_per',
        'cancel_before', 'cancel_before_per', 
        'make_reservations_public'
    ];

    /* Dias disponibles para reservar? */

    protected $dates = [];

    protected $casts = [
        'make_reservations_public' => 'boolean'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'spaces_users', 'space_id', 'user_id');
    }

    public function translateUnit($unit) {
        $units = [
            'hours' => 'horas',
            'days' => 'días',
            'weeks' => 'semanas',
            'months' => 'meses',
        ];

        return $units[$unit] ?? $unit;
    }

    public function getMinReservationLengthWithUnit() {
        return $this->min_reservation_length . ' ' . $this->translateUnit($this->min_reservation_length_unit);
    }

    public function getMaxReservationLengthWithUnit() {
        return $this->max_reservation_length . ' ' . $this->translateUnit($this->max_reservation_length_unit);
    }
}
