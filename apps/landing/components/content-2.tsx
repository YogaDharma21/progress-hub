import { Button } from '@/components/ui/button'
import { ChevronRight, BookOpen, Users } from 'lucide-react'
import Link from 'next/link'

export default function ContentSection() {
    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl px-6">
                <div className="grid gap-4 md:grid-cols-2 md:gap-6 lg:gap-12">
                    <h2 className="max-w-md text-balance text-4xl font-medium tracking-tight lg:text-5xl">Nongkrong bareng developer UKM Progress? Bisa banget.</h2>
                    <div className="space-y-6 lg:space-y-12">
                        <p className="text-muted-foreground text-balance text-lg">Progress Hub nyatuin program kerja, proyek, dan materi belajar jadi satu tempat. Jadi anggota UKM Progress nggak perlu jalan sendirian, bisa belajar, ngobrol, dan bikin bareng-bareng.</p>

                        <div className="grid gap-4 pt-6 sm:grid-cols-2">
                            <p className="text-muted-foreground text-balance text-lg">
                                <span className="text-foreground font-medium">
                                    <BookOpen className="inline size-4 -translate-y-0.5" /> Belajar.
                                </span>{' '}
                                Akses modul, tutorial, dan panduan karir, gratis aja.
                            </p>

                            <p className="text-muted-foreground text-balance text-lg">
                                <span className="text-foreground font-medium">
                                    <Users className="inline size-4 -translate-y-0.5" /> Kolaborasi.
                                </span>{' '}
                                Kerja bareng di proyek dan kegiatan UKM Progress.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
