<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\ResourceChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        $resources = Resource::with('chapters')->latest()->paginate(10);

        return view('admin.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'source_type' => 'nullable|string|in:file,video',
            'file' => 'nullable|file|mimes:pdf,doc,docx,epub,zip|max:10240',
            'video_url' => 'nullable|url|max:255',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'chapters' => 'nullable|array',
            'chapters.*.title' => 'nullable|string|max:255',
            'chapters.*.description' => 'nullable|string',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('resources/covers', 'public');
        }

        $filePath = null;
        if ($request->source_type === 'video') {
            $filePath = $request->video_url;
        } elseif ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resources/files', 'public');
        }

        $resource = Resource::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'] ?? null,
            'tags' => $validated['tags'] ?? null,
            'file_path' => $filePath,
            'cover_image' => $coverPath,
            'created_by' => Auth::id(),
        ]);

        if (!empty($request->chapters)) {
            $chapterNum = 1;
            foreach ($request->chapters as $chapterData) {
                if (!empty($chapterData['title'])) {
                    ResourceChapter::create([
                        'resource_id' => $resource->id,
                        'chapter_number' => $chapterNum++,
                        'title' => $chapterData['title'],
                        'description' => $chapterData['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $resource->load('chapters');

        return view('admin.resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'source_type' => 'nullable|string|in:file,video',
            'file' => 'nullable|file|mimes:pdf,doc,docx,epub,zip|max:10240',
            'video_url' => 'nullable|url|max:255',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'chapters' => 'nullable|array',
            'chapters.*.title' => 'nullable|string|max:255',
            'chapters.*.description' => 'nullable|string',
        ]);

        $coverPath = $resource->cover_image;
        if ($request->hasFile('cover')) {
            if ($coverPath && Storage::disk('public')->exists($coverPath)) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover')->store('resources/covers', 'public');
        }

        $filePath = $resource->file_path;
        if ($request->source_type === 'video') {
            if ($filePath && !filter_var($filePath, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->video_url;
        } elseif ($request->hasFile('file')) {
            if ($filePath && !filter_var($filePath, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('resources/files', 'public');
        }

        $resource->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'] ?? null,
            'tags' => $validated['tags'] ?? null,
            'file_path' => $filePath,
            'cover_image' => $coverPath,
        ]);

        $resource->chapters()->delete();

        if (!empty($request->chapters)) {
            $chapterNum = 1;
            foreach ($request->chapters as $chapterData) {
                if (!empty($chapterData['title'])) {
                    ResourceChapter::create([
                        'resource_id' => $resource->id,
                        'chapter_number' => $chapterNum++,
                        'title' => $chapterData['title'],
                        'description' => $chapterData['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        if ($resource->cover_image && Storage::disk('public')->exists($resource->cover_image)) {
            Storage::disk('public')->delete($resource->cover_image);
        }
        if ($resource->file_path && !filter_var($resource->file_path, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($resource->file_path)) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil dihapus.');
    }
}
