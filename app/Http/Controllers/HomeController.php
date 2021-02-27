<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Schedule;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    

    // admin panel

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

    public function movie()
    {
        $movie = Movie::all();
        $movieCount = Movie::all()->count();
        return view('pages.frontend.movie', compact(['movie', 'movieCount']));
    }

    public function nonton()
    {
        $schedule = Schedule::with(['room', 'movie'])->get();
        return view('pages.frontend.schedule', compact('schedule'));
    }
}
