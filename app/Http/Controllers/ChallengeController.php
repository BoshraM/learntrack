<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::with('category')->latest()->paginate(10);
        return view('challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('challenges.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'estimated_minutes' => 'nullable|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        Challenge::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'estimated_minutes' => $request->estimated_minutes,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('challenges.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        return view('challenges.show', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        $categories = Category::orderBy('name')->get();

        return view('challenges.edit', compact('challenge', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'estimated_minutes' => 'nullable|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $challenge->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'estimated_minutes' => $request->estimated_minutes,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('challenges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();

        return redirect()->route('challenges.index');
    }
}
