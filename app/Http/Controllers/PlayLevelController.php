<?php

namespace App\Http\Controllers;

use App\Models\PlayLevel;
use Illuminate\Http\Request;

class PlayLevelController extends Controller
{
    public function index()
    {
        $playLevels = PlayLevel::all();

        return view('admin.play-levels.index', compact('playLevels'));
    }

    public function create()
    {
        return view('admin.play-levels.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable'
        ]);

        $playLevel = PlayLevel::create($validate);

        return redirect()->route('admin.play-levels.index')
            ->with('success', "'{$playLevel->name}' play level is created successfullly");
    }

    public function show()
    {

    }

    public function edit(PlayLevel $playLevel)
    {
        return view('admin.play-levels.edit', compact('playLevel'));
    }

    public function update(Request $request, PlayLevel $playLevel)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable'
        ]);

        $playLevel->update($validate);

        return redirect()->route('admin.play-levels.index')
            ->with('success', "'{$playLevel->name}' play level is updated successfullly");
    }

    public function destroy(PlayLevel $playLevel)
    {
        $name = $playLevel->name;

        $playLevel->delete();

        return redirect()->route('admin.play-levels.index')
            ->with('success',"'{$name}' play level is deleted successfullly");
    }
}
