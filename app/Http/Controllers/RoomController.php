<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('pages.backend.room.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.room.add');
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
            'namaRuang' => 'required',
            'jumlahKursi' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('room.add')
            ->with('error', 'Room created failed.');
        }

        $Room = Room::create(array_merge(
            $validator->validated(),
            [
                'namaRuang' => $request->namaRuang,
                'jumlahKursi' => $request->jumlahKursi,
                'harga' => $request->harga,
            ]
        ));

        return redirect()->route('room.index')
            ->with('success', 'Room created successfully.');
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
        $room = Room::findOrFail($id);
        return view('pages.backend.room.edit', compact('room'));
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
        $room = Room::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'namaRuang' => 'required',
            'jumlahKursi' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('room.add')
            ->with('error', 'Room updated failed.');
        }

        $room->update([
            'namaRuang' => $request->namaRuang,
            'jumlahKursi' => $request->jumlahKursi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('room.index')
            ->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->delete();
        return redirect()->route('room.index')
            ->with('success', 'Room deleted successfully');
    }
}
