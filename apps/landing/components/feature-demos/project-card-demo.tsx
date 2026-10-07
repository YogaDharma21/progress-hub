import Image from 'next/image'

const projects = [
    {
        title: 'Progress Hub',
        description: 'Platform manajemen kegiatan UKM untuk kolaborasi dan portofolio.',
        category: 'Web App',
        tech: ['Laravel', 'React', 'Tailwind'],
        gradient: 'from-emerald-500/20 to-teal-500/20',
        creator: 'Arief N.',
        time: '2 hari lalu',
    },
    {
        title: 'Smart Attendance',
        description: 'Sistem presensi otomatis berbasis QR code untuk kegiatan UKM.',
        category: 'Mobile',
        tech: ['Flutter', 'Firebase'],
        gradient: 'from-emerald-500/20 to-teal-500/20',
        creator: 'Maya S.',
        time: '5 hari lalu',
    },
]

export default function ProjectCardDemo() {
    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-3.5 sm:p-5 w-full max-w-md">
            <div className="space-y-3">
                {projects.map((project) => (
                    <div
                        key={project.title}
                        className="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-3 sm:p-4 transition-all duration-200 ease-[cubic-bezier(0.34,1.56,0.64,1)] hover:-translate-y-1 hover:shadow-lg hover:shadow-black/20 active:scale-[0.98] cursor-pointer">
                        <div className={`w-full h-28 sm:h-32 bg-gradient-to-br ${project.gradient} rounded-lg border border-zinc-800 mb-2.5 sm:mb-3 flex items-center justify-center overflow-hidden transition-transform duration-300 group-hover:scale-[1.02]`}>
                            <Image src="/icon-192.png" alt="" width={24} height={24} className="rounded opacity-30 transition-all duration-300 group-hover:opacity-60 group-hover:scale-110" />
                        </div>
                        <span className="inline-block px-1.5 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300 mb-1.5 transition-transform duration-200 group-hover:scale-105">
                            {project.category}
                        </span>
                        <h4 className="text-xs font-semibold text-zinc-100 group-hover:text-white transition-colors">{project.title}</h4>
                        <p className="text-[10px] text-zinc-500 line-clamp-1 mt-0.5">{project.description}</p>
                        <div className="flex flex-wrap gap-1 mt-2">
                            {project.tech.map((t) => (
                                <span key={t} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800 transition-colors group-hover:border-zinc-700">
                                    {t}
                                </span>
                            ))}
                        </div>
                        <div className="flex items-center justify-between text-[10px] text-zinc-600 mt-3 pt-2 border-t border-zinc-800/60">
                            <span>oleh {project.creator}</span>
                            <span>{project.time}</span>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    )
}
