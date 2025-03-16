<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice', 'paket', 'hari', 'tanggal', 'kilogram', 'harga', 'status', 'user_id', 'dp', 'sisa'
    ];

    /**
     * Get the user that owns the transaksi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket', 'nama_paket');
    }

    public function getLamaPengerjaanAttribute()
    {
        return $this->paket->lama_pengerjaan;
    }

    public function getStatusLabelAttribute()
    {
        return $this->generateStatusLabel($this->status);
    }

    public function getStatusNonLabelAttribute()
    {
        return $this->generateStatusText($this->status);
    }

    protected function generateStatusLabel($status)
    {
        $badgeClass = 'badge bg-primary text-bold rounded-pill';

        switch ($status) {
            case 0:
                $badgeClass = 'badge bg-primary text-bold rounded-pill';
                break;
            case 1:
                $badgeClass = 'badge bg-info text-bold rounded-pill';
                break;
            case 2:
                $badgeClass = 'badge bg-warning text-bold rounded-pill';
                break;
            case 3:
                $badgeClass = 'badge bg-success text-bold rounded-pill';
                break;
            case 4:
                $badgeClass = 'badge bg-secondary text-bold rounded-pill';
                break;
            default:
                $badgeClass = 'badge bg-secondary text-bold rounded-pill';
                break;
        }

        $badgeStyle = 'style="width: 100px"';

        return '<span class="' . $badgeClass . '" ' . $badgeStyle . '>' . $status . '</span>';
    }



    protected function generateStatusText($status)
    {
        switch ($status) {
            case 0:
                return 'Baru';
            case 1:
                return 'di Terima';
            case 2:
                return 'di Proses';
            case 3:
                return 'selesai';
            case 4:
                return 'di Ambil';
            default:
                return 'Unrecognized Status';
        }
    }

}
