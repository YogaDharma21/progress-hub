<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::with('features')->latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'demo_url' => 'nullable|url|max:255',
            'repository_url' => 'nullable|url|max:255',
            'documentation_url' => 'nullable|url|max:255',
            'features' => 'nullable|array',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'technologies' => $validated['technologies'] ?? null,
            'image_path' => $imagePath,
            'demo_url' => $validated['demo_url'] ?? null,
            'repository_url' => $validated['repository_url'] ?? null,
            'documentation_url' => $validated['documentation_url'] ?? null,
            'created_by' => Auth::id(),
        ]);

        if (!empty($request->features)) {
            foreach ($request->features as $featureData) {
                if (!empty($featureData['title'])) {
                    ProjectFeature::create([
                        'project_id' => $project->id,
                        'title' => $featureData['title'],
                        'description' => $featureData['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        $project->load('features');

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'demo_url' => 'nullable|url|max:255',
            'repository_url' => 'nullable|url|max:255',
            'documentation_url' => 'nullable|url|max:255',
            'features' => 'nullable|array',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.description' => 'nullable|string',
        ]);

        $imagePath = $project->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'technologies' => $validated['technologies'] ?? null,
            'image_path' => $imagePath,
            'demo_url' => $validated['demo_url'] ?? null,
            'repository_url' => $validated['repository_url'] ?? null,
            'documentation_url' => $validated['documentation_url'] ?? null,
        ]);

        $project->features()->delete();

        if (!empty($request->features)) {
            foreach ($request->features as $featureData) {
                if (!empty($featureData['title'])) {
                    ProjectFeature::create([
                        'project_id' => $project->id,
                        'title' => $featureData['title'],
                        'description' => $featureData['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
