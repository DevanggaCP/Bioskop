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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movie = Movie::with('category')->limit(4)->get();
        $movieAll = Movie::all();

        return view('home', compact(['movie', 'movieAll']));
    }

    public function movie()
    {
        $movie = Movie::all();
        $movieCount = Movie::all()->count();
        return view('pages.frontend.movie', compact(['movie', 'movieCount']));
    }

    public function movieById($id)
    {
        $movie = Movie::findOrFail($id);
        return view('pages.frontend.detailMovie', compact('movie'));
    }

    public function nonton()
    {
        $schedule = Schedule::with(['room', 'movie'])->get();
        $scheduleCount = Schedule::all()->count();
        return view('pages.frontend.schedule', compact(['schedule', 'scheduleCount']));
    }
}
