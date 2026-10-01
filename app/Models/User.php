<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'passwordHash',
        'registeredAt',
    ];

    protected $hidden = [
        'passwordHash',
        'remember_token',
    ];

    protected $casts = [
        'registeredAt' => 'datetime',
        'lastLogin'    => 'datetime',
    ];

    // 🔑 CRUCIAL : Laravel utilise cette méthode pour comparer le mot de passe
    public function getAuthPassword(): string
    {
        return $this->passwordHash;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'authorId');
    }
    // Désactive le remember token
public function getRememberTokenName()
{
    return null;
}
}