<?php

namespace App\Http\Controllers;

use App\Models\TvSeries;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TvSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tvSeries = TvSeries::all();
        // return view('tvseries.index', compact('tvSeries'));
        return Inertia::render('TvSeries/Index', [
            'tvSeries' => $tvSeries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('TvSeries/Create', [
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|string',
            'description' => 'nullable|string',
            'ep_count' => 'nullable|integer',
            'watch_url' => 'nullable|string',
            'imdb_url' => 'nullable|string',
        ]);

        TvSeries::create($request->all());

        return redirect()->route('tvseries.index')->with('success', 'TV Series added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TvSeries $tvSeries)
    {
        $tvSeries->delete();
        return back()->with('success', 'TV Series deleted.');
    }
}
