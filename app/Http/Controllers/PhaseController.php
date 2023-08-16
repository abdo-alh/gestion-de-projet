<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index()
    {
        $phases = Phase::all();
        return view('admin.phase.index', compact('phases'));
    }

    public function create()
    {
        $employes = User::all();
        $projets = Projet::all();
        return view('admin.phase.create', compact('employes','projets'));
    }

    public function store(Request $request)
    {
        Phase::create($request->all());
        return redirect()->route('phase.index')->with('success', 'Phase created successfully');
    }

    public function edit($reference)
    {
        $phase = Phase::find($reference);
        $employes = User::all();
        $projets = Projet::all();
        return view('admin.phase.edit', compact('phase','employes','projets'));
    }

    public function update(Request $request, $reference)
    {
        $phase = Phase::find($reference);
        $phase->update($request->all());
        return redirect()->route('phase.index')->with('success', 'Phase updated successfully');
    }

    public function destroy($reference)
    {
        Phase::destroy($reference);
        return redirect()->route('phase.index')->with('success', 'Phase deleted successfully');
    }
}
