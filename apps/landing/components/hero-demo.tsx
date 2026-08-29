import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
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
                                <span className="text-[9px] text-zinc-400 hidden sm:inline">Member</span>
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

            {/* Second panel (right/overlapping) */}
            <div className="bg-card relative h-full w-2/3 overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
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
                        {/* Projects section */}
                        <div>
                            <div className="flex items-center justify-between mb-3">
                                <div className="flex items-center gap-1.5">
                                    <FolderGit2 className="size-3.5 text-zinc-400" />
                                    <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Portofolio & Proyek</span>
                                </div>
                                <span className="text-[8px] lg:text-[9px] text-zinc-500 underline">Lihat Semua</span>
                            </div>
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-3 lg:p-4">
                                <div className="w-full h-16 lg:h-24 bg-gradient-to-br from-violet-500/20 to-blue-500/20 rounded-lg border border-zinc-800 mb-2.5 flex items-center justify-center">
                                    <Image src="/icon-192.png" alt="Progress Hub" width={20} height={20} className="rounded opacity-40" />
                                </div>
                                <span className="px-1.5 py-0.5 rounded text-[8px] lg:text-[9px] font-semibold bg-zinc-800 text-zinc-300">Member Project</span>
                                <h4 className="text-[10px] lg:text-[11px] font-semibold text-zinc-100 mt-1.5">Progress Hub</h4>
                                <p className="text-[8px] lg:text-[9px] text-zinc-500 line-clamp-1 mt-0.5">Platform manajemen kegiatan UKM.</p>
                                <div className="flex flex-wrap gap-1 mt-2">
                                    {['Laravel', 'React', 'Tailwind'].map((t) => (
                                        <span key={t} className="px-1.5 py-0.5 rounded text-[7px] lg:text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                                    ))}
                                </div>
                                <div className="flex items-center justify-between text-[8px] lg:text-[9px] text-zinc-600 mt-2.5 pt-2 border-t border-zinc-800/60">
                                    <span>oleh Ahmad F.</span>
                                    <span>4 weeks ago</span>
                                </div>
                            </div>
                        </div>

                        {/* Resources section */}
                        <div className="mt-5 lg:mt-6">
                            <div className="flex items-center justify-between mb-3">
                                <div className="flex items-center gap-1.5">
                                    <BookOpen className="size-3.5 text-zinc-400" />
                                    <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Repositori & Artikel</span>
                                </div>
                                <span className="text-[8px] lg:text-[9px] text-zinc-500 underline">Browse Semua</span>
                            </div>
                            <div className="grid grid-cols-1 gap-2 lg:gap-3">
                                {[
                                    { type: 'Modul', tags: ['JavaScript', 'React'], title: 'Modul Praktikum Web Dev', desc: 'Panduan lengkap belajar web development.', views: 342, time: '3 hari lalu' },
                                    { type: 'Artikel', tags: ['Career'], title: 'Tips Lolos Tech Interview', desc: 'Strategi untuk technical interview.', views: 218, time: '1 minggu lalu' },
                                ].map((resource) => (
                                    <div key={resource.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3 lg:p-4">
                                        <div className="flex items-center gap-1.5 mb-1.5">
                                            <span className="px-1.5 py-0.5 rounded text-[8px] lg:text-[9px] font-semibold bg-zinc-800 text-zinc-300">{resource.type}</span>
                                            {resource.tags.map((tag) => (
                                                <span key={tag} className="px-1.5 py-0.5 rounded text-[7px] lg:text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{tag}</span>
                                            ))}
                                        </div>
                                        <h4 className="text-[10px] lg:text-[11px] font-semibold text-zinc-100">{resource.title}</h4>
                                        <p className="text-[8px] lg:text-[9px] text-zinc-500 line-clamp-1 mt-0.5">{resource.desc}</p>
                                        <div className="flex items-center justify-between text-[8px] lg:text-[9px] text-zinc-600 mt-2 pt-2 border-t border-zinc-800/60">
                                            <span>{resource.time}</span>
                                            <span className="flex items-center gap-1"><Eye className="size-2.5 lg:size-3" /> {resource.views} views</span>
                                        </div>
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
