import { Button } from '@/components/ui/button'
import Link from 'next/link'
import { HeroHeader } from '@/components/hero-section-10-header'
import HeroDemo from '@/components/hero-demo'

export default function HeroSection() {
    return (
        <>
            <HeroHeader />

            <main>
                <section className="pt-40 xl:pt-48">
                    <div className="mx-auto max-w-7xl px-6">
                        <div className="grid items-end gap-4 md:grid-cols-2 md:gap-6">
                            <h1 className="text-balance text-4xl font-medium tracking-tight md:text-5xl">Bikin Proyek, Belajar, dan Kolaborasi, Satu Tempat Aja.</h1>
                            <div className="flex max-w-md flex-col gap-4 md:mx-auto">
                                <p className="text-muted-foreground text-balance text-lg">Tempat nongkrongnya developer UKM Progress. Eksplor modul, pamerin proyek, dan belajar bareng, seru, gratis, dan nggak ribet.</p>

                                <div className="flex gap-3">
                                    <Button
                                        className="w-fit"
                                        nativeButton={false}
                                        render={<Link href="/login">Login</Link>}
                                    />
                                    <Button
                                        variant="outline"
                                        className="w-fit"
                                        nativeButton={false}
                                        render={<Link href="https://progress-stikombali.org">Lihat-lihat Dulu</Link>}
                                    />
                                </div>
                            </div>
                        </div>

                        <div className="relative mt-16 overflow-hidden rounded-2xl max-lg:-mx-4">
                            <div className="aspect-3/2 relative z-10 mx-auto flex max-w-5xl -space-x-12 sm:aspect-video lg:-space-x-56">
                                <HeroDemo />
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </>
    )
}
