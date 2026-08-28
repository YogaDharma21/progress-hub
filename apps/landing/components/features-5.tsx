'use client'

import { BookOpen, Code2, GraduationCap, Layout, Lightbulb, Users, FolderGit2, FileText, type LucideIcon } from 'lucide-react'
import Image from 'next/image'
import { useEffect, useRef, useState } from 'react'
import { Button } from '@/components/ui/button'

const features = [
    { id: 'events', label: 'Program Kerja & Kelas' },
    { id: 'projects', label: 'Portofolio Proyek' },
    { id: 'resources', label: 'Repositori Pembelajaran' },
    { id: 'platform', label: 'Platform Terpadu' },
] as const

type FeatureId = (typeof features)[number]['id']

const featureHighlights: Record<FeatureId, { icon: LucideIcon; label: string }[]> = {
    events: [
        { icon: Code2, label: 'Kelas pemrograman & hackathon' },
        { icon: Users, label: 'Sharing session terstruktur' },
        { icon: GraduationCap, label: 'Tingkatkan kemampuan coding' },
    ],
    projects: [
        { icon: FolderGit2, label: 'Portofolio proyek tim & individu' },
        { icon: Layout, label: 'Deskripsi & tech stack lengkap' },
        { icon: Code2, label: 'Link repository GitHub' },
    ],
    resources: [
        { icon: BookOpen, label: 'Modul silabus praktikum' },
        { icon: FileText, label: 'Tutorial teknis & panduan karir' },
        { icon: Lightbulb, label: 'Akses gratis untuk semua anggota' },
    ],
    platform: [
        { icon: Users, label: 'Kolaborasi antar anggota UKM' },
        { icon: Layout, label: 'Dashboard progres belajar' },
        { icon: BookOpen, label: 'Pusat informasi kegiatan' },
    ],
}

function FeatureList({ items }: { items: { icon: LucideIcon; label: string }[] }) {
    return (
        <ul className="text-muted-foreground mt-8 divide-y *:flex *:items-center *:gap-3 *:py-3">
            {items.map(({ icon: Icon, label }) => (
                <li key={label}>
                    <Icon className="size-4" />
                    {label}
                </li>
            ))}
        </ul>
    )
}

export default function FeaturesSection() {
    const [activeId, setActiveId] = useState<FeatureId>('events')
    const sectionRefs = useRef<Partial<Record<FeatureId, HTMLDivElement | null>>>({})

    const scrollToFeature = (id: FeatureId) => {
        sectionRefs.current[id]?.scrollIntoView({ behavior: 'smooth', block: 'start' })
        setActiveId(id)
    }

    useEffect(() => {
        const sections = features.map((feature) => sectionRefs.current[feature.id]).filter((section): section is HTMLDivElement => section != null)

        const observer = new IntersectionObserver(
            (entries) => {
                const visible = entries.filter((entry) => entry.isIntersecting).sort((a, b) => b.intersectionRatio - a.intersectionRatio)

                const nextId = visible[0]?.target.id as FeatureId | undefined
                if (nextId) setActiveId(nextId)
            },
            { rootMargin: '-25% 0px -55% 0px', threshold: [0.15, 0.35, 0.55, 0.75] }
        )

        sections.forEach((section) => observer.observe(section))

        return () => observer.disconnect()
    }, [])

    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl px-6">
                <h2 className="text-muted-foreground max-w-4xl text-balance text-4xl font-medium tracking-tight">
                    <span className="text-foreground">Fitur & Layanan Utama.</span> <br /> Dirancang untuk mendukung ekosistem developer UKM.
                </h2>
                <div className="mt-16 grid gap-6 md:mt-32 lg:grid-cols-[auto_1fr]">
                    <div className="sticky top-24 h-fit w-56 max-lg:hidden">
                        <div className="text-muted-foreground text-sm">Fitur</div>
                        <div className="-ml-4 mt-4 flex flex-col *:justify-start">
                            {features.map((feature) => (
                                <Button
                                    key={feature.id}
                                    type="button"
                                    variant="ghost"
                                    data-state={activeId === feature.id ? 'active' : undefined}
                                    onClick={() => scrollToFeature(feature.id)}
                                    className="not-data-[state=active]:text-muted-foreground hover:bg-transparent">
                                    {feature.label}
                                </Button>
                            ))}
                        </div>
                    </div>
                    <div className="flex flex-col gap-16 md:gap-32">
                        <div
                            ref={(element) => {
                                sectionRefs.current['events'] = element
                            }}
                            id="events"
                            className="grid scroll-mt-32 gap-6 sm:grid-cols-2 md:grid-cols-5 lg:gap-12">
                            <div className="flex flex-col justify-between pb-4 md:col-span-2">
                                <div className="md:pr-6 lg:pr-0">
                                    <h3 className="text-muted-foreground mb-6 text-sm font-medium">Program Kerja & Kelas</h3>
                                    <p className="text-muted-foreground text-balance text-lg font-medium">
                                        <span className="text-foreground">Kelas pemrograman.</span> Ikuti hackathon internal, dan sharing session terstruktur untuk tingkatkan kemampuan coding.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.events} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square rounded-3xl border p-3 md:col-span-3">
                                <div className="bg-linear-to-b aspect-76/59 relative m-auto max-w-sm rounded-2xl from-zinc-300 to-transparent p-px dark:from-zinc-700">
                                    <Image
                                        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2426&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        className="hidden rounded-[15px] dark:block"
                                        alt="workflow agents illustration"
                                        width={2426}
                                        height={1617}
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            ref={(element) => {
                                sectionRefs.current.projects = element
                            }}
                            id="projects"
                            className="grid scroll-mt-32 gap-6 sm:grid-cols-2 md:grid-cols-5 lg:gap-12">
                            <div className="flex flex-col justify-between pb-4 md:col-span-2">
                                <div className="md:pr-6 lg:pr-0">
                                    <h3 className="text-muted-foreground mb-6 text-sm font-medium">Portofolio Proyek</h3>
                                    <p className="text-muted-foreground text-balance text-lg font-medium">
                                        <span className="text-foreground">Pamerkan karya.</span> Tampilkan hasil proyek tim maupun individu lengkap dengan deskripsi, tech stack, dan link repository.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.projects} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square rounded-3xl border p-3 md:col-span-3">
                                <div className="bg-linear-to-b aspect-76/59 relative m-auto max-w-sm rounded-2xl from-zinc-300 to-transparent p-px dark:from-zinc-700">
                                    <Image
                                        src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        className="hidden rounded-[15px] dark:block"
                                        alt="alerts dashboard illustration"
                                        width={2070}
                                        height={1380}
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            ref={(element) => {
                                sectionRefs.current.resources = element
                            }}
                            id="resources"
                            className="grid scroll-mt-32 gap-6 sm:grid-cols-2 md:grid-cols-5 lg:gap-12">
                            <div className="flex flex-col justify-between pb-4 md:col-span-2">
                                <div className="md:pr-6 lg:pr-0">
                                    <h3 className="text-muted-foreground mb-6 text-sm font-medium">Repositori Pembelajaran</h3>
                                    <p className="text-muted-foreground text-balance text-lg font-medium">
                                        <span className="text-foreground">Akses gratis.</span> Modul silabus praktikum, tutorial teknis, dan panduan karir software engineering <span className="rounded bg-emerald-500/10 px-1.5 text-emerald-500">secara gratis</span>.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.resources} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square rounded-3xl border p-3 md:col-span-3">
                                <div className="bg-linear-to-b aspect-76/59 relative m-auto max-w-sm rounded-2xl from-zinc-300 to-transparent p-px dark:from-zinc-700">
                                    <Image
                                        src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?q=80&w=2139&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        className="hidden rounded-[15px] dark:block"
                                        alt="timeline illustration"
                                        width={2139}
                                        height={1426}
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            ref={(element) => {
                                sectionRefs.current.platform = element
                            }}
                            id="platform"
                            className="grid scroll-mt-32 gap-6 sm:grid-cols-2 md:grid-cols-5 lg:gap-12">
                            <div className="flex flex-col justify-between pb-4 md:col-span-2">
                                <div className="md:pr-6 lg:pr-0">
                                    <h3 className="text-muted-foreground mb-6 text-sm font-medium">Platform Terpadu</h3>
                                    <p className="text-muted-foreground text-balance text-lg font-medium">
                                        <span className="text-foreground">Satu platform.</span> Kolaborasi antar anggota, pantau progres belajar, dan pusat informasi kegiatan UKM.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.platform} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square rounded-3xl border p-3 md:col-span-3">
                                <div className="bg-linear-to-b aspect-76/59 relative m-auto max-w-sm rounded-2xl from-zinc-300 to-transparent p-px dark:from-zinc-700">
                                    <Image
                                        src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        className="hidden rounded-[15px] dark:block"
                                        alt="platform illustration"
                                        width={2070}
                                        height={1380}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}


