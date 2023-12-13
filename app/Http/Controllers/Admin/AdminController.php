<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\AuthenticationService;



class AdminController extends Controller
{
    protected $authenticationService;

    public function __construct( AuthenticationService $authenticationService,) {
        $this->authenticationService = $authenticationService;
    }

    public function index(){
        $getUsers = User::get()->toArray();
        $getProducts= Product::with('users')->get()->toArray();
        return view('admin.index')
        ->with('getProducts',$getProducts)
        ->with('getUsers',$getUsers);
    }
    public function allSellers(){
        $getSellser = User::where('role','seller')->get()->toArray();
        return view('admin.all_seller')->with('getSellser',$getSellser);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->authenticationService->authenticate($credentials)) {

            $checkRole = User::where('email',$credentials['email'])->first();
            if ($checkRole->role == 'admin') {
                return redirect()->intended('/admin-dashboard');
            } elseif($checkRole->role == 'seller') {
                return redirect()->intended('/seller-dashboard');
            }else{
                return redirect()->intended('/dashboard');
            }

        } else {
            Session::flash('error_message', 'Plese enter Correct email and user name');

            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
