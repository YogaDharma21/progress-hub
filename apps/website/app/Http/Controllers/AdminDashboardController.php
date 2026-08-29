<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
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
            'pending_submissions' => Submission::where('status', 'pending')->count(),
        ];

        // Activity per day for last 7 days
        $dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        $days = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $days->push([
                'label' => $dayNames[$date->dayOfWeek],
                'events' => Event::whereDate('created_at', $date)->count(),
                'projects' => Project::whereDate('created_at', $date)->count(),
                'resources' => Resource::whereDate('created_at', $date)->count(),
            ]);
        }
        $maxActivity = max($days->pluck('events')->merge($days->pluck('projects'))->merge($days->pluck('resources'))->max(), 1);

        // Recent activity (latest 8 items across all types)
        $recentEvents = Event::latest()->take(4)->get()->map(fn ($e) => [
            'type' => 'event',
            'title' => $e->title,
            'subtitle' => $e->status ?? '—',
            'created_at' => $e->created_at,
            'route' => route('admin.events.index'),
        ]);

        $recentProjects = Project::latest()->take(4)->get()->map(fn ($p) => [
            'type' => 'project',
            'title' => $p->title,
            'subtitle' => $p->category ?? '—',
            'created_at' => $p->created_at,
            'route' => route('admin.projects.index'),
        ]);

        $recentResources = Resource::latest()->take(4)->get()->map(fn ($r) => [
            'type' => 'resource',
            'title' => $r->title,
            'subtitle' => $r->type ?? '—',
            'created_at' => $r->created_at,
            'route' => route('admin.resources.index'),
        ]);

        $recentActivity = $recentEvents->merge($recentProjects)->merge($recentResources)
            ->sortByDesc('created_at')
            ->take(8)
            ->values();

        return view('admin.index', compact(
            'stats',
            'days',
            'maxActivity',
            'recentActivity',
        ));
    }
}
