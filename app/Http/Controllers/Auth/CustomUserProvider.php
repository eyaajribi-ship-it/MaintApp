<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUserProvider extends EloquentUserProvider
{
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        // On compare le mot de passe saisi avec passwordHash en BD
        return \Hash::check($credentials['password'], $user->getAuthPassword());
    }
}