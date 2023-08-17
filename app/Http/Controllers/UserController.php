<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Phase;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'matriculation' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'role' => 'required',
            'cin' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required'
        ]);

        User::create([
            'matriculation' => $request->matriculation,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'poste' => $request->poste,
            'role' => $request->role,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('login')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $projets = Projet::all();
        $phases = Phase::all();
        $commentaires = Commentaire::all();
        $employeCount = User::count();
        $projetCount = Projet::count();
        $commentaireCount = Commentaire::count();
        // if (Auth::check()) {
        return view('admin.dashboard')->with([
            'projets'  =>  $projets,
            'phases'  =>  $phases,
            'commentaires'  =>  $commentaires,
            'employeCount' => $employeCount,
            'projetCount' => $projetCount,
            'commentaireCount' => $commentaireCount
        ]);
        //  }

        /*  return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');*/
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}
