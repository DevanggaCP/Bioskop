<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'movie_id',
        'tanggal',
        'waktu',
        'qty'
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function movie()
    {
    	return $this->belongsTo(Movie::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
