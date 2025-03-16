<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'kode', 'diskon', 'berlaku_hingga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isExpired()
    {
        return \Carbon\Carbon::parse($this->berlaku_hingga)->isPast();
    }
}
