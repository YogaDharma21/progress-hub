import { Calendar, FolderGit2, BookOpen } from 'lucide-react'

const stats = [
    { icon: Calendar, label: 'Program Aktif', value: '12', color: 'text-zinc-400' },
    { icon: FolderGit2, label: 'Proyek Showcase', value: '28', color: 'text-zinc-400' },
    { icon: BookOpen, label: 'Artikel & Modul', value: '45', color: 'text-zinc-400' },
]

const activity = [
    { user: 'Arief N.', action: 'bergabung ke', target: 'Hackathon Code Sprint', time: '2m lalu' },
    { user: 'Maya S.', action: 'mengunggah proyek', target: 'Smart Attendance', time: '15m lalu' },
    { user: 'Rizky P.', action: 'menulis artikel', target: 'React Best Practices', time: '1j lalu' },
]

export default function PlatformDemo() {
    return (
        <div className="bg-zinc-950 border border-zinc-800/60 rounded-2xl p-5 w-full max-w-md">
            <div className="flex items-center justify-between mb-4">
                <h4 className="text-xs font-semibold text-zinc-100">Dashboard</h4>
                <span className="text-[9px] text-zinc-600">UKM Progress</span>
            </div>
            <div className="grid grid-cols-3 gap-2 mb-4">
                {stats.map((stat) => (
                    <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                        <div className="w-7 h-7 rounded-lg bg-zinc-950 flex items-center justify-center mb-2">
                            <stat.icon className={`size-3.5 ${stat.color}`} />
                        </div>
                        <div className="text-base font-bold text-zinc-100">{stat.value}</div>
                        <div className="text-[9px] text-zinc-500">{stat.label}</div>
                    </div>
                ))}
            </div>
            <div className="bg-zinc-900 border border-zinc-800 rounded-xl p-3">
                <h5 className="text-[10px] font-semibold text-zinc-400 mb-2.5">Aktivitas Terkini</h5>
                <div className="space-y-2.5">
                    {activity.map((item, i) => (
                        <div key={i} className="flex items-start gap-2">
                            <div className="w-5 h-5 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-300 shrink-0 mt-0.5">
                                {item.user[0]}
                            </div>
                            <div className="min-w-0 flex-1">
                                <p className="text-[10px] text-zinc-400 leading-relaxed">
                                    <span className="text-zinc-200 font-medium">{item.user}</span>{' '}
                                    {item.action}{' '}
                                    <span className="text-zinc-200 font-medium">{item.target}</span>
                                </p>
                                <p className="text-[9px] text-zinc-600 mt-0.5">{item.time}</p>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}
