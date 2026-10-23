import type { Metadata } from 'next'
import { HeroHeader } from '@/components/hero-section-10-header'
import Footer from '@/components/footer-2'
import DemoShowcase from '@/components/demo-showcase'

export const metadata: Metadata = {
    title: 'Live UI Demo | Progress Hub',
    description: 'Simulasi interaktif antarmuka dan interaksi komponen Progress Hub yang berjalan otomatis secara loop.',
}

export default function DemoPage() {
    return (
        <>
            <HeroHeader />
            <main className="pt-24 lg:pt-28 min-h-screen">
                <DemoShowcase />
            </main>
            <Footer />
        </>
    )
}
