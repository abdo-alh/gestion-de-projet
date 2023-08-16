<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        return view('projets.create');
    }

    public function store(Request $request)
    {
        Projet::create($request->all());
        return redirect()->route('projets.index')->with('success', 'Projet created successfully');
    }

    public function edit($reference)
    {
        $projet = Projet::find($reference);
        return view('projets.edit', compact('projet'));
    }

    public function update(Request $request, $reference)
    {
        $projet = Projet::find($reference);
        $projet->update($request->all());
        return redirect()->route('projets.index')->with('success', 'Projet updated successfully');
    }

    public function destroy($reference)
    {
        Projet::destroy($reference);
        return redirect()->route('projets.index')->with('success', 'Projet deleted successfully');
    }
}
