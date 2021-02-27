<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'namafilm',
        'category_id',
        'poster',
        'sinopsis',
        'harga',
        'durasi',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}
