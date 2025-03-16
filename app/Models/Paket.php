<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = ['nama_paket', 'harga', 'deskripsi', 'status', 'lama_pengerjaan'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 1) {
            return '<span class="badge bg-success">Aktif</span>';
        } else {
            return '<span class="badge bg-danger">Nonaktif</span>';
        }
    }

}
