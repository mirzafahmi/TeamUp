<?php

namespace App\Http\Controllers;

use App\Models\PlayMode;
use Illuminate\Http\Request;

class PlayModeController extends Controller
{
    public function index()
    {
        $playModes = PlayMode::all();

        return view('admin.play-modes.index', compact('playModes'));
    }

    public function create(Request $request)
    {
        return view('admin.play-modes.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'sport_id' => 'required',
            'team_size' => 'required'
        ]);

        $playMode = PlayMode::create($validate);

        return redirect()->route('admin.play-modes.index')
            ->with('success', "'{$playMode->name}' play level is created successfullly");
    }

    public function show()
    {

    }

    public function edit(Request $request, PlayMode $playMode)
    {
        return view('admin.play-modes.edit', compact('playMode'));
    }

    public function update(Request $request, PlayMode $playMode)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'sport_id' => 'required',
            'team_size' => 'required'
        ]);

        $playMode->update($validate);

        return redirect()->route('admin.play-modes.index')
            ->with('success', "'{$playMode->name}' play level is updated successfullly");
    }

    public function destroy(Request $request, PlayMode $playMode)
    {
        $name = $playMode->name;

        $playMode->delete();

        return redirect()->route('admin.play-modes.index')
            ->with('success', "'{$name}' play level is deleted successfullly");
    }
}
