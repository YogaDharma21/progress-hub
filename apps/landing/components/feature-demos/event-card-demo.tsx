'use client'

import { Clock, Users } from 'lucide-react'
import { useState } from 'react'

const tabs = ['Semua', 'Kelas', 'Hackathon', 'Sharing'] as const
type Tab = (typeof tabs)[number]

const events = [
    {
        title: 'Hackathon Code Sprint',
        description: 'Build innovative solutions in 48 hours with your team.',
        type: 'Hackathon' as const,
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        sessions: 8,
        participants: 24,
        avatars: ['A', 'R', '+12'],
    },
    {
        title: 'React Deep Dive',
        description: 'Master advanced React patterns and performance.',
        type: 'Kelas' as const,
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        sessions: 4,
        participants: 18,
        avatars: ['M', 'S', '+8'],
    },
    {
        title: 'Sharing Session: CI/CD',
        description: 'Learn CI/CD pipelines with GitHub Actions.',
        type: 'Sharing' as const,
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        sessions: 2,
        participants: 12,
        avatars: ['K', 'D', '+5'],
    },
]

export default function EventCardDemo() {
    const [activeTab, setActiveTab] = useState<Tab>('Semua')
    const filtered = activeTab === 'Semua' ? events : events.filter((e) => e.type === activeTab)

    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-3.5 sm:p-5 w-full max-w-md">
            <div className="flex flex-wrap gap-1 sm:gap-1.5 mb-4">
                {tabs.map((tab) => (
                    <button
                        key={tab}
                        onClick={() => setActiveTab(tab)}
                        className={`px-2.5 py-1 text-[10px] font-medium rounded-md transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] active:scale-90 hover:-translate-y-0.5 cursor-pointer ${activeTab === tab ? 'bg-zinc-800 text-zinc-100 shadow-sm' : 'text-zinc-500 hover:text-zinc-300 hover:bg-zinc-900/60'}`}>
                        {tab}
                    </button>
                ))}
            </div>
            <div className="space-y-3">
                {filtered.map((event) => (
                    <div
                        key={event.title}
                        className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-3 sm:p-4 transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-1 hover:shadow-lg hover:shadow-black/20 active:scale-[0.98] cursor-pointer">
                        <div className="flex items-start justify-between gap-2 mb-2">
                            <div className="min-w-0 flex-1">
                                <h4 className="text-xs font-semibold text-zinc-100 truncate group-hover:text-white transition-colors">{event.title}</h4>
                                <p className="text-[10px] text-zinc-500 mt-0.5 line-clamp-1">{event.description}</p>
                            </div>
                            <span className={`shrink-0 px-2 py-0.5 rounded text-[9px] font-medium border transition-transform duration-200 group-hover:scale-105 ${event.statusColor}`}>
                                {event.status}
                            </span>
                        </div>
                        <div className="flex flex-wrap items-center justify-between gap-2 text-[9px] sm:text-[10px] text-zinc-500">
                            <div className="flex items-center gap-2 sm:gap-2.5">
                                <span className="flex items-center gap-1">
                                    <Clock className="size-3 transition-transform duration-200 group-hover:rotate-12" />
                                    {event.sessions} Pertemuan
                                </span>
                                <span className="flex items-center gap-1">
                                    <Users className="size-3 transition-transform duration-200 group-hover:scale-110" />
                                    {event.participants} Peserta
                                </span>
                            </div>
                            <div className="flex -space-x-1">
                                {event.avatars.map((a, i) => (
                                    <div
                                        key={i}
                                        className="w-5 h-5 rounded bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[8px] font-semibold text-zinc-200 transition-transform duration-200 group-hover:-translate-y-0.5">
                                        {a}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                ))}
                {filtered.length === 0 && (
                    <div className="text-center text-[11px] text-zinc-600 py-6">Belum ada event di kategori ini.</div>
                )}
            </div>
        </div>
    )
}
