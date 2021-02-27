<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Schedule::all();
        return view('pages.backend.schedule.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = Movie::all();
        $room = Room::all();
        return view('pages.backend.schedule.add', compact(['movie', 'room']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'movie' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('schedule.add')
            ->with('error', 'Schedule created failed.');
        }

        $room = Room::find($request->room);

        // dd($room->jumlahKursi);

        $schedule = Schedule::create(array_merge(
            $validator->validated(),
            [
                'room_id' => $request->room,
                'movie_id' => $request->movie,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'qty' => $room->jumlahKursi
            ]
        ));

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::all();
        $room = Room::all();
        $schedule = Schedule::findOrFail($id);
        return view('pages.backend.schedule.edit', compact(['schedule', 'room', 'movie']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'movie' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('schedule.add')
            ->with('error', 'Schedule created failed.');
        }

        $schedule->update([
            'room_id' => $request->room,
            'movie_id' => $request->movie,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
        ]);

        return redirect()->route('schedule.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('schedule.index')
            ->with('success', 'Schedule deleted successfully');
    }
}
