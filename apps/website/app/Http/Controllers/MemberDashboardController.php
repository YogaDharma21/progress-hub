<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Resource;
use Illuminate\Http\Request;

class MemberDashboardController extends Controller
{
    /**
     * Display member dashboard.
     */
    public function index()
    {
        $eventsCount = Event::count();
        $projectsCount = Project::count();
        $resourcesCount = Resource::count();

        $events = Event::with(['topics', 'participants.user'])
            ->withCount('participants')
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::with(['features', 'creator', 'members.user'])
            ->latest()
            ->take(6)
            ->get();

        $resources = Resource::with('chapters')
            ->latest()
            ->take(6)
            ->get();

        return view('members.dashboard', compact(
            'eventsCount',
            'projectsCount',
            'resourcesCount',
            'events',
            'projects',
            'resources'
        ));
    }
}
