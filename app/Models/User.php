<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telepon',
        'alamat',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_accessed_at' => 'datetime',
        ];
    }


    public function getStatusLabelAttribute()
    {
        if ($this->status == 1) {
            return '<span class="badge bg-success">Aktif</span>';
        } else {
            return '<span class="badge bg-danger">Nonaktif</span>';
        }
    }


    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function kupons()
    {
        return $this->hasMany(Kupon::class);
    }

    public function isOnline()
    {
        if ($this->last_accessed_at) {
            $lastAccessed = $this->last_accessed_at instanceof Carbon
                ? $this->last_accessed_at
                : new Carbon($this->last_accessed_at);

            return $lastAccessed->gt(Carbon::now()->subMinutes(5));
        }

        return false;
    }

}
