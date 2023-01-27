<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Novel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all novels filter by genre



        $title = 'All Recent Novel';


        if (request('genre')) {
            $genre = Genre::where('slug', request('genre'))->first();
            $title = 'Genre: ' . $genre->name;
            $novels = $genre->novels()->latest()->paginate(10);
        } else {
            $genre = null;
            $novels = Novel::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        }

        return view('index', [
            'title' => $title,
            'active' => 'home',
            'novels' => $novels,
            'genre' => $genre
        ]);


        // $novels = Novel::latest()->paginate(10);
        // return view('index', ['title' => 'Home', 'active' => 'home', 'novels' => $novels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novel = new Novel;
        $novel->title = 'Martial God Asura';
        $novel->slug = 'martial-god-asura';
        $novel->excerpt = 'Martial God Asura is a popular web novel written by the author Kindhearted Bee...';
        $novel->description = 'Martial God Asura is a popular web novel written by the author Kindhearted Bee, covering ACTION, ADVENTURE, COMEDY, FANTASY, MARTIAL ARTS, ROMANCE, XIANXIA genres. It\'s viewed by 1.1M readers with an average rating of 4.9/5 and 1 reviews. The novel is being serialized to 2,000 chapters, new chapters will be published in Webnovel with all rights reserved.';
        $novel->author_id = 1;

        $novel->save();

        $genre = Genre::find([3, 4]);
        $novel->genres()->attach($genre);

        return 'Success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function show(Novel $novel)
    {
        return view('novel', ['title' => 'novel', 'active' => 'novel', 'novel' => $novel]);
        // return view('novel', [
        //     'title' => 'Single Novel',
        //     "active" => 'posts',
        //     'novel' => $novel
        // ]);
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
        //
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $novel = Novel::latest()->filter(request(['cari']))->paginate(10);
        return view('index', ['title' => 'Home', 'active' => 'home', 'novels' => $novel]);
    }
}
