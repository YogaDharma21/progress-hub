'use client'

import { Eye } from 'lucide-react'
import { useState } from 'react'

const tabs = ['Semua', 'Modul', 'Artikel', 'Tools'] as const
type Tab = (typeof tabs)[number]

const resources = [
    {
        type: 'Modul',
        tags: ['JavaScript', 'React'],
        title: 'Modul Praktikum Web Development',
        description: 'Panduan lengkap belajar web development dari dasar hingga mahir.',
        views: 342,
        time: '3 hari lalu',
    },
    {
        type: 'Artikel',
        tags: ['Career'],
        title: 'Tips Lolos Tech Interview di Perusahaan Tech',
        description: 'Strategi dan tips untuk menghadapi technical interview.',
        views: 218,
        time: '1 minggu lalu',
    },
    {
        type: 'Modul',
        tags: ['Python', 'Data'],
        title: 'Pengenalan Data Science dengan Python',
        description: 'Dasar-dasar data science menggunakan Python dan pandas.',
        views: 156,
        time: '2 minggu lalu',
    },
    {
        type: 'Tools',
        tags: ['DevOps'],
        title: 'Setup Docker untuk Development',
        description: 'Panduan konfigurasi Docker di environment lokal.',
        views: 89,
        time: '3 minggu lalu',
    },
]

export default function ResourceCardDemo() {
    const [activeTab, setActiveTab] = useState<Tab>('Semua')
    const filtered = activeTab === 'Semua' ? resources : resources.filter((r) => r.type === activeTab)

    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-3.5 sm:p-5 w-full max-w-md">
            <div className="flex flex-wrap gap-1 sm:gap-1.5 mb-4">
                {tabs.map((tab) => (
                    <button
                        key={tab}
                        onClick={() => setActiveTab(tab)}
                        className={`px-2.5 py-1 text-[10px] font-medium rounded-md transition-colors cursor-pointer ${activeTab === tab ? 'bg-zinc-800 text-zinc-100' : 'text-zinc-500 hover:text-zinc-300'}`}>
                        {tab}
                    </button>
                ))}
            </div>
            <div className="space-y-2.5">
                {filtered.map((resource) => (
                    <div key={resource.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3 sm:p-3.5">
                        <div className="flex items-center gap-1.5 mb-1.5">
                            <span className="px-1.5 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300">
                                {resource.type}
                            </span>
                            {resource.tags.map((tag) => (
                                <span key={tag} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">
                                    {tag}
                                </span>
                            ))}
                        </div>
                        <h4 className="text-xs font-semibold text-zinc-100">{resource.title}</h4>
                        <p className="text-[10px] text-zinc-500 line-clamp-1 mt-0.5">{resource.description}</p>
                        <div className="flex items-center justify-between text-[10px] text-zinc-600 mt-2 pt-2 border-t border-zinc-800/60">
                            <span>{resource.time}</span>
                            <span className="flex items-center gap-1">
                                <Eye className="size-3" />
                                {resource.views} views
                            </span>
                        </div>
                    </div>
                ))}
                {filtered.length === 0 && (
                    <div className="text-center text-[11px] text-zinc-600 py-6">Belum ada resource di kategori ini.</div>
                )}
            </div>
        </div>
    )
}
