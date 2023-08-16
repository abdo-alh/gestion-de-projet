<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('admin.commentaire.index', compact('commentaires'));
    }

    public function create()
    {
        $employes = User::all();
        return view('admin.commentaire.create')->with([
            'employes' => $employes
        ]);
    }

    public function store(Request $request)
    {
        Commentaire::create($request->all());
        return redirect()->route('commentaire.index')->with('success', 'Commentaire created successfully');
    }

    public function edit($id)
    {
        $commentaire = Commentaire::find($id);
        $employes = User::all();
        return view('admin.commentaire.edit', compact('commentaire','employes'));
    }

    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->update($request->all());
        return redirect()->route('commentaire.index')->with('success', 'Commentaire updated successfully');
    }

    public function destroy($id)
    {
        Commentaire::destroy($id);
        return redirect()->route('commentaire.index')->with('success', 'Commentaire deleted successfully');
    }
}
