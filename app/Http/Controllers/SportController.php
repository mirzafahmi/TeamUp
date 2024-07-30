<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'nullable',
                'category_id' => 'required',
                'image' => 'nullable|image|max:2048'
            ]
        );

        if(request()->has('image'))
        {
            $imagePath = request()->file('image')->store('profile', 'public');

            $validated['image'] = $imagePath;
        }

        $sport = Sport::create($validated);

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
        $validated = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'nullable',
                'category_id' => 'required',
                'image' => 'nullable|image|max:2048'
            ]
        );

        if(request()->has('image'))
        {
            $imagePath = request()->file('image')->store('sport', 'public');

            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($sport->image ?? '');
        }

        $sport->update($validated);

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
