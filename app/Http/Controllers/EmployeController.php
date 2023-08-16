<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index')->with([
            'users' => $users
        ]);
    }
    public function create()
    {
        return view('admin.createEmploye');
    }
    public function storeEmploye(Request $request)
    {
        $request->validate([
            'matriculation' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'profession' => 'required',
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
            'profession' => $request->profession,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('employe.index')
            ->withSuccess('You have successfully registered & logged in!');
    }
    public function edit($matriculation)
    {
        $user=User::where('matriculation',$matriculation)->first();
        return view('admin.edit')->with([
           'user' => $user
        ]);
    }
    public function update(Request $request, $matriculation)
    {
        //$user=User::where('matriculation',$matriculation)->first();
        $request->validate([
            'matriculation' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'profession' => 'required',
            'cin' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|max:250',
        ]);

        /*$user->update([
            //'matriculation' => $request->matriculation,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'poste' => $request->poste,
            'profession' => $request->profession,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);*/
        
        $matriculation = $request->input('matriculation');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $poste = $request->input('poste');
        $profession = $request->input('profession');
        $cin = $request->input('cin');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $affected = DB::update('UPDATE users SET matriculation = ?, nom = ?, prenom = ?, poste = ?, profession = ?, cin = ?, 
        telephone = ?, email = ? WHERE matriculation = ?', [$matriculation, $nom, $prenom , $poste,$profession,$cin,$telephone,$email,$matriculation]);
        
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('employe.index')
            ->withSuccess('You have successfully registered & logged in!');
    }
    public function destroy()
    {
    }
}
