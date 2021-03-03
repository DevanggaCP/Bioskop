<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $category = Category::all()->count();
        $movie = Movie::all()->count();
        $room = Room::all()->count();
        $transaction = Transaction::all()->count();
        return view('pages.backend.dashboard', compact(['category', 'movie', 'room', 'transaction']));
    }

    public function listOrder(){
        $tiketCount = Transaction::where('user_id', Auth::user()->id)->count();
        $tiketById = DB::table('transactions')
                        ->join('schedules', 'transactions.schedule_id', '=', 'schedules.id')
                        ->join('rooms', 'schedules.room_id', '=', 'rooms.id')
                        ->join('movies', 'schedules.movie_id', '=', 'movies.id')
                        ->select('transactions.*', 'schedules.tanggal', 'schedules.waktu', 'rooms.namaRuang', 'movies.namafilm', 'movies.poster', 'movies.sinopsis', 'movies.durasi')
                        ->where('transactions.user_id', '=', Auth::user()->id)
                        ->get();

        return view('pages.frontend.listorder', compact(['tiketCount', 'tiketById']));
    }
}
