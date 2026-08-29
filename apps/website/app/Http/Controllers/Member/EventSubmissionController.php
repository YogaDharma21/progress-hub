<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventTopic;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventSubmissionController extends Controller
{
    public function create()
    {
        return view('members.submissions.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:100',
            'sessions_count' => 'nullable|integer|min:0',
            'target_capacity' => 'nullable|integer|min:0',
            'topics' => 'nullable|array',
            'topics.*.title' => 'nullable|string|max:255',
            'topics.*.description' => 'nullable|string',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? null,
            'type' => $validated['type'] ?? null,
            'sessions_count' => $validated['sessions_count'] ?? null,
            'target_capacity' => $validated['target_capacity'] ?? null,
            'created_by' => Auth::id(),
            'approval_status' => 'pending',
        ]);

        if (!empty($request->topics)) {
            $order = 1;
            foreach ($request->topics as $topicData) {
                if (!empty($topicData['title'])) {
                    EventTopic::create([
                        'event_id' => $event->id,
                        'title' => $topicData['title'],
                        'description' => $topicData['description'] ?? null,
                        'order' => $order++,
                    ]);
                }
            }
        }

        Submission::create([
            'user_id' => Auth::id(),
            'submittable_type' => Event::class,
            'submittable_id' => $event->id,
            'status' => 'pending',
        ]);

        return redirect()->route('members.dashboard')->with('success', 'Event berhasil dikirim untuk review. Menunggu persetujuan admin.');
    }

    public function edit(Event $event)
    {
        if ($event->created_by !== Auth::id()) {
            abort(403);
        }

        $event->load('topics');

        return view('members.submissions.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        if ($event->created_by !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:100',
            'sessions_count' => 'nullable|integer|min:0',
            'target_capacity' => 'nullable|integer|min:0',
            'topics' => 'nullable|array',
            'topics.*.title' => 'nullable|string|max:255',
            'topics.*.description' => 'nullable|string',
        ]);

        $event->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? null,
            'type' => $validated['type'] ?? null,
            'sessions_count' => $validated['sessions_count'] ?? null,
            'target_capacity' => $validated['target_capacity'] ?? null,
        ]);

        $event->topics()->delete();

        if (!empty($request->topics)) {
            $order = 1;
            foreach ($request->topics as $topicData) {
                if (!empty($topicData['title'])) {
                    EventTopic::create([
                        'event_id' => $event->id,
                        'title' => $topicData['title'],
                        'description' => $topicData['description'] ?? null,
                        'order' => $order++,
                    ]);
                }
            }
        }

        $submission = $event->submissions()->latest()->first();
        if ($submission) {
            $submission->update(['status' => 'pending', 'rejection_reason' => null]);
        }

        return redirect()->route('members.dashboard')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->created_by !== Auth::id()) {
            abort(403);
        }

        $event->delete();

        return redirect()->route('members.dashboard')->with('success', 'Event berhasil dihapus.');
    }
}
