<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectSubmissionController extends Controller
{
    public function create()
    {
        return view('members.submissions.projects.create');
    }

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
            'approval_status' => 'pending',
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

        Submission::create([
            'user_id' => Auth::id(),
            'submittable_type' => Project::class,
            'submittable_id' => $project->id,
            'status' => 'pending',
        ]);

        return redirect()->route('members.dashboard')->with('success', 'Project berhasil dikirim untuk review. Menunggu persetujuan admin.');
    }

    public function edit(Project $project)
    {
        if ($project->created_by !== Auth::id()) {
            abort(403);
        }

        $project->load('features');

        return view('members.submissions.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->created_by !== Auth::id()) {
            abort(403);
        }

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

        $submission = $project->submissions()->latest()->first();
        if ($submission) {
            $submission->update(['status' => 'pending', 'rejection_reason' => null]);
        }

        return redirect()->route('members.dashboard')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->created_by !== Auth::id()) {
            abort(403);
        }

        if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('members.dashboard')->with('success', 'Project berhasil dihapus.');
    }
}
