<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaRuang',
        'jumlahKursi',
        'harga'
    ];
    
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
