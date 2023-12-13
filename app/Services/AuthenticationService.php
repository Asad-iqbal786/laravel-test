<?php  

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationService
{
    public function authenticate($credentials)
    {
        return Auth::attempt($credentials);
    }

    
}
