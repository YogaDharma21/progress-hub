import { Button } from '@/components/ui/button'
import Link from 'next/link'

export default function CallToAction() {
    return (
        <section className="py-16 md:py-20">
            <div className="mx-auto max-w-7xl px-6">
                <div className="flex items-center justify-center gap-6 max-lg:flex-col max-lg:text-center lg:items-end lg:justify-between">
                    <h2 className="max-w-4xl text-balance text-5xl font-semibold tracking-tight xl:text-6xl">Siap Bergabung dengan Progress Hub?</h2>

                    <div className="flex gap-3">
                        <Button
                            size="lg"
                            nativeButton={false}
                            render={<Link href="https://progress-hub.laravel.cloud/register">Daftar Akun Sekarang</Link>}
                        />
                        <Button
                            size="lg"
                            variant="outline"
                            nativeButton={false}
                            render={<Link href="https://progress-hub.laravel.cloud/login">Login Akun</Link>}
                        />
                    </div>
                </div>
            </div>
        </section>
    )
}
