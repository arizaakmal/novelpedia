<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class DashboardAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.authors.index', [
            'authors' => Author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.authors.create', [
            'authors' => Author::all(),
            'author' => new Author()
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
        'name' => 'required|string|max:255',
        'slug' => 'string|unique:authors'
    ], [
        'slug.unique' => 'The slug has already been taken.'
    ]);

    // Set the slug for the new novel
    $validatedData['slug'] = $validatedData['slug'] ?? Str::slug($validatedData['name']);

    // Save the new novel to the database
    $author = Author::create($validatedData);

    // Redirect to the index page with a success message
    return redirect()->route('dashboard.authors.index')->with('success', 'The author has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        Author::destroy($author->id);

        return redirect()->route('dashboard.authors.index')->with('delete', 'The author has been deleted.');
    }
}
