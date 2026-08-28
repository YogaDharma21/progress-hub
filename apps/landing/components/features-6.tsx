import { BookOpen, FolderGit2, GraduationCap, Users } from 'lucide-react'
import Image from 'next/image'

export default function FeaturesSection() {
    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl space-y-12 px-6">
                <h2 className="text-muted-foreground relative z-10 max-w-4xl text-balance text-4xl font-medium tracking-tight lg:text-5xl">
                    <span className="text-foreground">Dukung ekosistem developer UKM.</span> <br /> Program, proyek, dan pembelajaran dalam satu tempat.
                </h2>
                <div className="relative -mx-6 overflow-hidden px-3 pt-3 md:-mx-8">
                    <div className="mask-radial-at-top-left mask-radial-from-65% mask-radial-[100%_60%] z-1 absolute inset-3 size-64 rounded-tl-3xl border-l border-t md:size-96 lg:inset-4"></div>
                    <div className="min-w-2xl aspect-88/36 mask-b-from-75% mask-b-to-95% relative">
                        <Image
                            src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2426&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            className="absolute inset-0 z-10 rounded-xl object-cover"
                            alt="platform illustration"
                            width={2426}
                            height={1617}
                        />
                        <Image
                            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="analytics illustration"
                            width={2070}
                            height={1380}
                            className="rounded-xl object-cover opacity-75"
                        />
                    </div>
                </div>
                <div className="max-sm:*:not-last:border-b max-sm:*:not-last:pb-3 mt-12 grid gap-3 *:max-w-xs sm:grid-cols-2 md:mt-16 md:gap-y-6 lg:mt-24 lg:grid-cols-4 lg:gap-6">
                    <p className="text-muted-foreground text-balance">
                        <span className="text-foreground font-medium">
                            <GraduationCap className="inline size-4 -translate-y-0.5" /> 12+ Program Kerja.
                        </span>{' '}
                        Kelas, hackathon, dan sharing session untuk tingkatkan kemampuan.
                    </p>

                    <p className="text-muted-foreground text-balance">
                        <span className="text-foreground font-medium">
                            <FolderGit2 className="inline size-4 -translate-y-0.5" /> 28+ Proyek Showcase.
                        </span>{' '}
                            Portofolio proyek tim dan individu mahasiswa.
                    </p>

                    <p className="text-muted-foreground text-balance">
                        <span className="text-foreground font-medium">
                            <BookOpen className="inline size-4 -translate-y-0.5" /> 45+ Modul & Artikel.
                        </span>{' '}
                        Repositori pembelajaran dan tutorial teknis.
                    </p>

                    <p className="text-muted-foreground text-balance">
                        <span className="text-foreground font-medium">
                            <Users className="inline size-4 -translate-y-0.5" /> Komunitas Developer.
                        </span>{' '}
                        Kolaborasi dan berkontribusi bersama seluruh anggota UKM.
                    </p>
                </div>
            </div>
        </section>
    )
}
