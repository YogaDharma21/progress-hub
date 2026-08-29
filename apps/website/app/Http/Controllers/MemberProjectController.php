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
        $query = Project::where('approval_status', 'approved')
            ->with(['features', 'creator', 'members.user']);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(9);

        return view('members.projects.index', compact('projects'));
    }

    /**
     * Redirect to the first project detail or back to index.
     */
    public function detail()
    {
        $project = Project::where('approval_status', 'approved')->first();

        return $project ? redirect()->route('members.projects.show', $project) : redirect()->route('members.projects.index');
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
