<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberEventController extends Controller
{
    /**
     * Display a listing of member events.
     */
    public function index(Request $request)
    {
        $query = Event::with(['topics', 'participants.user'])
            ->withCount('participants');

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        $events = $query->latest()->paginate(9);

        return view('members.events.index', compact('events'));
    }

    /**
     * Redirect to the first event detail or back to index.
     */
    public function detail()
    {
        $event = Event::first();

        return $event ? redirect()->route('members.events.show', $event) : redirect()->route('members.events.index');
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        $event->load(['topics', 'participants.user', 'creator']);
        $event->loadCount('participants');

        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = $event->participants()
                ->where('user_id', Auth::id())
                ->exists();
        }

        return view('members.events.show', compact('event', 'isRegistered'));
    }

    /**
     * Register or unregister authenticated user for an event.
     */
    public function toggleRegistration(Event $event)
    {
        $userId = Auth::id();

        $participant = EventParticipant::where('event_id', $event->id)
            ->where('user_id', $userId)
            ->first();

        if ($participant) {
            $participant->delete();
            return redirect()->back()->with('success', 'Anda telah membatalkan pendaftaran dari event ini.');
        } else {
            EventParticipant::create([
                'event_id' => $event->id,
                'user_id' => $userId,
                'status' => 'registered',
                'registered_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Selamat! Anda berhasil mendaftar pada event ini.');
        }
    }
}
