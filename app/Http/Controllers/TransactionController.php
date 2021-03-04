<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * DisplaScheduley a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::all();
        return view('pages.backend.transaction.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedule = Schedule::with(['room', 'movie'])->get();
        $user = User::all();

        return view('pages.backend.transaction.add', compact(['schedule', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPublic($id)
    {
        $schedule = Schedule::with(['room', 'movie'])->where('id', $id)->get()->first();
        return view('pages.frontend.transaction.add', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lunasiPublic($id)
    {
        $transaction = Transaction::findOrFail($id);
        $schedule_id = $transaction->schedule_id;
        $schedule = Schedule::with(['room', 'movie'])->where('id', $schedule_id)->get()->first();
        return view('pages.frontend.transaction.lunasi', compact(['schedule', 'transaction']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lunasi(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'bayar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('transaction.lunasi.public')
            ->with('error', 'Transaction updated failed.');
        }

        $bayarLama = $transaction['bayar'];
        $bayar = 0;
        // if($bayarLama <= (int)$request->bayar){
            $bayar = $transaction['bayar'] + $request->bayar;
        // }

        $status = '';

        if($bayar == $transaction['totalHarga']){
            $status = "paid";
        }else{
            $status = "checkout";
        }

        $transaction->update([
            'bayar' => $bayar,
            'status' => $status,
        ]);

        return redirect()->route('listOrder')
            ->with('success', 'Transaction updated successfully.');
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
            'user' => 'required',
            'schedule' => 'required',
            'jumlahTiket' => 'required',
            'totalHarga' => 'required',
            'bayar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('transaction.add')
            ->with('error', 'Transaction created failed.');
        }
        
        $status = '';

        if($request->bayar >= $request->totalHarga){
            $status = "paid";
        }else{
            $status = "checkout";
        }

        $transaction = Transaction::create(array_merge(
            $validator->validated(),
            [
                'user_id' => $request->user,
                'schedule_id' => $request->schedule,
                'jumlahTiket' => $request->jumlahTiket,
                'totalHarga' => $request->totalHarga,
                'bayar' => $request->bayar,
                'status' => $status,
            ]
        ));

        return redirect()->route('transaction.index')
            ->with('success', 'Transaction created successfully.');
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
        $schedule = Schedule::with(['room', 'movie'])->get();
        $user = User::all();
        $transaction = Transaction::findOrFail($id);
        return view('pages.backend.transaction.edit', compact(['transaction', 'schedule', 'user']));
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
        $transaction = Transaction::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'schedule' => 'required',
            'jumlahTiket' => 'required',
            'totalHarga' => 'required',
            'bayar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('transaction.add')
            ->with('error', 'Transaction updated failed.');
        }
        
        $status = '';

        if($request->bayar >= $request->totalHarga){
            $status = "paid";
        }else{
            $status = "checkout";
        }

        $transaction->update([
            'user_id' => $request->user,
            'schedule_id' => $request->schedule,
            'jumlahTiket' => $request->jumlahTiket,
            'totalHarga' => $request->totalHarga,
            'bayar' => $request->bayar,
            'status' => $status,
        ]);

        return redirect()->route('transaction.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selectTotalPrice(Request $request){
        if($request->ajax()){
    		$jadwal = Schedule::with(['room', 'movie'])->where('id', $request->id_jadwal)->get()->first();
            $totalBiaya = ($jadwal->room->harga + $jadwal->movie->harga);
    		return response()->json(['options'=>$totalBiaya]);
    	}
    }
}
