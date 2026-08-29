<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberDashboardController extends Controller
{
    /**
     * Display member dashboard.
     */
    public function index()
    {
        $eventsCount = Event::where('approval_status', 'approved')->count();
        $projectsCount = Project::where('approval_status', 'approved')->count();
        $resourcesCount = Resource::where('approval_status', 'approved')->count();

        $events = Event::where('approval_status', 'approved')
            ->with(['topics', 'participants.user'])
            ->withCount('participants')
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::where('approval_status', 'approved')
            ->with(['features', 'creator', 'members.user'])
            ->latest()
            ->take(6)
            ->get();

        $resources = Resource::where('approval_status', 'approved')
            ->with('chapters')
            ->latest()
            ->take(6)
            ->get();

        $mySubmissions = Submission::where('user_id', Auth::id())
            ->with('submittable')
            ->latest()
            ->get();

        return view('members.dashboard', compact(
            'eventsCount',
            'projectsCount',
            'resourcesCount',
            'events',
            'projects',
            'resources',
            'mySubmissions'
        ));
    }
}
