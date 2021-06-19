<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theaters = Theater::all();
        return view('admin.theater.indextheater', compact('theaters'));
    }

    public function getTime($id)
    {
        $theater = Theater::find($id);
        if($theater)
        {
            $schedule = explode(',', $theater->jadwal);
            if($schedule)
            {
                $times = array();
                foreach ($schedule as $sch) {
                    if(count(Movie::where('theater_id', $id)->where('jadwal', 'like', '%'.$sch.'%')->get()) == 0)
                    {
                        array_push($times, $sch);
                    }
                }
                return response()->json(json_encode($times), 200);
            }
        }
        return response()->json('null', 404);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.theater.createtheater');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $th = new Theater;
        $th->number = count(Theater::all())+1;
        $th->name = $request->name;
        $th->capacity = $request->capacity;
        $th->type = $request->type;
        $th->jadwal = $request->schedule;
        $th->save();
        return redirect()->back()->with(['success' => 'Theater created successfuly.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function show(Theater $theater)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function edit(Theater $theater)
    {
        return view('admin.theater.edittheater', compact('theater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theater $theater)
    {
        $theater->name = $request->name;
        $theater->capacity = $request->capacity;
        $theater->type = $request->type;
        $theater->jadwal = $request->schedule;
        $theater->save();
        return redirect()->back()->with(['success' => 'Theater updated successfuly.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect('/theater');
    }
}
