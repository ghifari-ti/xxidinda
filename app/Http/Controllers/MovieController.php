<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie.indexmovie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theaters = Theater::all();
        return view('admin.movie.createmovie', compact('theaters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->movie_title = $request->movie_title;
        $movie->genre = $request->genre;
        $banner = $request->file('banner');
        $banner->move(public_path('/image'), $banner->getClientOriginalName());
        $movie->banner = $banner->getClientOriginalName();
        $movie->deskripsi = $request->deskripsi;
        $movie->durasi = $request->durasi;
        $movie->sutradara = $request->sutradara;
        $movie->theater = $request->theater;
        if($request->jadwal)
        {
            $movie->jadwal = implode(',',$request->jadwal);
        } else {
            $movie->jadwal = '';
        }
        $movie->harga = $request->harga;
        $movie->save();
        return redirect()->back()->with(['success' => 'Theater created successfuly.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $theaters = Theater::all();
        return view('admin.movie.editmovie', compact('movie', 'theaters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->movie_title = $request->movie_title;
        $movie->genre = $request->genre;
        if($request->hasFile('banner'))
        {
            $banner = $request->file('banner');
            $banner->move(public_path('/image'), $banner->getClientOriginalName());
            $movie->banner = $banner->getClientOriginalName();
        } else {
            $movie->banner = $movie->banner;
        }
        $movie->deskripsi = $request->deskripsi;
        $movie->durasi = $request->durasi;
        $movie->sutradara = $request->sutradara;
        $movie->theater = $request->theater;
        if($request->jadwal)
        {
            $movie->jadwal = implode(',',$request->jadwal);
        } else {
            $movie->jadwal = '';
        }
        $movie->harga = $request->harga;
        $movie->save();
        return redirect()->back()->with(['success' => 'Theater created successfuly.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
