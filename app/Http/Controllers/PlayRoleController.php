<?php

namespace App\Http\Controllers;

use App\Models\PlayRole;
use Illuminate\Http\Request;

class PlayRoleController extends Controller
{
    public function index()
    {
        $playRoles = PlayRole::all();

        return view('admin.play-roles.index', compact('playRoles'));
    }

    public function create()
    {
        return view('admin.play-roles.edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'sport_id' => 'required',
            'team_size' => 'required'
        ]);

        $playRole = PlayRole::create($validated);

        return redirect()->route('admin.play-roles.index')
            ->with('success', "'{$playRole->name}' play role is created successfullly");
    }

    public function show()
    {

    }

    public function edit(PlayRole $playRole)
    {
        return view('admin.play-roles.edit', compact('playRole'));
    }

    public function update(Request $request, PlayRole $playRole)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'sport_id' => 'required',
            'team_size' => 'required'
        ]);

        $playRole->update($validated);

        return redirect()->route('admin.play-roles.index')
            ->with('success', "'{$playRole->name}' play role is updated successfullly");
    }

    public function destroy(Request $request, PlayRole $playRole)
    {
        $name = $playRole->name;

        $playRole->delete();

        return redirect()->route('admin.play-roles.index')
            ->with('success', "'{$name}' play role is deleted successfullly");
    }
}
