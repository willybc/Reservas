<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'spaces';

    protected $fillable = [
        'title', 'description',
        'image', 'thumb', 'min_reservation_length', 'min_reservation_length_unit', 'max_reservation_length',
        'max_reservation_length_unit', 'reservation_length_limit', 'reservation_length_limit_unit',
        'reservation_length_limit_per', 'cancel_before', 'cancel_before_per', 'make_reservations_public'
    ];

    protected $dates = [];

    protected $casts = [
        'make_reservations_public' => 'boolean'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'spaces_users', 'space_id', 'user_id');
    }
}
