<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        return view('commentaires.create');
    }

    public function store(Request $request)
    {
        Commentaire::create($request->all());
        return redirect()->route('commentaires.index')->with('success', 'Commentaire created successfully');
    }

    public function edit($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->update($request->all());
        return redirect()->route('commentaires.index')->with('success', 'Commentaire updated successfully');
    }

    public function destroy($id)
    {
        Commentaire::destroy($id);
        return redirect()->route('commentaires.index')->with('success', 'Commentaire deleted successfully');
    }
}
