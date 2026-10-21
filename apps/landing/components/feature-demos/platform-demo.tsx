'use client'

import { Calendar, FolderGit2, BookOpen } from 'lucide-react'
import { AnimatePresence, motion } from 'motion/react'
import { useRef } from 'react'
import { useDemoTick } from '@/hooks/use-demo-tick'
import { DEMO_ITEM_TRANSITION, countIntroduced, demoWindow } from '@/lib/demo'

type StatKey = 'program' | 'projects' | 'articles'

const activity = [
    { user: 'Arief N.', action: 'bergabung ke', target: 'Hackathon Code Sprint', stat: 'program' as const },
    { user: 'Maya S.', action: 'mengunggah proyek', target: 'Smart Attendance', stat: 'projects' as const },
    { user: 'Rizky P.', action: 'menulis artikel', target: 'React Best Practices', stat: 'articles' as const },
    { user: 'Dinda K.', action: 'mendaftar kelas', target: 'React Deep Dive', stat: 'program' as const },
    { user: 'Bagas W.', action: 'mengunggah proyek', target: 'Portofolio Kit', stat: 'projects' as const },
    { user: 'Sinta A.', action: 'membagikan modul', target: 'Git & GitHub', stat: 'articles' as const },
]

const stats: { icon: typeof Calendar; label: string; base: number; key: StatKey }[] = [
    { icon: Calendar, label: 'Program Aktif', base: 12, key: 'program' },
    { icon: FolderGit2, label: 'Proyek Showcase', base: 28, key: 'projects' },
    { icon: BookOpen, label: 'Artikel & Modul', base: 45, key: 'articles' },
]

const times = ['baru saja', '2m lalu', '15m lalu']

export default function PlatformDemo() {
    const panelRef = useRef<HTMLDivElement>(null)
    const tick = useDemoTick(panelRef, 2400)
    const visible = demoWindow(activity, tick, 3)

    return (
        <div ref={panelRef} className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-3.5 sm:p-5 w-full">
            <div className="flex items-center justify-between mb-4">
                <h4 className="text-xs font-semibold text-zinc-100">Dashboard</h4>
                <span className="text-[9px] text-zinc-600">UKM Progress</span>
            </div>
            <div className="grid grid-cols-3 gap-1.5 sm:gap-2 mb-3 sm:mb-4">
                {stats.map((stat) => (
                    <div
                        key={stat.label}
                        className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-2 sm:p-3 transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-1 hover:shadow-md hover:shadow-black/20 active:scale-95 cursor-pointer">
                        <div className="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-zinc-950 flex items-center justify-center mb-1.5 sm:mb-2 transition-transform duration-200 group-hover:scale-110 group-hover:rotate-6">
                            <stat.icon className="size-3 sm:size-3.5 text-zinc-400 transition-colors group-hover:text-zinc-200" />
                        </div>
                        <div className="text-sm sm:text-base font-bold text-zinc-100 group-hover:text-white">
                            {stat.base + countIntroduced(activity, tick, (item) => item.stat === stat.key)}
                        </div>
                        <div className="text-[7px] sm:text-[9px] text-zinc-500 truncate">{stat.label}</div>
                    </div>
                ))}
            </div>
            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-3 sm:p-3.5">
                <h5 className="text-[10px] font-semibold text-zinc-400 mb-2.5">Aktivitas Terkini</h5>
                <div className="flex flex-col gap-2 sm:gap-2.5">
                    <AnimatePresence initial={false} mode="popLayout">
                        {visible.map((item, index) => (
                            <motion.div
                                key={`${item.user}-${item.target}`}
                                layout
                                initial={{ opacity: 0, y: -10, scale: 0.98 }}
                                animate={{ opacity: 1, y: 0, scale: 1 }}
                                exit={{ opacity: 0, y: 10, scale: 0.98 }}
                                transition={DEMO_ITEM_TRANSITION}
                                className="group flex items-start gap-2 p-1 -m-1 rounded-lg transition-colors hover:bg-zinc-800/40">
                                <div className="w-5 h-5 rounded bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-300 shrink-0 mt-0.5 transition-transform duration-200 group-hover:scale-110">
                                    {item.user[0]}
                                </div>
                                <div className="min-w-0 flex-1">
                                    <p className="text-[10px] text-zinc-400 leading-relaxed">
                                        <span className="text-zinc-200 font-medium">{item.user}</span>{' '}
                                        {item.action}{' '}
                                        <span className="text-zinc-200 font-medium">{item.target}</span>
                                    </p>
                                    <p className="text-[9px] text-zinc-600 mt-0.5">{times[index] ?? '1j lalu'}</p>
                                </div>
                            </motion.div>
                        ))}
                    </AnimatePresence>
                </div>
            </div>
        </div>
    )
}
