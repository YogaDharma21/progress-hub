'use client'

import { useState } from 'react'
import Link from 'next/link'
import { Calendar, FolderGit2, BookOpen, LayoutDashboard, ArrowLeft, ExternalLink, Sparkles } from 'lucide-react'
import EventCardDemo from '@/components/feature-demos/event-card-demo'
import ProjectCardDemo from '@/components/feature-demos/project-card-demo'
import ResourceCardDemo from '@/components/feature-demos/resource-card-demo'
import PlatformDemo from '@/components/feature-demos/platform-demo'
import HeroDemo from '@/components/hero-demo'
import { Button } from '@/components/ui/button'

const tabs = [
    { id: 'all', label: 'Semua UI', icon: Sparkles },
    { id: 'dashboard', label: 'Dashboard', icon: LayoutDashboard },
    { id: 'events', label: 'Program Kerja', icon: Calendar },
    { id: 'projects', label: 'Proyek', icon: FolderGit2 },
    { id: 'resources', label: 'Repositori', icon: BookOpen },
] as const

type TabId = (typeof tabs)[number]['id']

// ponytail: static component preview slots; upgrade to interactive sandbox if user requests live data inputs.
export default function DemoShowcase() {
    const [activeTab, setActiveTab] = useState<TabId>('all')

    const showDashboard = activeTab === 'all' || activeTab === 'dashboard'
    const showEvents = activeTab === 'all' || activeTab === 'events'
    const showProjects = activeTab === 'all' || activeTab === 'projects'
    const showResources = activeTab === 'all' || activeTab === 'resources'

    return (
        <div className="mx-auto max-w-7xl px-6 py-12 lg:py-16">
            {/* Top intro */}
            <div className="flex flex-col items-start gap-4 md:flex-row md:items-end md:justify-between pb-8 border-b border-zinc-800/60">
                <div className="max-w-2xl">
                    <div className="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-400 mb-4">
                        <span className="relative flex size-2">
                            <span className="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75" />
                            <span className="relative inline-flex size-2 rounded-full bg-emerald-500" />
                        </span>
                        Live Interactive Loop
                    </div>
                    <h1 className="text-3xl font-bold tracking-tight text-zinc-100 sm:text-4xl lg:text-5xl">
                        Preview Interaktif Komponen UI
                    </h1>
                    <p className="mt-3 text-base text-zinc-400 leading-relaxed sm:text-lg">
                        Lihat komponen antarmuka Progress Hub beraksi. Setiap bagian berjalan otomatis dalam siklus rotasi untuk mensimulasikan aktivitas nyata anggota UKM.
                    </p>
                </div>

                <div className="flex items-center gap-3">
                    <Button
                        variant="outline"
                        size="sm"
                        nativeButton={false}
                        render={
                            <Link href="/" className="flex items-center gap-2">
                                <ArrowLeft className="size-4" />
                                <span>Kembali ke Beranda</span>
                            </Link>
                        }
                    />
                    <Button
                        size="sm"
                        nativeButton={false}
                        render={
                            <Link href="https://app.progress-hub.my.id/register" target="_blank" rel="noopener noreferrer" className="flex items-center gap-2">
                                <span>Buka Aplikasi</span>
                                <ExternalLink className="size-4" />
                            </Link>
                        }
                    />
                </div>
            </div>

            {/* Filter tabs */}
            <div className="flex flex-wrap items-center gap-2 py-6">
                {tabs.map((tab) => {
                    const Icon = tab.icon
                    const isActive = activeTab === tab.id
                    return (
                        <button
                            key={tab.id}
                            onClick={() => setActiveTab(tab.id)}
                            className={`flex items-center gap-2 px-3.5 py-1.5 rounded-lg text-xs font-medium transition-all duration-200 cursor-pointer ${
                                isActive
                                    ? 'bg-zinc-100 text-zinc-900 shadow-md font-semibold'
                                    : 'bg-zinc-900/60 text-zinc-400 border border-zinc-800 hover:text-zinc-200 hover:bg-zinc-800/60'
                            }`}
                        >
                            <Icon className="size-3.5" />
                            <span>{tab.label}</span>
                        </button>
                    )
                })}
            </div>

            {/* Showcase grid */}
            <div className="space-y-12">
                {/* Dashboard Section */}
                {showDashboard && (
                    <section className="space-y-4">
                        <div className="flex items-center justify-between border-b border-zinc-800/40 pb-2">
                            <div>
                                <h2 className="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                                    <LayoutDashboard className="size-4 text-emerald-400" />
                                    <span>Dashboard & Aktivitas Waktu-Nyata</span>
                                </h2>
                                <p className="text-xs text-zinc-500 mt-0.5">
                                    Statistik bergerak dengan osilasi nilai dinamis dan stream aktivitas anggota terbaru.
                                </p>
                            </div>
                            <span className="text-[10px] text-zinc-500 font-mono">Loop: ~2.4s</span>
                        </div>

                        <div className="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                            <div className="lg:col-span-5">
                                <PlatformDemo />
                            </div>

                            <div className="lg:col-span-7 bg-zinc-950 border border-zinc-800/60 rounded-2xl p-4 sm:p-5">
                                <div className="mb-3">
                                    <h3 className="text-xs font-semibold text-zinc-200">Panel Admin & Member Interaktif</h3>
                                    <p className="text-[10px] text-zinc-500 mt-0.5">Simulasi dua sisi dasbor: navigasi admin dan ringkasan portofolio member.</p>
                                </div>
                                <div className="relative overflow-hidden rounded-xl bg-zinc-900/40 border border-zinc-800/80 p-2 sm:p-4">
                                    <div className="flex min-h-[380px] sm:min-h-[420px] items-end justify-center -space-x-0 md:-space-x-20 overflow-hidden">
                                        <HeroDemo />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                )}

                {/* Events & Classes */}
                {showEvents && (
                    <section className="space-y-4">
                        <div className="flex items-center justify-between border-b border-zinc-800/40 pb-2">
                            <div>
                                <h2 className="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                                    <Calendar className="size-4 text-blue-400" />
                                    <span>Program Kerja & Kelas Belajar</span>
                                </h2>
                                <p className="text-xs text-zinc-500 mt-0.5">
                                    Rotasi kartu kegiatan, jumlah pertemuan, peserta terdaftar, dan status pendaftaran.
                                </p>
                            </div>
                            <span className="text-[10px] text-zinc-500 font-mono">Loop: ~2.8s</span>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <EventCardDemo />
                            </div>
                            <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 flex flex-col justify-between">
                                <div className="space-y-3">
                                    <h3 className="text-sm font-semibold text-zinc-200">Detail Alur Kegiatan</h3>
                                    <p className="text-xs text-zinc-400 leading-relaxed">
                                        Komponen ini menampilkan daftar program aktif UKM Progress secara bergilir. Peserta dapat memfilter jenis kegiatan:
                                    </p>
                                    <ul className="text-xs text-zinc-500 space-y-2 list-disc list-inside">
                                        <li><strong className="text-zinc-300">Kelas:</strong> Sesi belajar teknis terjadwal dengan modul silabus.</li>
                                        <li><strong className="text-zinc-300">Hackathon:</strong> Lomba sprint kolaboratif perancangan produk dalam batas waktu.</li>
                                        <li><strong className="text-zinc-300">Sharing Session:</strong> Temu alumni dan praktisi industri untuk sharing karir.</li>
                                    </ul>
                                </div>
                                <div className="pt-4 border-t border-zinc-800/60 text-[11px] text-zinc-500">
                                    Interaksi: Klik tombol tab untuk menyaring jenis kegiatan yang sedang berotasi.
                                </div>
                            </div>
                        </div>
                    </section>
                )}

                {/* Projects Section */}
                {showProjects && (
                    <section className="space-y-4">
                        <div className="flex items-center justify-between border-b border-zinc-800/40 pb-2">
                            <div>
                                <h2 className="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                                    <FolderGit2 className="size-4 text-emerald-400" />
                                    <span>Portofolio & Proyek Anggota</span>
                                </h2>
                                <p className="text-xs text-zinc-500 mt-0.5">
                                    Showcase proyek UKM dan personal anggota dengan detail tech stack dan tanggal unggah.
                                </p>
                            </div>
                            <span className="text-[10px] text-zinc-500 font-mono">Loop: ~3.0s</span>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <ProjectCardDemo />
                            </div>
                            <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 flex flex-col justify-between">
                                <div className="space-y-3">
                                    <h3 className="text-sm font-semibold text-zinc-200">Katalog Proyek Terintegrasi</h3>
                                    <p className="text-xs text-zinc-400 leading-relaxed">
                                        Setiap kartu proyek menyoroti repositori dan karya anggota UKM. Transisi pergantian kartu menerapkan kurva pegas (spring) halus untuk pengalaman melihat karya yang dinamis.
                                    </p>
                                    <div className="p-3 rounded-lg bg-zinc-900 border border-zinc-800 text-xs text-zinc-400 space-y-1">
                                        <div className="text-zinc-200 font-medium">Informasi yang Ditampilkan:</div>
                                        <div>• Thumbnail gradient identitas proyek</div>
                                        <div>• Kategori aplikasi (Web, Mobile, Tools)</div>
                                        <div>• Badge teknologi (Laravel, React, Supabase, Flutter)</div>
                                        <div>• Pembuat dan riwayat pembaruan</div>
                                    </div>
                                </div>
                                <div className="pt-4 border-t border-zinc-800/60 text-[11px] text-zinc-500">
                                    Animasi: Pergantian kartu memanfaatkan `framer-motion` layout animation.
                                </div>
                            </div>
                        </div>
                    </section>
                )}

                {/* Resources Section */}
                {showResources && (
                    <section className="space-y-4">
                        <div className="flex items-center justify-between border-b border-zinc-800/40 pb-2">
                            <div>
                                <h2 className="text-lg font-semibold text-zinc-100 flex items-center gap-2">
                                    <BookOpen className="size-4 text-purple-400" />
                                    <span>Repositori Modul & Pembelajaran</span>
                                </h2>
                                <p className="text-xs text-zinc-500 mt-0.5">
                                    Akses modul materi, artikel teknis, dan panduan persiapan karir teknologi.
                                </p>
                            </div>
                            <span className="text-[10px] text-zinc-500 font-mono">Loop: ~3.2s</span>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <ResourceCardDemo />
                            </div>
                            <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 flex flex-col justify-between">
                                <div className="space-y-3">
                                    <h3 className="text-sm font-semibold text-zinc-200">Pusat Belajar Terbuka</h3>
                                    <p className="text-xs text-zinc-400 leading-relaxed">
                                        Modul pembelajaran disusun berjenjang oleh pengurus dan anggota senior. Metrik view counter secara simulatif bertambah seiring rotasi konten.
                                    </p>
                                    <div className="p-3 rounded-lg bg-zinc-900 border border-zinc-800 text-xs text-zinc-400 space-y-1">
                                        <div className="text-zinc-200 font-medium">Tipe Materi:</div>
                                        <div>• <strong>Modul:</strong> Silabus terstruktur untuk praktikum mandiri.</div>
                                        <div>• <strong>Artikel:</strong> Tips lolos interview kerja dan insight teknologi.</div>
                                        <div>• <strong>Tools:</strong> Panduan konfigurasi environment (Docker, Git).</div>
                                    </div>
                                </div>
                                <div className="pt-4 border-t border-zinc-800/60 text-[11px] text-zinc-500">
                                    Interaksi: Filter kategori aktif untuk menelusuri modul secara instan.
                                </div>
                            </div>
                        </div>
                    </section>
                )}
            </div>

            {/* Bottom CTA */}
            <div className="mt-16 rounded-2xl border border-zinc-800 bg-gradient-to-b from-zinc-900/60 to-zinc-950 p-6 sm:p-8 text-center">
                <h3 className="text-xl sm:text-2xl font-bold text-zinc-100">Siap bergabung dengan Progress Hub?</h3>
                <p className="mt-2 text-sm text-zinc-400 max-w-lg mx-auto">
                    Akses seluruh modul, daftarkan diri ke kegiatan UKM, dan pamerkan portofolio coding kamu sekarang.
                </p>
                <div className="mt-6 flex flex-wrap items-center justify-center gap-3">
                    <Button
                        size="sm"
                        nativeButton={false}
                        render={
                            <Link href="https://app.progress-hub.my.id/register">
                                <span>Daftar Akun Baru</span>
                            </Link>
                        }
                    />
                    <Button
                        variant="outline"
                        size="sm"
                        nativeButton={false}
                        render={
                            <Link href="/">
                                <span>Kembali ke Beranda</span>
                            </Link>
                        }
                    />
                </div>
            </div>
        </div>
    )
}
