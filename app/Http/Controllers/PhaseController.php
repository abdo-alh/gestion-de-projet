<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index()
    {
        $phases = Phase::all();
        return view('phases.index', compact('phases'));
    }

    public function create()
    {
        return view('phases.create');
    }

    public function store(Request $request)
    {
        Phase::create($request->all());
        return redirect()->route('phases.index')->with('success', 'Phase created successfully');
    }

    public function edit($reference)
    {
        $phase = Phase::find($reference);
        return view('phases.edit', compact('phase'));
    }

    public function update(Request $request, $reference)
    {
        $phase = Phase::find($reference);
        $phase->update($request->all());
        return redirect()->route('phases.index')->with('success', 'Phase updated successfully');
    }

    public function destroy($reference)
    {
        Phase::destroy($reference);
        return redirect()->route('phases.index')->with('success', 'Phase deleted successfully');
    }
}
