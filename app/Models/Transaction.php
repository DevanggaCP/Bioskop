<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'jumlahTiket',
        'totalHarga',
        'bayar',
        'status'
    ];

    public function schedule()
    {
    	return $this->belongsTo(Schedule::class);
    }
}
