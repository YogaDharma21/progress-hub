'use client'

import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
import Image from 'next/image'
import { AnimatePresence, motion } from 'motion/react'
import { useRef } from 'react'
import { useDemoTick } from '@/hooks/use-demo-tick'
import { DEMO_ITEM_TRANSITION, demoWindow } from '@/lib/demo'

const adminActivity = [
    { type: 'Event', title: 'Hackathon Sprint', time: '2m' },
    { type: 'Project', title: 'Progress Hub', time: '1j' },
    { type: 'Resource', title: 'Modul React', time: '3h' },
    { type: 'Event', title: 'React Deep Dive', time: '5j' },
    { type: 'Project', title: 'Smart Attendance', time: '8j' },
    { type: 'User', title: 'Arief N.', time: '1h' },
]

const week = [
    { day: 'Min', primary: 26, secondary: 12 },
    { day: 'Sen', primary: 44, secondary: 16 },
    { day: 'Sel', primary: 32, secondary: 10 },
    { day: 'Rab', primary: 58, secondary: 20 },
    { day: 'Kam', primary: 36, secondary: 14 },
    { day: 'Jum', primary: 64, secondary: 22 },
    { day: 'Sab', primary: 48, secondary: 18 },
]

const programs = [
    { title: 'Hackathon Sprint', desc: 'Build solutions in 48h.', status: 'Berlangsung', statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30', sessions: 8, participants: 24, avatars: ['A', 'R', '+12'] },
    { title: 'React Deep Dive', desc: 'Master React patterns.', status: 'Berlangsung', statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30', sessions: 4, participants: 18, avatars: ['M', 'S', '+8'] },
    { title: 'UI/UX Design Sprint', desc: 'Rancang alur aplikasi kampus.', status: 'Registrasi', statusColor: 'bg-blue-500/10 text-blue-400 border-blue-500/30', sessions: 3, participants: 16, avatars: ['D', 'N', '+9'] },
    { title: 'Python for Data Science', desc: 'Analisis data dengan Python.', status: 'Mendatang', statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30', sessions: 6, participants: 32, avatars: ['P', 'L', '+15'] },
]

const projects = [
    { title: 'Progress Hub', cat: 'UKM Project', desc: 'Platform manajemen UKM.', tech: ['Laravel', 'React'], creator: 'Ahmad F.' },
    { title: 'Smart Attendance', cat: 'Member Project', desc: 'Sistem presensi QR code.', tech: ['Flutter', 'Firebase'], creator: 'Maya S.' },
    { title: 'Study Buddy', cat: 'Member Project', desc: 'Partner belajar antar anggota.', tech: ['Next.js', 'Supabase'], creator: 'Rizky P.' },
    { title: 'Eventku', cat: 'UKM Project', desc: 'Pendaftaran acara kampus.', tech: ['Laravel', 'Livewire'], creator: 'Dinda K.' },
]

const resources = [
    { type: 'Modul', tags: ['JavaScript'], title: 'Modul Web Dev', desc: 'Panduan belajar web dev.', views: 342 },
    { type: 'Artikel', tags: ['Career'], title: 'Tips Tech Interview', desc: 'Strategi technical interview.', views: 218 },
    { type: 'Tools', tags: ['Git'], title: 'Git & GitHub', desc: 'Alur kerja branch dan PR.', views: 176 },
    { type: 'Artikel', tags: ['CSS'], title: 'Design System Tailwind', desc: 'Token dan komponen konsisten.', views: 132 },
]

const uploaded = ['baru saja', '2 hari lalu']
const added = ['baru saja', '3 hari lalu']

function ProgramCards({ tick }: { tick: number }) {
    const visible = demoWindow(programs, tick, 2)

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <AnimatePresence initial={false} mode="popLayout">
                {visible.map((program) => (
                    <motion.div
                        key={program.title}
                        layout
                        initial={{ opacity: 0, y: -10, scale: 0.98 }}
                        animate={{ opacity: 1, y: 0, scale: 1 }}
                        exit={{ opacity: 0, y: 10, scale: 0.98 }}
                        transition={DEMO_ITEM_TRANSITION}
                        className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-3 transition-colors duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                        <div className="flex items-start justify-between gap-2 mb-2">
                            <div className="min-w-0 flex-1">
                                <h4 className="text-[10px] font-semibold text-zinc-100 truncate group-hover:text-white">{program.title}</h4>
                                <p className="text-[8px] text-zinc-500 mt-0.5 line-clamp-1">{program.desc}</p>
                            </div>
                            <span className={`shrink-0 px-2 py-0.5 rounded text-[8px] font-medium border transition-transform duration-200 group-hover:scale-105 ${program.statusColor}`}>{program.status}</span>
                        </div>
                        <div className="flex items-center justify-between text-[8px] text-zinc-500">
                            <div className="flex items-center gap-2">
                                <span className="flex items-center gap-1"><Clock className="size-2.5 transition-transform duration-200 group-hover:rotate-12" /> {program.sessions} Pertemuan</span>
                                <span className="flex items-center gap-1"><Users className="size-2.5 transition-transform duration-200 group-hover:scale-110" /> {program.participants} Peserta</span>
                            </div>
                            <div className="flex -space-x-1">
                                {program.avatars.map((a, i) => (
                                    <div key={i} className="w-4 h-4 rounded bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200 transition-transform duration-200 group-hover:-translate-y-0.5">{a}</div>
                                ))}
                            </div>
                        </div>
                    </motion.div>
                ))}
            </AnimatePresence>
        </div>
    )
}

function ProjectCards({ tick }: { tick: number }) {
    const visible = demoWindow(projects, tick, 2)

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <AnimatePresence initial={false} mode="popLayout">
                {visible.map((project, index) => (
                    <motion.div
                        key={project.title}
                        layout
                        initial={{ opacity: 0, y: -10, scale: 0.98 }}
                        animate={{ opacity: 1, y: 0, scale: 1 }}
                        exit={{ opacity: 0, y: 10, scale: 0.98 }}
                        transition={DEMO_ITEM_TRANSITION}
                        className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                        <div className="w-full h-24 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-lg border border-zinc-800 mb-2 flex items-center justify-center">
                            <Image src="/icon-192.png" alt="" width={20} height={20} className="rounded opacity-30" />
                        </div>
                        <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">{project.cat}</span>
                        <h4 className="text-[10px] font-semibold text-zinc-100 mt-1">{project.title}</h4>
                        <p className="text-[8px] text-zinc-500 line-clamp-1 mt-0.5">{project.desc}</p>
                        <div className="flex flex-wrap gap-1 mt-1.5">
                            {project.tech.map((t) => (
                                <span key={t} className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                            ))}
                        </div>
                        <div className="flex items-center justify-between text-[8px] text-zinc-600 mt-2 pt-1.5 border-t border-zinc-800/60">
                            <span>oleh {project.creator}</span>
                            <span>{uploaded[index] ?? '5 hari lalu'}</span>
                        </div>
                    </motion.div>
                ))}
            </AnimatePresence>
        </div>
    )
}

function ResourceCards({ tick }: { tick: number }) {
    const visible = demoWindow(resources, tick, 2)

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <AnimatePresence initial={false} mode="popLayout">
                {visible.map((resource, index) => (
                    <motion.div
                        key={resource.title}
                        layout
                        initial={{ opacity: 0, y: -10, scale: 0.98 }}
                        animate={{ opacity: 1, y: 0, scale: 1 }}
                        exit={{ opacity: 0, y: 10, scale: 0.98 }}
                        transition={DEMO_ITEM_TRANSITION}
                        className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                        <div className="flex items-center gap-1 mb-1.5">
                            <span className="px-1.5 py-0.5 rounded text-[8px] font-semibold bg-zinc-800 text-zinc-300">{resource.type}</span>
                            {resource.tags.map((t) => (
                                <span key={t} className="px-1 py-0.5 rounded text-[7px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                            ))}
                        </div>
                        <h4 className="text-[10px] font-semibold text-zinc-100">{resource.title}</h4>
                        <p className="text-[8px] text-zinc-500 line-clamp-1 mt-0.5">{resource.desc}</p>
                        <div className="flex items-center justify-between text-[8px] text-zinc-600 mt-2 pt-1.5 border-t border-zinc-800/60">
                            <span>{added[index] ?? '1 minggu lalu'}</span>
                            <span className="flex items-center gap-1"><Eye className="size-2.5" /> {resource.views + tick}</span>
                        </div>
                    </motion.div>
                ))}
            </AnimatePresence>
        </div>
    )
}

export default function HeroDemo() {
    const adminRef = useRef<HTMLDivElement>(null)
    const memberRef = useRef<HTMLDivElement>(null)
    const adminTick = useDemoTick(adminRef, 4200)
    const memberTick = useDemoTick(memberRef, 4200)
    const adminFeed = demoWindow(adminActivity, adminTick, 3)

    return (
        <>
            {/* Admin dashboard panel (left/behind) */}
            <div ref={adminRef} className="hidden md:block w-2/3 pt-6 lg:pt-16">
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
                                <div className="w-5 h-5 rounded bg-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-200">A</div>
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
                                    <div key={stat.label} className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-2.5 transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                                        <div className="text-sm font-bold text-zinc-100 group-hover:text-white">{stat.value}</div>
                                        <div className="text-[8px] text-zinc-500">{stat.label}</div>
                                    </div>
                                ))}
                            </div>

                            {/* Chart + Activity */}
                            <div className="grid grid-cols-5 gap-3 mt-4">
                                <div className="col-span-3 bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                    <h4 className="text-[10px] font-semibold text-zinc-100 mb-2">Aktivitas 7 Hari</h4>
                                    <div className="flex items-end gap-1.5 h-20">
                                        {week.map((day, i) => {
                                            const primary = i === week.length - 1 ? Math.min(88, day.primary + adminTick * 5) : day.primary

                                            return (
                                                <div key={day.day} className="flex-1 flex flex-col items-center gap-1">
                                                    <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '50px' }}>
                                                        <motion.div
                                                            className="w-full rounded-t-sm bg-zinc-600"
                                                            animate={{ height: `${primary}%` }}
                                                            transition={{ duration: 0.6, ease: 'easeOut' }}
                                                            style={{ minHeight: '4px' }}
                                                        />
                                                        <motion.div
                                                            className="w-full rounded-t-sm bg-zinc-500"
                                                            animate={{ height: `${day.secondary}%` }}
                                                            transition={{ duration: 0.6, ease: 'easeOut' }}
                                                            style={{ minHeight: '4px' }}
                                                        />
                                                    </div>
                                                    <span className="text-[7px] text-zinc-500">{day.day}</span>
                                                </div>
                                            )
                                        })}
                                    </div>
                                </div>
                                <div className="col-span-2 bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                                    <h4 className="text-[10px] font-semibold text-zinc-100 mb-2">Aktivitas Terbaru</h4>
                                    <div className="space-y-2">
                                        <AnimatePresence initial={false} mode="popLayout">
                                            {adminFeed.map((item) => (
                                                <motion.div
                                                    key={`${item.type}-${item.title}`}
                                                    layout
                                                    initial={{ opacity: 0, y: -8, scale: 0.98 }}
                                                    animate={{ opacity: 1, y: 0, scale: 1 }}
                                                    exit={{ opacity: 0, y: 8, scale: 0.98 }}
                                                    transition={DEMO_ITEM_TRANSITION}
                                                    className="flex items-center gap-2">
                                                    <div className="w-5 h-5 rounded bg-zinc-950 flex items-center justify-center shrink-0">
                                                        <div className="w-1.5 h-1.5 rounded-sm bg-zinc-600" />
                                                    </div>
                                                    <div className="min-w-0 flex-1">
                                                        <p className="text-[9px] text-zinc-100 font-medium truncate">{item.title}</p>
                                                        <p className="text-[7px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                                    </div>
                                                </motion.div>
                                            ))}
                                        </AnimatePresence>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Member dashboard panel (right/front) */}
            <div ref={memberRef} className="bg-card relative h-full w-full max-w-sm sm:max-w-md md:w-2/3 overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                <div className="bg-zinc-950 min-h-[360px] sm:min-h-[400px] lg:min-h-[420px]">
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
                            <div className="w-5 h-5 rounded bg-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-200">M</div>
                        </div>
                    </div>

                    <div className="p-4 lg:p-5">
                        <h3 className="text-sm lg:text-base font-bold text-zinc-100 tracking-tight">Dashboard</h3>
                        <p className="text-[9px] lg:text-[10px] text-zinc-500 mt-0.5">Ringkasan Program Kerja, Proyek, dan Repositori Pembelajaran UKM</p>

                        {/* Stats */}
                        <div className="grid grid-cols-3 gap-1.5 sm:gap-2 mt-3">
                            {[
                                { icon: Calendar, label: 'Program Aktif', value: String(programs.length) },
                                { icon: FolderGit2, label: 'Proyek Showcase', value: String(projects.length) },
                                { icon: BookOpen, label: 'Artikel & Modul', value: String(resources.length) },
                            ].map((stat) => (
                                <div key={stat.label} className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-2 sm:p-2.5 lg:p-3 flex items-center gap-2 sm:gap-3 transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                                    <div className="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-zinc-950 flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110">
                                        <stat.icon className="size-3 sm:size-3.5 text-zinc-400 group-hover:text-zinc-200" />
                                    </div>
                                    <div className="min-w-0">
                                        <div className="text-xs sm:text-sm lg:text-base font-bold text-zinc-100 group-hover:text-white">{stat.value}</div>
                                        <div className="text-[7px] sm:text-[8px] text-zinc-500 truncate">{stat.label}</div>
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
                                        <div key={tab} className={`px-2 py-0.5 text-[8px] font-medium rounded transition-all duration-150 cursor-pointer ${i === 0 ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-600 hover:text-zinc-300'}`}>{tab}</div>
                                    ))}
                                </div>
                            </div>
                            <ProgramCards tick={memberTick} />
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
                            <ProjectCards tick={Math.floor(memberTick / 2)} />
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
                            <ResourceCards tick={Math.floor(memberTick / 3)} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
