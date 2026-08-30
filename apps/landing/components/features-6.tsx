import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
import Image from 'next/image'

const events = [
    {
        title: 'Hackathon Code Sprint',
        description: 'Build innovative solutions in 48 hours.',
        type: 'Hackathon' as const,
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
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
    {
        title: 'Python for Data Science',
        description: 'Introduction to data analysis with Python.',
        type: 'Kelas' as const,
        status: 'Registration',
        statusColor: 'bg-blue-500/10 text-blue-400 border-blue-500/30',
        sessions: 6,
        participants: 32,
        avatars: ['P', 'L', '+15'],
    },
]

export default function FeaturesSection() {
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
                        <div className="flex items-center gap-2 mb-5">
                            <Calendar className="size-4 text-zinc-400" />
                            <span className="text-xs font-semibold text-zinc-100">Program & Kegiatan</span>
                        </div>
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 mb-5">
                            {events.map((event) => (
                                <div key={event.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                    <div className="flex items-start justify-between gap-2 mb-2.5">
                                        <div className="min-w-0 flex-1">
                                            <h4 className="text-[11px] font-semibold text-zinc-100 truncate">{event.title}</h4>
                                            <p className="text-[9px] text-zinc-500 mt-0.5 line-clamp-1">{event.description}</p>
                                        </div>
                                        <span className={`shrink-0 px-2 py-0.5 rounded text-[9px] font-medium border ${event.statusColor}`}>
                                            {event.status}
                                        </span>
                                    </div>
                                    <div className="flex items-center justify-between text-[9px] text-zinc-500">
                                        <div className="flex items-center gap-3">
                                            <span className="flex items-center gap-1"><Clock className="size-3" /> {event.sessions} Pertemuan</span>
                                            <span className="flex items-center gap-1"><Users className="size-3" /> {event.participants} Peserta</span>
                                        </div>
                                        <div className="flex -space-x-1">
                                            {event.avatars.map((a, i) => (
                                                <div key={i} className="w-5 h-5 rounded bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200">{a}</div>
                                            ))}
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>

                        {/* Bottom row: projects + resources + stats */}
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-4">
                            {/* Project card */}
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                <div className="w-full h-32 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-lg border border-zinc-800 mb-3 flex items-center justify-center">
                                    <Image src="/icon-192.png" alt="" width={24} height={24} className="rounded opacity-30" />
                                </div>
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
                                            <div className="w-5 h-5 rounded bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-300 shrink-0">{item.user[0]}</div>
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

                    {/* Overlapping dashboard card */}
                    <div className="hidden sm:block absolute -bottom-8 right-0 sm:-right-4 lg:-bottom-12 lg:-right-8 z-20 w-64 lg:w-80 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-4 lg:p-5 shadow-2xl shadow-black/50">
                        {/* Stats */}
                        <div className="grid grid-cols-4 gap-2 mb-3">
                            {[
                                { label: 'Events', value: '4' },
                                { label: 'Projects', value: '2' },
                                { label: 'Resources', value: '2' },
                                { label: 'Users', value: '8' },
                            ].map((m) => (
                                <div key={m.label} className="bg-zinc-900 border border-zinc-800 rounded-lg p-2">
                                    <div className="text-xs font-bold text-zinc-100">{m.value}</div>
                                    <div className="text-[7px] text-zinc-500">{m.label}</div>
                                </div>
                            ))}
                        </div>
                        {/* Chart */}
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 mb-3">
                            <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-200">Aktivitas 7 Hari</span>
                            <div className="flex items-end gap-1 h-12 mt-2">
                                {[
                                    { day: 'Min', vals: [0, 0, 0] },
                                    { day: 'Sen', vals: [0, 0, 0] },
                                    { day: 'Sel', vals: [0, 0, 0] },
                                    { day: 'Rab', vals: [0, 0, 0] },
                                    { day: 'Kam', vals: [0, 0, 0] },
                                    { day: 'Jum', vals: [0, 0, 0] },
                                    { day: 'Sab', vals: [2, 1, 1] },
                                ].map((d) => (
                                    <div key={d.day} className="flex-1 flex flex-col items-center">
                                        <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '36px' }}>
                                            {d.vals[0] > 0 && <div className="w-full rounded-t-sm bg-zinc-700" style={{ height: `${(d.vals[0] / 3) * 100}%`, minHeight: '3px' }} />}
                                            {d.vals[1] > 0 && <div className="w-full rounded-t-sm bg-zinc-600" style={{ height: `${(d.vals[1] / 3) * 100}%`, minHeight: '3px' }} />}
                                            {d.vals[2] > 0 && <div className="w-full rounded-t-sm bg-zinc-500" style={{ height: `${(d.vals[2] / 3) * 100}%`, minHeight: '3px' }} />}
                                            {d.vals.every(v => v === 0) && <div className="w-full h-px bg-zinc-800" />}
                                        </div>
                                        <span className="text-[6px] text-zinc-600 mt-1">{d.day}</span>
                                    </div>
                                ))}
                            </div>
                        </div>
                        {/* Activity */}
                        <div className="space-y-1.5">
                            {[
                                { type: 'Event', title: 'Hackathon Sprint', time: '2m lalu' },
                                { type: 'Project', title: 'Progress Hub', time: '1j lalu' },
                                { type: 'Resource', title: 'Modul React', time: '3 hari lalu' },
                            ].map((item, i) => (
                                <div key={i} className="flex items-center gap-2">
                                    <div className="w-4 h-4 rounded bg-zinc-900 border border-zinc-800 flex items-center justify-center shrink-0">
                                        <div className="w-1.5 h-1.5 rounded-sm bg-zinc-600" />
                                    </div>
                                    <div className="min-w-0 flex-1">
                                        <p className="text-[8px] text-zinc-100 font-medium truncate">{item.title}</p>
                                        <p className="text-[6px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
