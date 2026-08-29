<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = Submission::with(['user', 'submittable', 'reviewer']);

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $submissions = $query->latest()->paginate(15);

        return view('admin.submissions.index', compact('submissions'));
    }

    public function show(Submission $submission)
    {
        $submission->load(['user', 'reviewer', 'submittable']);

        $content = $submission->submittable;

        if ($content instanceof Event) {
            $content->load('topics');
        } elseif ($content instanceof Project) {
            $content->load('features');
        } elseif ($content instanceof Resource) {
            $content->load('chapters');
        }

        return view('admin.submissions.show', compact('submission', 'content'));
    }

    public function approve(Submission $submission)
    {
        $content = $submission->submittable;

        if ($content) {
            $content->update(['approval_status' => 'approved', 'rejection_reason' => null]);
        }

        $submission->update([
            'status' => 'approved',
            'rejection_reason' => null,
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        return redirect()->route('admin.submissions.index')->with('success', 'Submission berhasil disetujui.');
    }

    public function reject(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $content = $submission->submittable;

        if ($content) {
            $content->update([
                'approval_status' => 'rejected',
                'rejection_reason' => $validated['rejection_reason'],
            ]);
        }

        $submission->update([
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        return redirect()->route('admin.submissions.show', $submission)->with('success', 'Submission berhasil ditolak.');
    }
}
