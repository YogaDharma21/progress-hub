const projects = [
    {
        title: 'Progress Hub',
        description: 'Platform manajemen kegiatan UKM untuk kolaborasi dan portofolio.',
        category: 'Web App',
        tech: ['Laravel', 'React', 'Tailwind'],
        gradient: 'from-violet-500/20 to-blue-500/20',
        creator: 'Arief N.',
        time: '2 hari lalu',
    },
    {
        title: 'Smart Attendance',
        description: 'Sistem presensi otomatis berbasis QR code untuk kegiatan UKM.',
        category: 'Mobile',
        tech: ['Flutter', 'Firebase'],
        gradient: 'from-emerald-500/20 to-cyan-500/20',
        creator: 'Maya S.',
        time: '5 hari lalu',
    },
]

export default function ProjectCardDemo() {
    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 w-full max-w-md">
            <div className="space-y-3">
                {projects.map((project) => (
                    <div key={project.title} className="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                        <div className={`w-full h-20 bg-gradient-to-br ${project.gradient} rounded-lg border border-zinc-800 mb-3 flex items-center justify-center text-[10px] text-zinc-500 font-medium`}>
                            {project.title}
                        </div>
                        <span className="inline-block px-1.5 py-0.5 rounded text-[9px] font-semibold bg-zinc-800 text-zinc-300 mb-1.5">
                            {project.category}
                        </span>
                        <h4 className="text-xs font-semibold text-zinc-100">{project.title}</h4>
                        <p className="text-[10px] text-zinc-500 line-clamp-1 mt-0.5">{project.description}</p>
                        <div className="flex flex-wrap gap-1 mt-2">
                            {project.tech.map((t) => (
                                <span key={t} className="px-1.5 py-0.5 rounded text-[8px] font-medium bg-zinc-950 text-zinc-500 border border-zinc-800">
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
