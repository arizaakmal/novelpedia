<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class DashboardNovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.novels.index', [
            'novels' => Novel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.novels.create', [
            'authors' => Author::all(),
            'genres' => Genre::all(),
            'novels' => Novel::all(),
            'novel' => new Novel()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'author_id' => 'required|exists:authors,id',
        'published_at' => 'nullable|date',
        'cover' => 'image|file|max:2048',
        'genres' => 'required|array',
        'genres.*' => 'exists:genres,id',
        'slug' => 'string|unique:novels'
    ], [
        'cover.max' => 'The cover may not be greater than 2 megabytes.',
        'slug.unique' => 'The slug has already been taken.'
    ]);

    
    // Process the uploaded cover image
    if ($request->hasFile('cover')) {
        $file = $request->file('cover');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/covers', $filename);
        $validatedData['cover'] = $filename;
    } else {
        $validatedData['cover'] = null;
    }

    // Set the slug for the new novel
    $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['title']);

    // Save the new novel to the database
    $novel = Novel::create($validatedData);
    $novel->genres()->sync($request->input('genres'));

    // Redirect to the index page with a success message
    return redirect()->route('dashboard.novels.index')->with('success', 'The novel has been added.');
}
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function show(Novel $novel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function edit(Novel $novel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Novel $novel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Novel $novel)
    {
        // if ($novel->cover) {
        //     Storage::delete($novel->cover);
        // }
        Novel::destroy($novel->id);

        return redirect()->route('dashboard.novels.index')->with('delete', 'The novel has been deleted.');
    }
}
