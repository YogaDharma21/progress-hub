import { Clock, Users } from 'lucide-react'

const events = [
    {
        title: 'Hackathon Code Sprint',
        description: 'Build innovative solutions in 48 hours with your team.',
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        progressColor: 'bg-emerald-500',
        progress: 65,
        sessions: 8,
        participants: 24,
        avatars: ['A', 'R', '+12'],
    },
    {
        title: 'React Deep Dive',
        description: 'Master advanced React patterns and performance.',
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        progressColor: 'bg-amber-500',
        progress: 0,
        sessions: 4,
        participants: 18,
        avatars: ['M', 'S', '+8'],
    },
]

const tabs = ['Semua', 'Kelas', 'Hackathon', 'Sharing']

export default function EventCardDemo() {
    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 w-full max-w-md">
            <div className="flex gap-1.5 mb-4">
                {tabs.map((tab, i) => (
                    <div
                        key={tab}
                        className={`px-2.5 py-1 text-[10px] font-medium rounded-md ${i === 0 ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-500'}`}>
                        {tab}
                    </div>
                ))}
            </div>
            <div className="space-y-3">
                {events.map((event) => (
                    <div key={event.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                        <div className="flex items-start justify-between gap-2 mb-2">
                            <div className="min-w-0 flex-1">
                                <h4 className="text-xs font-semibold text-zinc-100 truncate">{event.title}</h4>
                                <p className="text-[10px] text-zinc-500 mt-0.5 line-clamp-1">{event.description}</p>
                            </div>
                            <span className={`shrink-0 px-2 py-0.5 rounded-full text-[9px] font-medium border ${event.statusColor}`}>
                                {event.status}
                            </span>
                        </div>
                        <div className="w-full bg-zinc-950 h-1 rounded-full overflow-hidden mb-3">
                            <div className={`${event.progressColor} h-full rounded-full`} style={{ width: `${event.progress || 10}%` }} />
                        </div>
                        <div className="flex items-center justify-between text-[10px] text-zinc-500">
                            <div className="flex items-center gap-2.5">
                                <span className="flex items-center gap-1">
                                    <Clock className="size-3" />
                                    {event.sessions} Pertemuan
                                </span>
                                <span className="flex items-center gap-1">
                                    <Users className="size-3" />
                                    {event.participants} Peserta
                                </span>
                            </div>
                            <div className="flex -space-x-1">
                                {event.avatars.map((a, i) => (
                                    <div
                                        key={i}
                                        className="w-5 h-5 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[8px] font-semibold text-zinc-200">
                                        {a}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    )
}
