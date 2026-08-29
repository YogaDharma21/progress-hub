<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Project;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'events' => Event::count(),
            'projects' => Project::count(),
            'resources' => Resource::count(),
            'users' => User::count(),
            'participants' => EventParticipant::count(),
            'totalViews' => Resource::sum('views_count'),
        ];

        $recentEvents = Event::withCount('participants')->latest()->take(5)->get();
        $recentProjects = Project::withCount('members')->latest()->take(5)->get();
        $recentResources = Resource::latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();

        $statusCounts = [
            'berlangsung' => Event::where('status', 'berlangsung')->count(),
            'mendatang' => Event::where('status', 'mendatang')->count(),
            'registration' => Event::where('status', 'registration')->count(),
        ];

        return view('admin.index', compact(
            'stats',
            'recentEvents',
            'recentProjects',
            'recentResources',
            'recentUsers',
            'statusCounts',
        ));
    }
}
