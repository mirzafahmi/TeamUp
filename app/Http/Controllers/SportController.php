<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        return view('admin.sports.index');
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'nullable',
                'category_id' => 'required'
            ]
        );

        $sport = Sport::create($validate);

        return redirect()->route('admin.sports.index')
            ->with('success', "'{$sport->name}' play level is created successfullly");
    }

    public function show()
    {

    }

    public function edit(Request $request, Sport $sport)
    {
        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $validate = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'nullable',
                'category_id' => 'required'
            ]
        );

        $sport->update($validate);

        return redirect()->route('admin.sports.index')
            ->with('success', "'{$sport->name}' play level is created successfullly");
    }

    public function destroy(Request $request, Sport $sport)
    {
        $name = $sport->name;

        $sport->delete();

        return redirect()->route('admin.sport.index')
            ->with('success', "'{$name}' play level is created successfullly");
    }
}
