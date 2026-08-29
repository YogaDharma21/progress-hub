'use client'

import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
import { useState } from 'react'

const tabs = ['Semua', 'Kelas', 'Hackathon', 'Sharing'] as const
type Tab = (typeof tabs)[number]

const events = [
    {
        title: 'Hackathon Code Sprint',
        description: 'Build innovative solutions in 48 hours.',
        type: 'Hackathon' as const,
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
        description: 'Master advanced React patterns.',
        type: 'Kelas' as const,
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        progressColor: 'bg-amber-500',
        progress: 10,
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
        progressColor: 'bg-emerald-500',
        progress: 30,
        sessions: 2,
        participants: 12,
        avatars: ['K', 'D', '+5'],
    },
    {
        title: 'Python for Data Science',
        description: 'Introduction to data analysis with Python.',
        type: 'Kelas' as const,
        status: 'Registration',
        statusColor: 'bg-blue-500/10 text-blue-400 border-blue-500/30',
        progressColor: 'bg-blue-500',
        progress: 0,
        sessions: 6,
        participants: 32,
        avatars: ['P', 'L', '+15'],
    },
]

export default function FeaturesSection() {
    const [activeTab, setActiveTab] = useState<Tab>('Semua')
    const filtered = activeTab === 'Semua' ? events : events.filter((e) => e.type === activeTab)

    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl space-y-12 px-6">
                <h2 className="text-muted-foreground relative z-10 max-w-4xl text-balance text-4xl font-medium tracking-tight lg:text-5xl">
                    <span className="text-foreground">Dukung developer UKM Progress jadi lebih keren.</span> <br /> Program, proyek, dan ilmu baru, semua ada di sini.
                </h2>
                <div className="relative mx-auto max-w-4xl">
                    <div className="mask-radial-at-top-left mask-radial-from-65% mask-radial-[100%_60%] z-1 absolute inset-3 size-64 rounded-tl-3xl border-l border-t md:size-96 lg:inset-4"></div>

                    {/* Main dashboard panel */}
                    <div className="relative z-10 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 lg:p-6 shadow-2xl shadow-black/40">
                        <div className="flex items-center justify-between mb-5">
                            <div className="flex items-center gap-2">
                                <Calendar className="size-4 text-zinc-400" />
                                <span className="text-xs font-semibold text-zinc-100">Program Kerja & Kegiatan</span>
                            </div>
                            <div className="flex gap-1">
                                {tabs.map((tab) => (
                                    <button
                                        key={tab}
                                        onClick={() => setActiveTab(tab)}
                                        className={`px-2.5 py-1 text-[10px] font-medium rounded-md transition-colors cursor-pointer ${activeTab === tab ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-500 hover:text-zinc-300'}`}>
                                        {tab}
                                    </button>
                                ))}
                            </div>
                        </div>
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 mb-5">
                            {filtered.map((event) => (
                                <div key={event.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                    <div className="flex items-start justify-between gap-2 mb-2.5">
                                        <div className="min-w-0 flex-1">
                                            <h4 className="text-[11px] font-semibold text-zinc-100 truncate">{event.title}</h4>
                                            <p className="text-[9px] text-zinc-500 mt-0.5 line-clamp-1">{event.description}</p>
                                        </div>
                                        <span className={`shrink-0 px-2 py-0.5 rounded-full text-[9px] font-medium border ${event.statusColor}`}>
                                            {event.status}
                                        </span>
                                    </div>
                                    <div className="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-2.5">
                                        <div className={`${event.progressColor} h-full rounded-full transition-all`} style={{ width: `${event.progress || 10}%` }} />
                                    </div>
                                    <div className="flex items-center justify-between text-[9px] text-zinc-500">
                                        <div className="flex items-center gap-3">
                                            <span className="flex items-center gap-1"><Clock className="size-3" /> {event.sessions} Pertemuan</span>
                                            <span className="flex items-center gap-1"><Users className="size-3" /> {event.participants} Peserta</span>
                                        </div>
                                        <div className="flex -space-x-1">
                                            {event.avatars.map((a, i) => (
                                                <div key={i} className="w-5 h-5 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200">{a}</div>
                                            ))}
                                        </div>
                                    </div>
                                </div>
                            ))}
                            {filtered.length === 0 && (
                                <div className="col-span-full text-center text-[11px] text-zinc-600 py-8">Belum ada event di kategori ini.</div>
                            )}
                        </div>

                        {/* Bottom row: projects + resources + stats */}
                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 lg:gap-4">
                            {/* Project card */}
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                <div className="w-full h-20 bg-gradient-to-br from-violet-500/20 to-blue-500/20 rounded-lg border border-zinc-800 mb-3 flex items-center justify-center text-[10px] text-zinc-500 font-medium">Progress Hub</div>
                                <span className="px-2 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300">Web App</span>
                                <h4 className="text-[11px] font-semibold text-zinc-100 mt-1.5">Progress Hub</h4>
                                <p className="text-[9px] text-zinc-500 line-clamp-1 mt-0.5">Platform manajemen kegiatan UKM.</p>
                                <div className="flex flex-wrap gap-1 mt-2">
                                    {['Laravel', 'React', 'Tailwind'].map((t) => (
                                        <span key={t} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                                    ))}
                                </div>
                                <div className="flex items-center justify-between text-[9px] text-zinc-600 mt-3 pt-2 border-t border-zinc-800/60">
                                    <span>oleh Arief N.</span>
                                    <span>2 hari lalu</span>
                                </div>
                            </div>
                            {/* Resource card */}
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                <div className="flex items-center gap-1.5 mb-2">
                                    <span className="px-2 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300">Modul</span>
                                    <span className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">JavaScript</span>
                                    <span className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">React</span>
                                </div>
                                <h4 className="text-[11px] font-semibold text-zinc-100">Modul Praktikum Web Dev</h4>
                                <p className="text-[9px] text-zinc-500 line-clamp-2 mt-1">Panduan lengkap belajar web development dari dasar hingga mahir.</p>
                                <div className="flex items-center justify-between text-[9px] text-zinc-600 mt-3 pt-2 border-t border-zinc-800/60">
                                    <span>3 hari lalu</span>
                                    <span className="flex items-center gap-1"><Eye className="size-3" /> 342 views</span>
                                </div>
                            </div>
                            {/* Stats + activity */}
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                <h5 className="text-[10px] font-semibold text-zinc-400 mb-3">Ringkasan</h5>
                                <div className="grid grid-cols-3 gap-2 mb-3">
                                    {[
                                        { icon: Calendar, label: 'Program', value: '12' },
                                        { icon: FolderGit2, label: 'Proyek', value: '28' },
                                        { icon: BookOpen, label: 'Modul', value: '45' },
                                    ].map((s) => (
                                        <div key={s.label} className="bg-zinc-950 border border-zinc-800 rounded-lg p-2 text-center">
                                            <s.icon className="size-3 text-zinc-500 mx-auto mb-1" />
                                            <div className="text-xs font-bold text-zinc-100">{s.value}</div>
                                            <div className="text-[7px] text-zinc-600">{s.label}</div>
                                        </div>
                                    ))}
                                </div>
                                <div className="space-y-2">
                                    {[
                                        { user: 'Arief N.', action: 'bergabung', target: 'Hackathon Sprint', time: '2m' },
                                        { user: 'Maya S.', action: 'mengunggah', target: 'Smart Attendance', time: '15m' },
                                    ].map((item, i) => (
                                        <div key={i} className="flex items-center gap-2">
                                            <div className="w-5 h-5 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-300 shrink-0">{item.user[0]}</div>
                                            <p className="text-[9px] text-zinc-500 min-w-0 flex-1">
                                                <span className="text-zinc-300 font-medium">{item.user}</span>{' '}
                                                <span className="text-zinc-600">{item.action}</span>{' '}
                                                <span className="text-zinc-300 font-medium">{item.target}</span>
                                            </p>
                                            <span className="text-[8px] text-zinc-600 shrink-0">{item.time}</span>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Overlapping analytics card */}
                    <div className="absolute -bottom-8 -right-4 lg:-bottom-12 lg:-right-8 z-20 w-64 lg:w-80 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-4 lg:p-5 shadow-2xl shadow-black/50">
                        <div className="flex items-center justify-between mb-3">
                            <span className="text-[10px] lg:text-xs font-semibold text-zinc-100">Analytics</span>
                            <div className="flex items-center gap-1">
                                <div className="w-1.5 h-1.5 rounded-full bg-emerald-400" />
                                <span className="text-[8px] text-zinc-500">Live</span>
                            </div>
                        </div>
                        <div className="grid grid-cols-2 gap-2 mb-3">
                            {[
                                { label: 'Page Views', value: '2.7K', color: 'text-cyan-400' },
                                { label: 'Sessions', value: '479K', color: 'text-emerald-400' },
                                { label: 'Bounce Rate', value: '40.6%', color: 'text-rose-400' },
                                { label: 'Duration', value: '17m', color: 'text-amber-400' },
                            ].map((m) => (
                                <div key={m.label} className="bg-zinc-900 border border-zinc-800 rounded-lg p-2">
                                    <div className={`text-xs font-bold ${m.color}`}>{m.value}</div>
                                    <div className="text-[8px] text-zinc-500">{m.label}</div>
                                </div>
                            ))}
                        </div>
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                            <div className="flex items-end gap-0.5 h-12">
                                {[30, 45, 55, 40, 65, 50, 70, 60, 75, 80, 55, 65].map((h, i) => (
                                    <div key={i} className="flex-1 rounded-t-sm bg-cyan-400/50" style={{ height: `${h}%` }} />
                                ))}
                            </div>
                            <div className="flex items-center gap-3 mt-2">
                                <span className="flex items-center gap-1 text-[7px] text-zinc-500">
                                    <div className="w-1.5 h-0.5 bg-cyan-400 rounded" /> Load
                                </span>
                                <span className="flex items-center gap-1 text-[7px] text-zinc-500">
                                    <div className="w-1.5 h-0.5 bg-rose-400 rounded" /> Bounce
                                </span>
                            </div>
                        </div>
                        <div className="flex -space-x-1 mt-3">
                            {['A', 'M', 'R', 'S', 'K', '+23'].map((u, i) => (
                                <div key={i} className="w-5 h-5 rounded-full bg-zinc-700 border border-zinc-950 flex items-center justify-center text-[7px] font-semibold text-zinc-200">{u}</div>
                            ))}
                            <span className="text-[8px] text-zinc-500 ml-2 self-center">128 active</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
