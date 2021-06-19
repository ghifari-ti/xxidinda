<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(Movie $movie)
    {
        return view('ticket.indexticket', compact('movie'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->kuantitas = $request->kuantitas;
        $ticket->jadwal = $request->jadwal;
        $ticket->tanggal = Carbon::now();
        $ticket->movie_id = $request->movie_id;
        $ticket->theater_id = $request->theater_id;
        $ticket->user_id = Auth::id();
        $ticket->save();
        return redirect('/myTicket')->with(['success' => 'Ticket berhasil dibeli']);
    }

    public function getTicket($id, $time)
    {
        $movie = Movie::find($id);
        $sold = $movie->theater->ticket()->where('jadwal', 'LIKE', '%' . $time . '%')->get();
        $terjual = 0;
        foreach ($sold as $s)
        {
            $terjual += $s->kuantitas;
        }
        $ticket = $movie->theater->capacity - $terjual;
        return response()->json($ticket);
    }

    public function myTicket()
    {
        $ticket = Auth::user()->ticket()->get();
        return view('ticket.myticket', compact('ticket'));
    }
}
