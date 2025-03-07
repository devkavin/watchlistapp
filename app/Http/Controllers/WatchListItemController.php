<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use App\Models\WatchListItem;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class WatchListItemController extends Controller
{
    use AuthorizesRequests;
    public function store(Request $request, WatchList $watchList)
    {
        $this->authorize('update', $watchList);

        $request->validate([
            'item_type' => 'required|in:Movie,TvSeries',
            'item_id' => 'required|integer|exists:' . strtolower($request->item_type) . 's,id',
            'position' => 'nullable|integer',
        ]);

        $watchList->items()->create([
            'item_type' => 'App\Models\\' . $request->item_type,
            'item_id' => $request->item_id,
            'position' => $request->position ?? ($watchList->items()->count() + 1),
        ]);

        return back()->with('success', 'Item added to watchlist.');
    }

    public function destroy(WatchList $watchList, WatchListItem $item)
    {
        $this->authorize('update', $watchList);
        $item->delete();

        return back()->with('success', 'Item removed from watchlist.');
    }

    public function updateOrder(Request $request, WatchList $watchList)
    {
        $this->authorize('update', $watchList);

        foreach ($request->positions as $id => $position) {
            WatchListItem::where('id', $id)->update(['position' => $position]);
        }

        return back()->with('success', 'Watchlist order updated.');
    }
}
