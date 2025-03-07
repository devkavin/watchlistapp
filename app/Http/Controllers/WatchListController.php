<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Inertia\Inertia;

class WatchListController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watchLists = Auth::user()->watchLists()->with('items')->get();
        return Inertia::render('WatchLists/Index', [
            'watchLists' => $watchLists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('watchlists.create');
        return Inertia::render('WatchLists/Create', [
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
            'type' => 'required|in:Movie,Tv_Series,Other',
        ]);

        $watchList = Auth::user()->watchLists()->create($request->all());

        return redirect()->route('watchlists.show', $watchList)->with('success', 'Watchlist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchList $watchList)
    {
        $this->authorize('view', $watchList);
        return Inertia::render('WatchLists/Show', [
            'watchList' => $watchList
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchList $watchList)
    {
        $this->authorize('update', $watchList);
        // return view('watchlists.edit', compact('watchList'));
        return Inertia::render('WatchLists/Edit', [
            'watchList' => $watchList
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WatchList $watchList)
    {
        $this->authorize('update', $watchList);

        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|string',
        ]);

        $watchList->update($request->all());

        return redirect()->route('watchlists.show', $watchList)->with('success', 'Watchlist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WatchList $watchList)
    {
        $this->authorize('delete', $watchList);
        $watchList->delete();

        return redirect()->route('watchlists.index')->with('success', 'Watchlist deleted.');
    }

    public function share(Request $request, WatchList $watchList)
    {
        $this->authorize('update', $watchList);

        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $watchList->sharedUsers()->attach($user->id);

        return back()->with('success', 'Watchlist shared successfully.');
    }
}
