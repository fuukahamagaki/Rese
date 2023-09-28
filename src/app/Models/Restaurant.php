<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table ='restaurants';

    protected $fillable = [
        'name',
        'description',
        'photo',
        'genre_id',
        'area_id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'restaurant_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'restaurant_id');
    }
}
