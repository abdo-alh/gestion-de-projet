<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::all();
        return view('admin.projet.index', compact('projets'));
    }

    public function create()
    {
        $employes = User::all();
        return view('admin.projet.create', compact('employes'));
    }

    public function store(Request $request)
    {
        Projet::create($request->all());
        return redirect()->route('projet.index')->with('success', 'Projet created successfully');
    }

    public function edit($reference)
    {
        $projet = Projet::where('reference', $reference)->first();
        $employes = User::all();
        return view('admin.projet.edit')->with([
            'projet' => $projet,
            'employes' => $employes
        ]);
    }

    public function update(Request $request, $reference)
    {
        $projet = Projet::where('reference', $reference)->first();

        $request->validate([
            'reference' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'budget' => 'required',
            'periodeestimeee' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'matriculation' => 'required',
            // Add validation rules for other fields
        ]);

        $reference = $request->input('reference');
        $titre = $request->input('titre');
        $budget = $request->input('budget');
        $periodeestimeee = $request->input('periodeestimeee');
        $datedebut = $request->input('datedebut');
        $datefin = $request->input('datefin');
        $matriculation = $request->input('matriculation');

        $affected = DB::update('UPDATE projets SET reference = ?, titre = ?, budget = ?, periodeestimeee = ?, datedebut = ?, datefin = ?, 
        matriculation = ? WHERE reference = ?', [$reference, $titre, $budget, $periodeestimeee, $datedebut, $datefin, $matriculation, $reference]);

        if ($affected) {
            return redirect()->route('projet.index')->with('success', 'Projet updated successfully');
        } else {
            return redirect()->route('projet.index')->with('error', 'Projet not found or update failed');
        }
    }

    public function destroy($reference)
    {
        $deleted = DB::delete('DELETE FROM projets WHERE reference = ?', [$reference]);

        if ($deleted) {
            return redirect()->route('projet.index')->with('success', 'Projet deleted successfully');
        } else {
            return redirect()->route('projet.index')->with('error', 'Projet not found or deletion failed');
        }
    }
}
