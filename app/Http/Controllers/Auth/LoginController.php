<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        // Modify this condition based on your user_type field name and value
        if ($this->guard()->attempt(
            $this->credentials($request) + ['user_type' => 'Normal'],
            $request->filled('remember')
        )) {
            return true;
        }
        return false;
    }
}
