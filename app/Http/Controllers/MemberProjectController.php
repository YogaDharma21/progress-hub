<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class MemberProjectController extends Controller
{
    /**
     * Display a listing of member projects.
     */
    public function index(Request $request)
    {
        $query = Project::with(['features', 'creator', 'members.user']);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(9);

        return view('members.projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        $project->load(['features', 'creator', 'members.user']);

        return view('members.projects.show', compact('project'));
    }
}
