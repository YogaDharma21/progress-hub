import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'

export default function FeaturesSection() {
    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl space-y-12 px-6">
                <h2 className="text-muted-foreground relative z-10 max-w-4xl text-balance text-4xl font-medium tracking-tight lg:text-5xl">
                    <span className="text-foreground">Dukung developer UKM Progress jadi lebih keren.</span> <br /> Program, proyek, dan ilmu baru, semua ada di sini.
                </h2>
                <div className="relative -mx-6 overflow-hidden px-3 pt-3 md:-mx-8">
                    <div className="mask-radial-at-top-left mask-radial-from-65% mask-radial-[100%_60%] z-1 absolute inset-3 size-64 rounded-tl-3xl border-l border-t md:size-96 lg:inset-4"></div>
                    <div className="min-w-2xl aspect-88/36 mask-b-from-75% mask-b-to-95% relative">
                        {/* Top layer: Event card dashboard */}
                        <div className="absolute inset-0 z-10 rounded-xl bg-zinc-950 border border-zinc-800/60 p-5 overflow-hidden">
                            <div className="flex items-center justify-between mb-4">
                                <div className="flex items-center gap-2">
                                    <Calendar className="size-4 text-zinc-400" />
                                    <span className="text-xs font-semibold text-zinc-100">Program Kerja</span>
                                </div>
                                <div className="flex gap-1">
                                    {['Semua', 'Kelas', 'Hackathon'].map((tab, i) => (
                                        <div key={tab} className={`px-2 py-0.5 text-[9px] font-medium rounded ${i === 0 ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-600'}`}>
                                            {tab}
                                        </div>
                                    ))}
                                </div>
                            </div>
                            <div className="grid grid-cols-2 gap-3">
                                {/* Event card 1 */}
                                <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                                    <div className="flex items-start justify-between gap-2 mb-2">
                                        <h4 className="text-[10px] font-semibold text-zinc-100">Hackathon Code Sprint</h4>
                                        <span className="px-1.5 py-0.5 rounded-full text-[8px] font-medium border bg-emerald-500/10 text-emerald-400 border-emerald-500/30">Berlangsung</span>
                                    </div>
                                    <div className="w-full bg-zinc-950 h-1 rounded-full overflow-hidden mb-2">
                                        <div className="bg-emerald-500 h-full rounded-full" style={{ width: '65%' }} />
                                    </div>
                                    <div className="flex items-center justify-between text-[9px] text-zinc-500">
                                        <span className="flex items-center gap-1"><Clock className="size-2.5" /> 8 Pertemuan</span>
                                        <span className="flex items-center gap-1"><Users className="size-2.5" /> 24 Peserta</span>
                                    </div>
                                </div>
                                {/* Event card 2 */}
                                <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                                    <div className="flex items-start justify-between gap-2 mb-2">
                                        <h4 className="text-[10px] font-semibold text-zinc-100">React Deep Dive</h4>
                                        <span className="px-1.5 py-0.5 rounded-full text-[8px] font-medium border bg-amber-500/10 text-amber-400 border-amber-500/30">Mendatang</span>
                                    </div>
                                    <div className="w-full bg-zinc-950 h-1 rounded-full overflow-hidden mb-2">
                                        <div className="bg-amber-500 h-full rounded-full" style={{ width: '10%' }} />
                                    </div>
                                    <div className="flex items-center justify-between text-[9px] text-zinc-500">
                                        <span className="flex items-center gap-1"><Clock className="size-2.5" /> 4 Pertemuan</span>
                                        <span className="flex items-center gap-1"><Users className="size-2.5" /> 18 Peserta</span>
                                    </div>
                                </div>
                                {/* Project card */}
                                <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                                    <div className="w-full h-14 bg-gradient-to-br from-violet-500/20 to-blue-500/20 rounded border border-zinc-800 mb-2 flex items-center justify-center text-[9px] text-zinc-500">
                                        Progress Hub
                                    </div>
                                    <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">Web App</span>
                                    <h4 className="text-[10px] font-semibold text-zinc-100 mt-1">Progress Hub</h4>
                                    <div className="flex gap-1 mt-1.5">
                                        {['Laravel', 'React', 'Tailwind'].map((t) => (
                                            <span key={t} className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                                        ))}
                                    </div>
                                </div>
                                {/* Resource card */}
                                <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                                    <div className="flex items-center gap-1 mb-1.5">
                                        <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">Modul</span>
                                        <span className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">JavaScript</span>
                                    </div>
                                    <h4 className="text-[10px] font-semibold text-zinc-100">Modul Praktikum Web Dev</h4>
                                    <p className="text-[9px] text-zinc-500 line-clamp-1 mt-0.5">Panduan lengkap belajar web development.</p>
                                    <div className="flex items-center justify-between text-[9px] text-zinc-600 mt-2 pt-1.5 border-t border-zinc-800/60">
                                        <span>3 hari lalu</span>
                                        <span className="flex items-center gap-0.5"><Eye className="size-2.5" /> 342 views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/* Bottom layer: Dashboard stats */}
                        <div className="rounded-xl bg-zinc-900 border border-zinc-800 p-4 opacity-75">
                            <div className="flex items-center gap-2 mb-3">
                                <div className="w-6 h-6 rounded bg-zinc-800 flex items-center justify-center">
                                    <Calendar className="size-3 text-zinc-400" />
                                </div>
                                <span className="text-[10px] font-semibold text-zinc-100">Dashboard</span>
                            </div>
                            <div className="grid grid-cols-3 gap-2 mb-3">
                                {[
                                    { icon: Calendar, label: 'Program Aktif', value: '12' },
                                    { icon: FolderGit2, label: 'Proyek', value: '28' },
                                    { icon: BookOpen, label: 'Modul', value: '45' },
                                ].map((stat) => (
                                    <div key={stat.label} className="bg-zinc-950 border border-zinc-800 rounded-lg p-2">
                                        <stat.icon className="size-3 text-zinc-500 mb-1" />
                                        <div className="text-sm font-bold text-zinc-100">{stat.value}</div>
                                        <div className="text-[8px] text-zinc-600">{stat.label}</div>
                                    </div>
                                ))}
                            </div>
                            <div className="space-y-2">
                                {[
                                    { user: 'Arief N.', action: 'bergabung ke', target: 'Hackathon Sprint' },
                                    { user: 'Maya S.', action: 'mengunggah', target: 'Smart Attendance' },
                                ].map((item, i) => (
                                    <div key={i} className="flex items-center gap-2 text-[9px]">
                                        <div className="w-4 h-4 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[7px] font-semibold text-zinc-300">
                                            {item.user[0]}
                                        </div>
                                        <p className="text-zinc-500">
                                            <span className="text-zinc-300 font-medium">{item.user}</span>{' '}
                                            {item.action}{' '}
                                            <span className="text-zinc-300 font-medium">{item.target}</span>
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    )
}
