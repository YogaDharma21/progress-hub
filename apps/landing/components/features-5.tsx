'use client'

import { BookOpen, Code2, GraduationCap, Layout, Lightbulb, Users, FolderGit2, FileText, type LucideIcon } from 'lucide-react'
import { useEffect, useRef, useState } from 'react'
import { Button } from '@/components/ui/button'
import EventCardDemo from '@/components/feature-demos/event-card-demo'
import ProjectCardDemo from '@/components/feature-demos/project-card-demo'
import ResourceCardDemo from '@/components/feature-demos/resource-card-demo'
import PlatformDemo from '@/components/feature-demos/platform-demo'

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
        { icon: Users, label: 'Kolaborasi antar anggota UKM Progress' },
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
                const visible = entries.filter((entry) => entry.isIntersecting)
                if (visible.length === 0) return

                const topmost = visible.reduce((prev, curr) => {
                    return prev.boundingClientRect.top < curr.boundingClientRect.top ? prev : curr
                })

                const nextId = topmost.target.id as FeatureId | undefined
                if (nextId) setActiveId(nextId)
            },
            { rootMargin: '-40% 0px -55% 0px', threshold: 0 }
        )

        sections.forEach((section) => observer.observe(section))

        return () => observer.disconnect()
    }, [])

    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl px-6">
                <h2 className="text-muted-foreground max-w-4xl text-balance text-4xl font-medium tracking-tight">
                    <span className="text-foreground">Yang bikin Progress Hub seru.</span> <br /> Fitur-fitur yang bikin coding jadi nggak sendirian.
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
                                        <span className="text-foreground">Kelas seru.</span> Ikuti hackathon asik, sharing session, dan level-up skill coding bareng temen-temen.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.events} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square items-center justify-center rounded-3xl border p-6 md:col-span-3">
                                <div className="w-full max-w-sm">
                                    <EventCardDemo />
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
                                        <span className="text-foreground">Pamerin karyamu.</span> Tampilin proyek tim atau individual, lengkap sama deskripsi, tech stack, dan repo-nya.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.projects} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square items-center justify-center rounded-3xl border p-6 md:col-span-3">
                                <div className="w-full max-w-sm">
                                    <ProjectCardDemo />
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
                                        <span className="text-foreground">Belajar gratis!</span> Modul praktikum, tutorial teknis, dan panduan karir software engineering.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.resources} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square items-center justify-center rounded-3xl border p-6 md:col-span-3">
                                <div className="w-full max-w-sm">
                                    <ResourceCardDemo />
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
                                        <span className="text-foreground">Semua ada di sini.</span> Kolaborasi sama anggota lain, pantau progres belajar, dan info kegiatan UKM Progress terkini.
                                    </p>
                                </div>
                                <FeatureList items={featureHighlights.platform} />
                            </div>
                            <div className="border-border/50 bg-foreground/2 relative flex aspect-square items-center justify-center rounded-3xl border p-6 md:col-span-3">
                                <div className="w-full max-w-sm">
                                    <PlatformDemo />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}


