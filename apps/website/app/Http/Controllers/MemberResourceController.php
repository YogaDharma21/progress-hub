<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class MemberResourceController extends Controller
{
    /**
     * Display a listing of member learning resources.
     */
    public function index(Request $request)
    {
        $query = Resource::with(['chapters', 'creator']);

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        $resources = $query->latest()->paginate(9);

        return view('members.resources.index', compact('resources'));
    }

    /**
     * Redirect to the first resource detail or back to index.
     */
    public function detail()
    {
        $resource = Resource::first();

        return $resource ? redirect()->route('members.resources.show', $resource) : redirect()->route('members.resources.index');
    }

    /**
     * Display the specified resource and increment views count.
     */
    public function show(Resource $resource)
    {
        $resource->increment('views_count');
        $resource->load(['chapters', 'creator']);

        return view('members.resources.show', compact('resource'));
    }
}
