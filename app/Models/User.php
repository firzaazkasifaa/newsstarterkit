<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * Atribut yang bisa diisi secara massal
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * Atribut yang disembunyikan saat serialisasi
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     * Atribut yang harus di-cast ke tipe tertentu
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Check if user is admin
     * Memeriksa apakah user adalah admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is editor
     * Memeriksa apakah user adalah editor
     *
     * @return bool
     */
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }

    /**
     * Check if user is reporter
     * Memeriksa apakah user adalah reporter
     *
     * @return bool
     */
    public function isReporter(): bool
    {
        return $this->role === 'reporter';
    }
}