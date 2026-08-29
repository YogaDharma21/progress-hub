<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::with('topics')->withCount('participants')->latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created event in storage.
     */
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

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        $event->load('topics');

        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
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

        $event->recalculateProgress();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
