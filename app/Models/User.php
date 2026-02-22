<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    //INI UNTUK FITUR LOGIN
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    //INI ABAIKAN SAJA
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    //INI ABAIKAN SAJA
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //INI UNTUK RELASI SETIAP AKUN MEMILIKI BANYAK ASPIRASI
    public function aspirasi() {
    return $this->hasMany(Aspirasi::class);
    }

    //INI UNTUK RELASI SETIP ADMIN PUNYA BANYAK FEEDBACK KE SISWA
    public function feedback() {
    return $this->hasMany(Feedback::class, 'admin_id');
    }

}
