'use client'

import { Eye } from 'lucide-react'
import { AnimatePresence, motion } from 'motion/react'
import { useRef, useState } from 'react'
import { useDemoTick } from '@/hooks/use-demo-tick'
import { DEMO_ITEM_TRANSITION, demoWindow } from '@/lib/demo'

const tabs = ['Semua', 'Modul', 'Artikel', 'Tools'] as const
type Tab = (typeof tabs)[number]

// Categories alternate so a filtered tab always has something to show.
const resources = [
    {
        type: 'Modul',
        tags: ['JavaScript', 'React'],
        title: 'Modul Praktikum Web Development',
        description: 'Panduan lengkap belajar web development dari dasar hingga mahir.',
        views: 342,
    },
    {
        type: 'Artikel',
        tags: ['Career'],
        title: 'Tips Lolos Tech Interview di Perusahaan Tech',
        description: 'Strategi dan tips untuk menghadapi technical interview.',
        views: 218,
    },
    {
        type: 'Modul',
        tags: ['Python', 'Data'],
        title: 'Pengenalan Data Science dengan Python',
        description: 'Dasar-dasar data science menggunakan Python dan pandas.',
        views: 156,
    },
    {
        type: 'Tools',
        tags: ['DevOps'],
        title: 'Setup Docker untuk Development',
        description: 'Panduan konfigurasi Docker di environment lokal.',
        views: 89,
    },
    {
        type: 'Modul',
        tags: ['Algoritma'],
        title: 'Algoritma & Struktur Data Dasar',
        description: 'Latihan soal dan pembahasan struktur data untuk pemula.',
        views: 264,
    },
    {
        type: 'Artikel',
        tags: ['CSS', 'UI'],
        title: 'Membangun Design System dengan Tailwind',
        description: 'Cara menyusun token, komponen, dan variasi yang konsisten.',
        views: 132,
    },
    {
        type: 'Modul',
        tags: ['Git'],
        title: 'Git & GitHub untuk Pemula',
        description: 'Alur kerja branch, commit, dan pull request dari nol.',
        views: 301,
    },
    {
        type: 'Tools',
        tags: ['Testing'],
        title: 'Setup Playwright untuk E2E Testing',
        description: 'Konfigurasi browser test dan CI dalam satu repo.',
        views: 97,
    },
]

// Newest card first, so the relative label follows the slot, not the resource.
const added = ['baru saja', '3 hari lalu', '1 minggu lalu', '2 minggu lalu']

export default function ResourceCardDemo() {
    const [activeTab, setActiveTab] = useState<Tab>('Semua')
    const panelRef = useRef<HTMLDivElement>(null)
    const tick = useDemoTick(panelRef, 3200)

    const visible = demoWindow(resources, tick, 4)
    const filtered = activeTab === 'Semua' ? visible : visible.filter((resource) => resource.type === activeTab)

    return (
        <div ref={panelRef} className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-3.5 sm:p-5 w-full">
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
            <div className="flex flex-col gap-2.5">
                <AnimatePresence initial={false} mode="popLayout">
                    {filtered.map((resource, index) => (
                        <motion.div
                            key={resource.title}
                            layout
                            initial={{ opacity: 0, y: -12, scale: 0.98 }}
                            animate={{ opacity: 1, y: 0, scale: 1 }}
                            exit={{ opacity: 0, y: 12, scale: 0.98 }}
                            transition={DEMO_ITEM_TRANSITION}
                            className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-3 sm:p-3.5 transition-colors duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-1 hover:shadow-lg hover:shadow-black/20 active:scale-[0.98] cursor-pointer">
                            <div className="flex items-center gap-1.5 mb-1.5">
                                <span className="px-1.5 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300 transition-transform duration-200 group-hover:scale-105">
                                    {resource.type}
                                </span>
                                {resource.tags.map((tag) => (
                                    <span key={tag} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800 transition-colors group-hover:border-zinc-700">
                                        {tag}
                                    </span>
                                ))}
                            </div>
                            <h4 className="text-xs font-semibold text-zinc-100 group-hover:text-white transition-colors">{resource.title}</h4>
                            <p className="text-[10px] text-zinc-500 line-clamp-1 mt-0.5">{resource.description}</p>
                            <div className="flex items-center justify-between text-[10px] text-zinc-600 mt-2 pt-2 border-t border-zinc-800/60">
                                <span>{added[index] ?? '3 minggu lalu'}</span>
                                <span className="flex items-center gap-1">
                                    <Eye className="size-3 transition-transform duration-200 group-hover:scale-110" />
                                    {resource.views + tick} views
                                </span>
                            </div>
                        </motion.div>
                    ))}
                </AnimatePresence>
                {filtered.length === 0 && (
                    <div className="text-center text-[11px] text-zinc-600 py-6">Belum ada resource di kategori ini.</div>
                )}
            </div>
        </div>
    )
}
