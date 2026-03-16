<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;

class MonsterController extends Controller
{
    /**
     * Home page: random monster + latest monsters.
     */
    public function home()
    {
        $randomMonster = Monster::inRandomOrder()->first();
        $latestMonsters = Monster::orderByDesc('created_at')->take(9)->get();

        return view('home', compact('randomMonster', 'latestMonsters'));
    }

    /**
     * List page: 9 latest monsters.
     */
    public function index()
    {
        $monsters = Monster::orderByDesc('created_at')->take(9)->get();

        return view('monsters.index', compact('monsters'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('monsters.create');
    }

    /**
     * Store new monster.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'pv' => ['required', 'integer', 'min:0'],
            'attack' => ['required', 'integer', 'min:0'],
            'defense' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $monster = Monster::create($validated);

        return redirect()
            ->route('monsters.show', $monster)
            ->with('success', 'Monster created successfully.');
    }

    /**
     * Show one monster.
     */
    public function show(Monster $monster)
    {
        return view('monsters.show', compact('monster'));
    }

    /**
     * Show edit form.
     */
    public function edit(Monster $monster)
    {
        return view('monsters.edit', compact('monster'));
    }

    /**
     * Update monster.
     */
    public function update(Request $request, Monster $monster)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'pv' => ['required', 'integer', 'min:0'],
            'attack' => ['required', 'integer', 'min:0'],
            'defense' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $monster->update($validated);

        return redirect()
            ->route('monsters.show', $monster)
            ->with('success', 'Monster updated successfully.');
    }

    /**
     * Delete monster.
     */
    public function destroy(Monster $monster)
    {
        $monster->delete();

        return redirect()
            ->route('monsters.index')
            ->with('success', 'Monster deleted successfully.');
    }
}
