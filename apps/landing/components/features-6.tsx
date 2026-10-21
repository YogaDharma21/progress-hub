'use client'

import { Calendar, FolderGit2, BookOpen, Clock, Users, Eye } from 'lucide-react'
import Image from 'next/image'
import { AnimatePresence, motion } from 'motion/react'
import { useRef } from 'react'
import { useDemoTick } from '@/hooks/use-demo-tick'
import { AnimatedNumber } from '@/components/ui/animated-number'
import { DEMO_CONTENT_TRANSITION, DEMO_ITEM_TRANSITION, demoStat, demoWindow } from '@/lib/demo'

const events = [
    {
        title: 'Hackathon Code Sprint',
        description: 'Build innovative solutions in 48 hours.',
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        sessions: 8,
        participants: 24,
        avatars: ['A', 'R', '+12'],
    },
    {
        title: 'React Deep Dive',
        description: 'Master advanced React patterns.',
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        sessions: 4,
        participants: 18,
        avatars: ['M', 'S', '+8'],
    },
    {
        title: 'Sharing Session: CI/CD',
        description: 'Learn CI/CD pipelines with GitHub Actions.',
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        sessions: 2,
        participants: 12,
        avatars: ['K', 'D', '+5'],
    },
    {
        title: 'Python for Data Science',
        description: 'Introduction to data analysis with Python.',
        status: 'Registrasi',
        statusColor: 'bg-blue-500/10 text-blue-400 border-blue-500/30',
        sessions: 6,
        participants: 32,
        avatars: ['P', 'L', '+15'],
    },
    {
        title: 'UI/UX Design Sprint',
        description: 'Rancang alur dan tampilan aplikasi kampus.',
        status: 'Registrasi',
        statusColor: 'bg-blue-500/10 text-blue-400 border-blue-500/30',
        sessions: 3,
        participants: 16,
        avatars: ['D', 'N', '+9'],
    },
    {
        title: 'Git & GitHub Workshop',
        description: 'Alur branch, commit, dan pull request dari nol.',
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        sessions: 2,
        participants: 26,
        avatars: ['G', 'H', '+14'],
    },
    {
        title: 'Sharing Session: Karier',
        description: 'Cerita alumni soal magang dan interview.',
        status: 'Berlangsung',
        statusColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
        sessions: 1,
        participants: 21,
        avatars: ['F', 'T', '+11'],
    },
    {
        title: 'Data Science Bootcamp',
        description: 'Empat pekan belajar pandas dan visualisasi data.',
        status: 'Mendatang',
        statusColor: 'bg-amber-500/10 text-amber-400 border-amber-500/30',
        sessions: 8,
        participants: 28,
        avatars: ['S', 'B', '+13'],
    },
]

const projectPool = [
    { title: 'Progress Hub', category: 'Web App', description: 'Platform manajemen kegiatan UKM.', tech: ['Laravel', 'React', 'Tailwind'], creator: 'Arief N.', gradient: 'from-emerald-500/20 to-teal-500/20' },
    { title: 'Smart Attendance', category: 'Mobile', description: 'Sistem presensi QR code untuk kegiatan UKM.', tech: ['Flutter', 'Firebase'], creator: 'Maya S.', gradient: 'from-sky-500/20 to-cyan-500/20' },
    { title: 'Study Buddy', category: 'Web App', description: 'Partner belajar dan jadwal sesi anggota.', tech: ['Next.js', 'Supabase'], creator: 'Rizky P.', gradient: 'from-violet-500/20 to-fuchsia-500/20' },
    { title: 'Eventku', category: 'Web App', description: 'Pendaftaran acara kampus dalam satu dashboard.', tech: ['Laravel', 'Livewire'], creator: 'Dinda K.', gradient: 'from-amber-500/20 to-orange-500/20' },
]

const resourcePool = [
    { type: 'Modul', tags: ['JavaScript', 'React'], title: 'Modul Praktikum Web Dev', description: 'Panduan lengkap belajar web development dari dasar hingga mahir.', views: 342 },
    { type: 'Artikel', tags: ['Career'], title: 'Tips Lolos Tech Interview', description: 'Strategi dan tips menghadapi technical interview.', views: 218 },
    { type: 'Tools', tags: ['DevOps'], title: 'Setup Docker untuk Development', description: 'Konfigurasi Docker di environment lokal.', views: 89 },
]

const activity = [
    { user: 'Arief N.', action: 'bergabung', target: 'Hackathon Sprint' },
    { user: 'Maya S.', action: 'mengunggah', target: 'Smart Attendance' },
    { user: 'Rizky P.', action: 'menulis', target: 'React Best Practices' },
    { user: 'Dinda K.', action: 'mendaftar', target: 'React Deep Dive' },
    { user: 'Bagas W.', action: 'mengunggah', target: 'Portofolio Kit' },
    { user: 'Sinta A.', action: 'membagikan', target: 'Git & GitHub' },
]

const overlayActivity = [
    { type: 'Event', title: 'Hackathon Sprint', time: '2m lalu' },
    { type: 'Project', title: 'Progress Hub', time: '1j lalu' },
    { type: 'Resource', title: 'Modul React', time: '3 hari lalu' },
    { type: 'Event', title: 'React Deep Dive', time: '5 hari lalu' },
    { type: 'Project', title: 'Smart Attendance', time: '1 minggu lalu' },
]

const week = [
    { day: 'Min', primary: 24, secondary: 10 },
    { day: 'Sen', primary: 42, secondary: 16 },
    { day: 'Sel', primary: 30, secondary: 12 },
    { day: 'Rab', primary: 56, secondary: 20 },
    { day: 'Kam', primary: 34, secondary: 14 },
    { day: 'Jum', primary: 62, secondary: 20 },
    { day: 'Sab', primary: 50, secondary: 18 },
]

const activityTimes = ['baru saja', '2m lalu', '15m lalu']

function FeaturedProject({ tick }: { tick: number }) {
    const project = projectPool[tick % projectPool.length]!

    return (
        <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4 overflow-hidden">
            <AnimatePresence initial={false} mode="wait">
                <motion.div
                    key={project.title}
                    initial={{ opacity: 0, y: -8 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: 8 }}
                    transition={DEMO_CONTENT_TRANSITION}>
                    <div className={`w-full h-32 bg-gradient-to-br ${project.gradient} rounded-lg border border-zinc-800 mb-3 flex items-center justify-center overflow-hidden`}>
                        <Image src="/icon-192.png" alt="" width={24} height={24} className="rounded opacity-30" />
                    </div>
                    <span className="inline-block px-2 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300">{project.category}</span>
                    <h4 className="text-[11px] font-semibold text-zinc-100 mt-1.5">{project.title}</h4>
                    <p className="text-[9px] text-zinc-500 line-clamp-1 mt-0.5">{project.description}</p>
                    <div className="flex flex-wrap gap-1 mt-2">
                        {project.tech.map((t) => (
                            <span key={t} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{t}</span>
                        ))}
                    </div>
                    <div className="flex items-center justify-between text-[9px] text-zinc-600 mt-3 pt-2 border-t border-zinc-800/60">
                        <span>oleh {project.creator}</span>
                        <span>baru saja</span>
                    </div>
                </motion.div>
            </AnimatePresence>
        </div>
    )
}

function FeaturedResource({ tick }: { tick: number }) {
    const resource = resourcePool[tick % resourcePool.length]!

    return (
        <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4 overflow-hidden">
            <AnimatePresence initial={false} mode="wait">
                <motion.div
                    key={resource.title}
                    initial={{ opacity: 0, y: -8 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: 8 }}
                    transition={DEMO_CONTENT_TRANSITION}>
                    <div className="flex items-center gap-1.5 mb-2">
                        <span className="px-2 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300">{resource.type}</span>
                        {resource.tags.map((tag) => (
                            <span key={tag} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">{tag}</span>
                        ))}
                    </div>
                    <h4 className="text-[11px] font-semibold text-zinc-100">{resource.title}</h4>
                    <p className="text-[9px] text-zinc-500 line-clamp-2 mt-1">{resource.description}</p>
                    <div className="flex items-center justify-between text-[9px] text-zinc-600 mt-3 pt-2 border-t border-zinc-800/60">
                        <span>baru saja</span>
                        <span className="flex items-center gap-1"><Eye className="size-3" /> {resource.views + tick} views</span>
                    </div>
                </motion.div>
            </AnimatePresence>
        </div>
    )
}

export default function FeaturesSection() {
    const sectionRef = useRef<HTMLDivElement>(null)
    const tick = useDemoTick(sectionRef, 3000)
    const visibleEvents = demoWindow(events, tick, 4)
    const visibleActivity = demoWindow(activity, tick, 2)
    const visibleOverlay = demoWindow(overlayActivity, tick + 1, 3)

    return (
        <section ref={sectionRef} className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl space-y-12 px-6">
                <h2 data-reveal className="text-muted-foreground relative z-10 max-w-4xl text-balance text-4xl font-medium tracking-tight lg:text-5xl">
                    <span className="text-foreground">Dukung developer UKM Progress jadi lebih keren.</span> <br /> Program, proyek, dan ilmu baru, semua ada di sini.
                </h2>
                <div className="relative mx-auto max-w-4xl">
                    <div className="mask-radial-at-top-left mask-radial-from-65% mask-radial-[100%_60%] z-1 absolute inset-3 size-64 rounded-tl-3xl border-l border-t md:size-96 lg:inset-4"></div>

                    {/* Main dashboard panel */}
                    <div data-reveal className="relative z-10 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 lg:p-6 shadow-2xl shadow-black/40">
                        <div className="flex items-center gap-2 mb-5">
                            <Calendar className="size-4 text-zinc-400" />
                            <span className="text-xs font-semibold text-zinc-100">Program & Kegiatan</span>
                        </div>
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 mb-5">
                            <AnimatePresence initial={false} mode="popLayout">
                                {visibleEvents.map((event) => (
                                    <motion.div
                                        key={event.title}
                                        layout
                                        initial={{ opacity: 0, y: -12, scale: 0.98 }}
                                        animate={{ opacity: 1, y: 0, scale: 1 }}
                                        exit={{ opacity: 0, y: 12, scale: 0.98 }}
                                        transition={DEMO_ITEM_TRANSITION}
                                        className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-4 transition-colors duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-1 hover:shadow-lg hover:shadow-black/20 active:scale-[0.98] cursor-pointer">
                                        <div className="flex items-start justify-between gap-2 mb-2.5">
                                            <div className="min-w-0 flex-1">
                                                <h4 className="text-[11px] font-semibold text-zinc-100 truncate group-hover:text-white transition-colors">{event.title}</h4>
                                                <p className="text-[9px] text-zinc-500 mt-0.5 line-clamp-1">{event.description}</p>
                                            </div>
                                            <span className={`shrink-0 px-2 py-0.5 rounded text-[9px] font-medium border transition-transform duration-200 group-hover:scale-105 ${event.statusColor}`}>
                                                {event.status}
                                            </span>
                                        </div>
                                        <div className="flex items-center justify-between text-[9px] text-zinc-500">
                                            <div className="flex items-center gap-3">
                                                <span className="flex items-center gap-1"><Clock className="size-3 transition-transform duration-200 group-hover:rotate-12" /> {event.sessions} Pertemuan</span>
                                                <span className="flex items-center gap-1"><Users className="size-3 transition-transform duration-200 group-hover:scale-110" /> {event.participants} Peserta</span>
                                            </div>
                                            <div className="flex -space-x-1">
                                                {event.avatars.map((a, i) => (
                                                    <div key={i} className="w-5 h-5 rounded bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] font-semibold text-zinc-200 transition-transform duration-200 group-hover:-translate-y-0.5">{a}</div>
                                                ))}
                                            </div>
                                        </div>
                                    </motion.div>
                                ))}
                            </AnimatePresence>
                        </div>

                        {/* Bottom row: projects + resources + stats */}
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-4">
                            <FeaturedProject tick={tick} />
                            <FeaturedResource tick={tick} />
                            {/* Stats + activity */}
                            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                                <div className="grid grid-cols-3 gap-2 mb-3">
                                    {[
                                        { icon: Calendar, label: 'Program', base: 12, phase: 0 },
                                        { icon: FolderGit2, label: 'Proyek', base: 28, phase: 1.5 },
                                        { icon: BookOpen, label: 'Modul', base: 45, phase: 3 },
                                    ].map((stat) => (
                                        <div key={stat.label} className="group bg-zinc-950 border border-zinc-800 hover:border-zinc-700 rounded-lg p-2 text-center transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-0.5 hover:shadow-sm active:scale-95 cursor-pointer">
                                            <stat.icon className="size-3 text-zinc-500 mx-auto mb-1 transition-transform duration-200 group-hover:scale-125 group-hover:rotate-6 group-hover:text-zinc-300" />
                                            <AnimatedNumber value={demoStat(stat.base, tick, stat.phase)} className="text-xs font-bold text-zinc-100 group-hover:text-white" />
                                            <div className="text-[7px] text-zinc-600">{stat.label}</div>
                                        </div>
                                    ))}
                                </div>
                                <div className="flex flex-col gap-2">
                                    <AnimatePresence initial={false} mode="popLayout">
                                        {visibleActivity.map((item, index) => (
                                            <motion.div
                                                key={`${item.user}-${item.target}`}
                                                layout
                                                initial={{ opacity: 0, y: -8, scale: 0.98 }}
                                                animate={{ opacity: 1, y: 0, scale: 1 }}
                                                exit={{ opacity: 0, y: 8, scale: 0.98 }}
                                                transition={DEMO_ITEM_TRANSITION}
                                                className="flex items-center gap-2">
                                                <div className="w-5 h-5 rounded bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-300 shrink-0">{item.user[0]}</div>
                                                <p className="text-[9px] text-zinc-500 min-w-0 flex-1">
                                                    <span className="text-zinc-300 font-medium">{item.user}</span>{' '}
                                                    <span className="text-zinc-600">{item.action}</span>{' '}
                                                    <span className="text-zinc-300 font-medium">{item.target}</span>
                                                </p>
                                                <span className="text-[8px] text-zinc-600 shrink-0">{activityTimes[index] ?? '1j lalu'}</span>
                                            </motion.div>
                                        ))}
                                    </AnimatePresence>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Overlapping dashboard card */}
                    <div data-reveal className="hidden sm:block absolute -bottom-8 right-0 sm:-right-4 lg:-bottom-12 lg:-right-8 z-20 w-64 lg:w-80 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-4 lg:p-5 shadow-2xl shadow-black/50">
                        {/* Stats */}
                        <div className="grid grid-cols-4 gap-2 mb-3">
                            {[
                                { label: 'Events', value: demoStat(4, tick, 0) },
                                { label: 'Projects', value: demoStat(2, tick, 1.5) },
                                { label: 'Resources', value: demoStat(2, tick, 3) },
                                { label: 'Users', value: demoStat(8, tick, 4.5) },
                            ].map((metric) => (
                                <div key={metric.label} className="bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-lg p-2 transition-all duration-200 hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                                    <AnimatedNumber value={metric.value} className="text-xs font-bold text-zinc-100" />
                                    <div className="text-[7px] text-zinc-500">{metric.label}</div>
                                </div>
                            ))}
                        </div>
                        {/* Chart */}
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 mb-3">
                            <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-200">Aktivitas 7 Hari</span>
                            <div className="flex items-end gap-1 h-12 mt-2">
                                {week.map((day, index) => {
                                    const primary = index === week.length - 1 ? day.primary + Math.round((Math.sin(tick * 0.9) + 1) * 9) : day.primary

                                    return (
                                        <div key={day.day} className="flex-1 flex flex-col items-center">
                                            <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '36px' }}>
                                                <motion.div
                                                    className="w-full rounded-t-sm bg-zinc-700"
                                                    animate={{ height: `${primary}%` }}
                                                    transition={{ duration: 0.6, ease: 'easeOut' }}
                                                    style={{ minHeight: '3px' }}
                                                />
                                                <motion.div
                                                    className="w-full rounded-t-sm bg-zinc-600"
                                                    animate={{ height: `${day.secondary}%` }}
                                                    transition={{ duration: 0.6, ease: 'easeOut' }}
                                                    style={{ minHeight: '3px' }}
                                                />
                                            </div>
                                            <span className="text-[6px] text-zinc-600 mt-1">{day.day}</span>
                                        </div>
                                    )
                                })}
                            </div>
                        </div>
                        {/* Activity */}
                        <div className="flex flex-col gap-1.5">
                            <AnimatePresence initial={false} mode="popLayout">
                                {visibleOverlay.map((item) => (
                                    <motion.div
                                        key={`${item.type}-${item.title}`}
                                        layout
                                        initial={{ opacity: 0, y: -8, scale: 0.98 }}
                                        animate={{ opacity: 1, y: 0, scale: 1 }}
                                        exit={{ opacity: 0, y: 8, scale: 0.98 }}
                                        transition={DEMO_ITEM_TRANSITION}
                                        className="flex items-center gap-2">
                                        <div className="w-4 h-4 rounded bg-zinc-900 border border-zinc-800 flex items-center justify-center shrink-0">
                                            <div className="w-1.5 h-1.5 rounded-sm bg-zinc-600" />
                                        </div>
                                        <div className="min-w-0 flex-1">
                                            <p className="text-[8px] text-zinc-100 font-medium truncate">{item.title}</p>
                                            <p className="text-[6px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                        </div>
                                    </motion.div>
                                ))}
                            </AnimatePresence>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
