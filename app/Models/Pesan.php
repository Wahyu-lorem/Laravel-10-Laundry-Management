<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaksi_id',
        'pesan',
        'rating',
        'saran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
