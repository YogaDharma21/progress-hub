import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
import Image from 'next/image'

export default function HeroDemo() {
    return (
        <>
            {/* Admin dashboard panel (left/behind) */}
            <div className="w-2/3 pt-6 lg:pt-16">
                <div className="bg-card relative overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                    <div className="bg-zinc-950">
                        {/* Navbar */}
                        <div className="flex items-center justify-between px-4 lg:px-5 py-3 border-b border-zinc-800/60">
                            <div className="flex items-center gap-2">
                                <Image src="/icon-192.png" alt="Progress Hub" width={18} height={18} className="rounded" />
                                <span className="text-[11px] font-semibold text-zinc-100">Progress Hub</span>
                                <span className="px-1.5 py-0.5 text-[8px] font-medium bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded">Admin</span>
                            </div>
                            <div className="hidden sm:flex items-center gap-5">
                                {['Events', 'Projects', 'Resources'].map((item) => (
                                    <span key={item} className="text-[10px] text-zinc-400">{item}</span>
                                ))}
                            </div>
                            <div className="flex items-center gap-2">
                                <div className="w-5 h-5 rounded-full bg-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-200">A</div>
                            </div>
                        </div>

                        <div className="p-4 lg:p-5">
                            <h3 className="text-sm lg:text-base font-bold text-zinc-100 tracking-tight">Dashboard</h3>
                            <p className="text-[9px] lg:text-[10px] text-zinc-500 mt-0.5">Ringkasan data Progress Hub.</p>

                            {/* Stats */}
                            <div className="grid grid-cols-4 gap-2 mt-3">
                                {[
                                    { label: 'Events', value: '4' },
                                    { label: 'Projects', value: '2' },
                                    { label: 'Resources', value: '2' },
                                    { label: 'Users', value: '8' },
                                ].map((stat) => (
                                    <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-xl p-2.5">
                                        <div className="text-sm font-bold text-zinc-100">{stat.value}</div>
                                        <div className="text-[8px] text-zinc-500">{stat.label}</div>
                                    </div>
                                ))}
                            </div>

                            {/* Chart + Activity */}
                            <div className="grid grid-cols-5 gap-3 mt-4">
                                <div className="col-span-3 bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                    <h4 className="text-[10px] font-semibold text-zinc-100 mb-2">Aktivitas 7 Hari</h4>
                                    <div className="flex items-end gap-1.5 h-20">
                                        {['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'].map((day, i) => (
                                            <div key={day} className="flex-1 flex flex-col items-center gap-1">
                                                <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '50px' }}>
                                                    {i === 6 ? (
                                                        <>
                                                            <div className="w-full rounded-t-sm bg-zinc-600" style={{ height: '60%', minHeight: '4px' }} />
                                                            <div className="w-full rounded-t-sm bg-zinc-500" style={{ height: '30%', minHeight: '4px' }} />
                                                        </>
                                                    ) : (
                                                        <div className="w-full h-px bg-zinc-800" />
                                                    )}
                                                </div>
                                                <span className="text-[7px] text-zinc-500">{day}</span>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                                <div className="col-span-2 bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                    <h4 className="text-[10px] font-semibold text-zinc-100 mb-2">Aktivitas Terbaru</h4>
                                    <div className="space-y-2">
                                        {[
                                            { type: 'Event', title: 'Hackathon Sprint', time: '2m' },
                                            { type: 'Project', title: 'Progress Hub', time: '1j' },
                                            { type: 'Resource', title: 'Modul React', time: '3h' },
                                        ].map((item, i) => (
                                            <div key={i} className="flex items-center gap-2">
                                                <div className="w-5 h-5 rounded bg-zinc-950 flex items-center justify-center shrink-0">
                                                    <div className="w-1.5 h-1.5 rounded-sm bg-zinc-600" />
                                                </div>
                                                <div className="min-w-0 flex-1">
                                                    <p className="text-[9px] text-zinc-100 font-medium truncate">{item.title}</p>
                                                    <p className="text-[7px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Member dashboard panel (right/front) */}
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
                        <h3 className="text-sm lg:text-base font-bold text-zinc-100 tracking-tight">Dashboard</h3>
                        <p className="text-[9px] lg:text-[10px] text-zinc-500 mt-0.5">Ringkasan Program Kerja, Proyek, dan Repositori Pembelajaran UKM</p>

                        {/* Stats */}
                        <div className="grid grid-cols-3 gap-2 mt-3">
                            {[
                                { icon: Calendar, label: 'Program Aktif', value: '4' },
                                { icon: FolderGit2, label: 'Proyek Showcase', value: '2' },
                                { icon: BookOpen, label: 'Artikel & Modul', value: '2' },
                            ].map((stat) => (
                                <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-xl p-2.5 lg:p-3 flex items-center gap-3">
                                    <div className="w-7 h-7 rounded-lg bg-zinc-950 flex items-center justify-center shrink-0">
                                        <stat.icon className="size-3.5 text-zinc-400" />
                                    </div>
                                    <div>
                                        <div className="text-sm lg:text-base font-bold text-zinc-100">{stat.value}</div>
                                        <div className="text-[8px] text-zinc-500">{stat.label}</div>
                                    </div>
                                </div>
                            ))}
                        </div>

                        {/* Program Kerja */}
                        <div className="mt-4 lg:mt-5">
                            <div className="flex items-center justify-between mb-3">
                                <div className="flex items-center gap-1.5">
                                    <Calendar className="size-3.5 text-zinc-400" />
                                    <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Program Kerja & Kegiatan</span>
                                </div>
                                <div className="flex gap-1">
                                    {['Semua', 'Kelas', 'Hackathon', 'Sharing'].map((tab, i) => (
                                        <div key={tab} className={`px-2 py-0.5 text-[8px] font-medium rounded ${i === 0 ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-600'}`}>{tab}</div>
                                    ))}
                                </div>
                            </div>
                            <div className="grid grid-cols-2 gap-2">
                                {[
                                    { title: 'Hackathon Sprint', desc: 'Build solutions in 48h.', status: 'Berlangsung', sc: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30', s: 8, pa: 24, av: ['A', 'R', '+12'] },
                                    { title: 'React Deep Dive', desc: 'Master React patterns.', status: 'Berlangsung', sc: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30', s: 4, pa: 18, av: ['M', 'S', '+8'] },
                                ].map((e) => (
                                    <div key={e.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                        <div className="flex items-start justify-between gap-2 mb-2">
                                            <div className="min-w-0 flex-1">
                                                <h4 className="text-[10px] font-semibold text-zinc-100 truncate">{e.title}</h4>
                                                <p className="text-[8px] text-zinc-500 mt-0.5 line-clamp-1">{e.desc}</p>
                                            </div>
                                            <span className={`shrink-0 px-2 py-0.5 rounded-full text-[8px] font-medium border ${e.sc}`}>{e.status}</span>
                                        </div>
                                        <div className="flex items-center justify-between text-[8px] text-zinc-500">
                                            <div className="flex items-center gap-2">
                                                <span className="flex items-center gap-1"><Clock className="size-2.5" /> {e.s} Pertemuan</span>
                                                <span className="flex items-center gap-1"><Users className="size-2.5" /> {e.pa} Peserta</span>
                                            </div>
                                            <div className="flex -space-x-1">
                                                {e.av.map((a, i) => (
                                                    <div key={i} className="w-4 h-4 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200">{a}</div>
                                                ))}
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>

                        {/* Projects */}
                        <div className="mt-4 lg:mt-5">
                            <div className="flex items-center justify-between mb-3">
                                <div className="flex items-center gap-1.5">
                                    <FolderGit2 className="size-3.5 text-zinc-400" />
                                    <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Portofolio & Proyek</span>
                                </div>
                                <span className="text-[8px] text-zinc-500 underline">Lihat Semua</span>
                            </div>
                            <div className="grid grid-cols-2 gap-2">
                                {[
                                    { title: 'Progress Hub', cat: 'UKM Project', desc: 'Platform manajemen UKM.', tech: ['Laravel', 'React'], creator: 'Ahmad F.', time: '2 hari lalu' },
                                    { title: 'Smart Attendance', cat: 'Member Project', desc: 'Sistem presensi QR code.', tech: ['Flutter', 'Firebase'], creator: 'Maya S.', time: '5 hari lalu' },
                                ].map((p) => (
                                    <div key={p.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                        <div className="w-full h-24 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-lg border border-zinc-800 mb-2 flex items-center justify-center">
                                            <Image src="/icon-192.png" alt="" width={20} height={20} className="rounded opacity-30" />
                                        </div>
                                        <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">{p.cat}</span>
                                        <h4 className="text-[10px] font-semibold text-zinc-100 mt-1">{p.title}</h4>
                                        <p className="text-[8px] text-zinc-500 line-clamp-1 mt-0.5">{p.desc}</p>
                                        <div className="flex flex-wrap gap-1 mt-1.5">
                                            {p.tech.map((t) => (
                                                <span key={t} className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                                            ))}
                                        </div>
                                        <div className="flex items-center justify-between text-[8px] text-zinc-600 mt-2 pt-1.5 border-t border-zinc-800/60">
                                            <span>oleh {p.creator}</span>
                                            <span>{p.time}</span>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>

                        {/* Resources */}
                        <div className="mt-4 lg:mt-5">
                            <div className="flex items-center justify-between mb-3">
                                <div className="flex items-center gap-1.5">
                                    <BookOpen className="size-3.5 text-zinc-400" />
                                    <span className="text-[11px] lg:text-xs font-semibold text-zinc-100">Repositori & Artikel</span>
                                </div>
                                <span className="text-[8px] text-zinc-500 underline">Browse Semua</span>
                            </div>
                            <div className="grid grid-cols-2 gap-2">
                                {[
                                    { type: 'Modul', tags: ['JavaScript'], title: 'Modul Web Dev', desc: 'Panduan belajar web dev.', views: 342, time: '3 hari lalu' },
                                    { type: 'Artikel', tags: ['Career'], title: 'Tips Tech Interview', desc: 'Strategi technical interview.', views: 218, time: '1 minggu lalu' },
                                ].map((r) => (
                                    <div key={r.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                        <div className="flex items-center gap-1 mb-1.5">
                                            <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">{r.type}</span>
                                            {r.tags.map((t) => (
                                                <span key={t} className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                                            ))}
                                        </div>
                                        <h4 className="text-[10px] font-semibold text-zinc-100">{r.title}</h4>
                                        <p className="text-[8px] text-zinc-500 line-clamp-1 mt-0.5">{r.desc}</p>
                                        <div className="flex items-center justify-between text-[8px] text-zinc-600 mt-2 pt-1.5 border-t border-zinc-800/60">
                                            <span>{r.time}</span>
                                            <span className="flex items-center gap-1"><Eye className="size-2.5" /> {r.views}</span>
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
