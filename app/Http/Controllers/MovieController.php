<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Movie::all();
        return view('pages.backend.movie.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.backend.movie.add', compact('category'));
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
            'namafilm' => 'required',
            'sinopsis' => 'required',
            'harga' => 'required',
            'category' => 'required',
            'durasi' => 'required',
            'poster' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('movie.add')
            ->with('error', 'Movie created failed.');
        }

        $path = $request->file('poster')->store('public/images/poster');

        $Movie = Movie::create(array_merge(
            $validator->validated(),
            [
                'namafilm' => $request->namafilm,
                'poster' => $path,
                'category_id' => $request->category,
                'sinopsis' => $request->sinopsis,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
            ]
        ));

        return redirect()->route('movie.index')
            ->with('success', 'Movie created successfully.');
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
        $category = Category::all();
        $movie = Movie::findOrFail($id);
        return view('pages.backend.movie.edit', compact(['movie', 'category']));
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
        $movie = Movie::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'namafilm' => 'required',
            'sinopsis' => 'required',
            'harga' => 'required',
            'category' => 'required',
            'durasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('movie.index')
            ->with('error', 'Movie Updated failed.');
        }

        if($request->file('poster') !== null){
            $path = $request->file('poster')->store('public/images/poster');
            $movie->update([
                'namafilm' => $request->namafilm,
                'category_id' => $request->category,
                'poster' => $path,
                'sinopsis' => $request->sinopsis,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
            ]);
        }else{
            $movie->update([
                'namafilm' => $request->namafilm,
                'category_id' => $request->category,
                'sinopsis' => $request->sinopsis,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
            ]);
        }

        return redirect()->route('movie.index')
            ->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();
        return redirect()->route('movie.index')
            ->with('success', 'Movie deleted successfully');
    }
    
}
