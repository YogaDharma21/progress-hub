import { Calendar, FolderGit2, BookOpen, Clock, Users, TrendingUp } from 'lucide-react'
import Image from 'next/image'

export default function HeroDemo() {
    return (
        <>
            {/* Main dashboard panel (left) */}
            <div className="w-2/3 pt-6 lg:pt-16">
                <div className="bg-card relative h-full overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                    <div className="bg-zinc-950 min-h-[300px] lg:min-h-[420px]">
                        {/* Navbar */}
                        <div className="flex items-center justify-between px-4 lg:px-5 py-3 border-b border-zinc-800/60">
                            <div className="flex items-center gap-2">
                                <Image src="/icon-192.png" alt="Progress Hub" width={18} height={18} className="rounded" />
                                <span className="text-[11px] font-semibold text-zinc-100">Progress Hub</span>
                            </div>
                            <div className="hidden sm:flex items-center gap-5">
                                {['Events', 'Projects', 'Resources'].map((item) => (
                                    <span key={item} className="text-[10px] text-zinc-400">{item}</span>
                                ))}
                            </div>
                            <div className="flex items-center gap-2">
                                <div className="w-5 h-5 rounded-full bg-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-200">M</div>
                            </div>
                        </div>

                        <div className="p-4 lg:p-5">
                            {/* Dashboard heading */}
                            <h3 className="text-sm lg:text-base font-bold text-zinc-100 tracking-tight">Dashboard</h3>
                            <p className="text-[9px] lg:text-[10px] text-zinc-500 mt-0.5">Ringkasan Program Kerja, Proyek, dan Repositori Pembelajaran UKM</p>

                            {/* Stats row */}
                            <div className="grid grid-cols-3 gap-2 lg:gap-3 mt-3 lg:mt-4">
                                {[
                                    { icon: Calendar, label: 'Program Aktif', value: '12' },
                                    { icon: FolderGit2, label: 'Proyek Showcase', value: '28' },
                                    { icon: BookOpen, label: 'Artikel & Modul', value: '45' },
                                ].map((stat) => (
                                    <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-xl p-2.5 lg:p-3 flex items-center gap-3">
                                        <div className="w-7 h-7 lg:w-8 lg:h-8 rounded-lg bg-zinc-950 flex items-center justify-center shrink-0">
                                            <stat.icon className="size-3.5 lg:size-4 text-zinc-400" />
                                        </div>
                                        <div>
                                            <div className="text-sm lg:text-base font-bold text-zinc-100">{stat.value}</div>
                                            <div className="text-[8px] lg:text-[9px] text-zinc-500">{stat.label}</div>
                                        </div>
                                    </div>
                                ))}
                            </div>

                            {/* Program Kerja section */}
                            <div className="mt-5 lg:mt-6">
                                <div className="flex items-center justify-between mb-3">
                                    <div className="flex items-center gap-1.5">
                                        <Calendar className="size-3.5 text-zinc-400" />
                                        <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Program Kerja & Kegiatan</span>
                                    </div>
                                    <div className="flex gap-1">
                                        {['Semua', 'Kelas', 'Hackathon', 'Sharing'].map((tab, i) => (
                                            <div key={tab} className={`px-2 py-0.5 text-[8px] lg:text-[9px] font-medium rounded ${i === 0 ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-600'}`}>
                                                {tab}
                                            </div>
                                        ))}
                                    </div>
                                </div>
                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-2 lg:gap-3">
                                    {[
                                        { title: 'Hackathon Code Sprint', desc: 'Build innovative solutions in 48 hours.', status: 'Berlangsung', statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30', progressColor: 'bg-emerald-500', progress: 65, sessions: 8, participants: 24, avatars: ['A', 'R', '+12'] },
                                        { title: 'React Deep Dive', desc: 'Master advanced React patterns.', status: 'Mendatang', statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30', progressColor: 'bg-amber-500', progress: 10, sessions: 4, participants: 18, avatars: ['M', 'S', '+8'] },
                                    ].map((event) => (
                                        <div key={event.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3 lg:p-4">
                                            <div className="flex items-start justify-between gap-2 mb-2">
                                                <div className="min-w-0 flex-1">
                                                    <h4 className="text-[10px] lg:text-[11px] font-semibold text-zinc-100 truncate">{event.title}</h4>
                                                    <p className="text-[8px] lg:text-[9px] text-zinc-500 mt-0.5 line-clamp-1">{event.desc}</p>
                                                </div>
                                                <span className={`shrink-0 px-2 py-0.5 rounded-full text-[8px] lg:text-[9px] font-medium border ${event.statusColor}`}>{event.status}</span>
                                            </div>
                                            <div className="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-2.5">
                                                <div className={`${event.progressColor} h-full rounded-full`} style={{ width: `${event.progress}%` }} />
                                            </div>
                                            <div className="flex items-center justify-between text-[8px] lg:text-[9px] text-zinc-500">
                                                <div className="flex items-center gap-2.5">
                                                    <span className="flex items-center gap-1"><Clock className="size-2.5 lg:size-3" /> {event.sessions} Pertemuan</span>
                                                    <span className="flex items-center gap-1"><Users className="size-2.5 lg:size-3" /> {event.participants} Peserta</span>
                                                </div>
                                                <div className="flex -space-x-1">
                                                    {event.avatars.map((a, i) => (
                                                        <div key={i} className="w-4 h-4 lg:w-5 lg:h-5 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200">{a}</div>
                                                    ))}
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Analytics panel (right/overlapping) */}
            <div className="bg-card relative h-full w-2/3 overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                <div className="bg-zinc-950 p-4 lg:p-6 min-h-[300px] lg:min-h-[420px]">
                    {/* Header */}
                    <div className="mb-4">
                        <h3 className="text-xs lg:text-sm font-semibold text-zinc-100">Analytics Overview</h3>
                        <p className="text-[8px] lg:text-[9px] text-zinc-500 mt-0.5">Last 7 days using median</p>
                    </div>

                    {/* Metrics row */}
                    <div className="grid grid-cols-4 gap-2 mb-4">
                        {[
                            { label: 'Page Views', value: '2.7K' },
                            { label: 'Bounce Rate', value: '40.6%' },
                            { label: 'Sessions', value: '479K' },
                            { label: 'Avg. Duration', value: '17m' },
                        ].map((m) => (
                            <div key={m.label} className="bg-zinc-900 border border-zinc-800 rounded-lg p-2 lg:p-2.5">
                                <div className="text-xs lg:text-sm font-bold text-zinc-100">{m.value}</div>
                                <div className="text-[7px] lg:text-[8px] text-zinc-500 mt-0.5">{m.label}</div>
                            </div>
                        ))}
                    </div>

                    {/* Chart */}
                    <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 lg:p-4 mb-4">
                        <div className="flex items-center justify-between mb-3">
                            <span className="text-[10px] lg:text-xs font-semibold text-zinc-200">Page Load vs Bounce Rate</span>
                            <div className="flex items-center gap-3">
                                <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500">
                                    <div className="w-2 h-0.5 bg-zinc-500 rounded" />
                                    Load Time
                                </span>
                                <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500">
                                    <div className="w-2 h-0.5 bg-zinc-400 rounded" />
                                    Bounce
                                </span>
                            </div>
                        </div>
                        <div className="relative h-20 lg:h-28">
                            {/* Bar chart */}
                            <div className="absolute inset-0 flex items-end gap-1">
                                {[30, 45, 60, 50, 70, 55, 80, 65, 75, 85, 60, 70].map((h, i) => (
                                    <div key={i} className="flex-1 flex flex-col justify-end">
                                        <div className="w-full rounded-t-sm bg-zinc-700" style={{ height: `${h}%` }} />
                                    </div>
                                ))}
                            </div>
                            {/* Line overlay */}
                            <svg className="absolute inset-0 w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M0,70 Q10,65 20,55 T40,50 T60,45 T80,40 T100,35" fill="none" stroke="rgb(161,161,170)" strokeWidth="1.5" vectorEffect="non-scaling-stroke" />
                            </svg>
                        </div>
                    </div>

                    {/* Bottom row */}
                    <div className="grid grid-cols-2 gap-2">
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                            <div className="flex items-center justify-between mb-2">
                                <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-300">Top Resources</span>
                            </div>
                            <div className="space-y-1.5">
                                {['Modul React', 'Tutorial API', 'CSS Tricks'].map((r, i) => (
                                    <div key={r} className="flex items-center justify-between">
                                        <span className="text-[8px] lg:text-[9px] text-zinc-400">{r}</span>
                                        <div className="flex items-center gap-1">
                                            <div className="h-1 rounded-full bg-zinc-600" style={{ width: `${[80, 60, 45][i]}px` }} />
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                            <div className="flex items-center justify-between mb-2">
                                <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-300">Active Users</span>
                            </div>
                            <div className="flex items-center gap-1 mb-2">
                                <div className="text-lg lg:text-xl font-bold text-zinc-100">128</div>
                                <span className="text-[8px] lg:text-[9px] text-zinc-400 font-medium flex items-center gap-0.5 mt-1">
                                    <TrendingUp className="size-2.5" />
                                    +12%
                                </span>
                            </div>
                            <div className="flex -space-x-1">
                                {['A', 'M', 'R', 'S', 'K', '+23'].map((u, i) => (
                                    <div key={i} className="w-5 h-5 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] lg:text-[8px] font-semibold text-zinc-200">
                                        {u}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
