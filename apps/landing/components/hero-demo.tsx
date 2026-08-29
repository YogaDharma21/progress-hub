import { Calendar, FolderGit2, BookOpen, Clock, Users, TrendingUp, ArrowUpRight, LayoutDashboard, Settings } from 'lucide-react'
import { LogoIcon } from '@/components/logo'

export default function HeroDemo() {
    return (
        <>
            {/* Main dashboard panel (left/laptop) */}
            <div className="w-2/3 pt-6 lg:pt-16">
                <div className="bg-card relative h-full overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                    <div className="bg-zinc-950 p-4 lg:p-6 min-h-[300px] lg:min-h-[420px]">
                        {/* Sidebar */}
                        <div className="flex gap-4 lg:gap-6">
                            <div className="hidden lg:flex flex-col gap-3 w-36 shrink-0">
                                <div className="flex items-center gap-2 mb-2">
                                    <LogoIcon className="size-4" />
                                    <span className="text-[10px] font-semibold text-zinc-200">Progress Hub</span>
                                </div>
                                {[
                                    { label: 'Dashboard', icon: LayoutDashboard },
                                    { label: 'Events', icon: Calendar },
                                    { label: 'Projects', icon: FolderGit2 },
                                    { label: 'Resources', icon: BookOpen },
                                    { label: 'Settings', icon: Settings },
                                ].map((item, i) => (
                                    <div key={item.label} className={`flex items-center gap-2 px-2 py-1.5 rounded text-[10px] ${i === 0 ? 'bg-zinc-800 text-zinc-100 font-medium' : 'text-zinc-500'}`}>
                                        <item.icon className="size-3" />
                                        {item.label}
                                    </div>
                                ))}
                            </div>
                            <div className="flex-1 min-w-0">
                                {/* Stats row */}
                                <div className="grid grid-cols-3 gap-2 lg:gap-3 mb-3 lg:mb-4">
                                    {[
                                        { icon: Calendar, label: 'Program', value: '12', change: '+2' },
                                        { icon: FolderGit2, label: 'Proyek', value: '28', change: '+5' },
                                        { icon: BookOpen, label: 'Modul', value: '45', change: '+8' },
                                    ].map((stat) => (
                                        <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-lg p-2.5 lg:p-3">
                                            <div className="flex items-center justify-between mb-1.5">
                                                <stat.icon className="size-3 lg:size-3.5 text-zinc-500" />
                                                <span className="text-[8px] lg:text-[9px] text-emerald-400 font-medium flex items-center gap-0.5">
                                                    <ArrowUpRight className="size-2" />
                                                    {stat.change}
                                                </span>
                                            </div>
                                            <div className="text-sm lg:text-lg font-bold text-zinc-100">{stat.value}</div>
                                            <div className="text-[8px] lg:text-[9px] text-zinc-500">{stat.label}</div>
                                        </div>
                                    ))}
                                </div>
                                {/* Chart area */}
                                <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 lg:p-4 mb-3 lg:mb-4">
                                    <div className="flex items-center justify-between mb-3">
                                        <span className="text-[10px] lg:text-xs font-semibold text-zinc-200">Progres Kegiatan</span>
                                        <span className="text-[8px] lg:text-[9px] text-zinc-500">7 hari terakhir</span>
                                    </div>
                                    <div className="flex items-end gap-1 lg:gap-1.5 h-16 lg:h-24">
                                        {[40, 65, 45, 80, 55, 70, 90].map((h, i) => (
                                            <div key={i} className="flex-1 flex flex-col gap-1">
                                                <div
                                                    className="w-full rounded-sm bg-gradient-to-t from-emerald-500/40 to-emerald-400/80"
                                                    style={{ height: `${h}%` }}
                                                />
                                            </div>
                                        ))}
                                    </div>
                                    <div className="flex justify-between mt-1.5 lg:mt-2">
                                        {['S', 'S', 'R', 'K', 'J', 'S', 'M'].map((d, i) => (
                                            <span key={i} className="text-[7px] lg:text-[8px] text-zinc-600 flex-1 text-center">{d}</span>
                                        ))}
                                    </div>
                                </div>
                                {/* Event cards */}
                                <div className="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                    <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-2.5">
                                        <div className="flex items-start justify-between mb-1.5">
                                            <h4 className="text-[9px] lg:text-[10px] font-semibold text-zinc-100 truncate">Hackathon Sprint</h4>
                                            <span className="px-1.5 py-0.5 rounded-full text-[7px] lg:text-[8px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">Aktif</span>
                                        </div>
                                        <div className="w-full bg-zinc-950 h-1 rounded-full overflow-hidden mb-1.5">
                                            <div className="bg-emerald-500 h-full rounded-full" style={{ width: '65%' }} />
                                        </div>
                                        <div className="flex items-center gap-2 text-[7px] lg:text-[8px] text-zinc-500">
                                            <span className="flex items-center gap-0.5"><Clock className="size-2" /> 8 Pertemuan</span>
                                            <span className="flex items-center gap-0.5"><Users className="size-2" /> 24</span>
                                        </div>
                                    </div>
                                    <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-2.5">
                                        <div className="flex items-start justify-between mb-1.5">
                                            <h4 className="text-[9px] lg:text-[10px] font-semibold text-zinc-100 truncate">React Deep Dive</h4>
                                            <span className="px-1.5 py-0.5 rounded-full text-[7px] lg:text-[8px] font-medium bg-amber-500/10 text-amber-400 border border-amber-500/30">Mendatang</span>
                                        </div>
                                        <div className="w-full bg-zinc-950 h-1 rounded-full overflow-hidden mb-1.5">
                                            <div className="bg-amber-500 h-full rounded-full" style={{ width: '10%' }} />
                                        </div>
                                        <div className="flex items-center gap-2 text-[7px] lg:text-[8px] text-zinc-500">
                                            <span className="flex items-center gap-0.5"><Clock className="size-2" /> 4 Pertemuan</span>
                                            <span className="flex items-center gap-0.5"><Users className="size-2" /> 18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Analytics panel (right/overlapping) */}
            <div className="bg-card relative h-full w-2/3 overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                <div className="bg-zinc-950 p-4 lg:p-6 min-h-[300px] lg:min-h-[420px]">
                    {/* Header */}
                    <div className="mb-4">
                        <h3 className="text-xs lg:text-sm font-semibold text-zinc-100">Analytics Overview</h3>
                        <p className="text-[8px] lg:text-[9px] text-zinc-500 mt-0.5">Last 7 days using median</p>
                    </div>

                    {/* Metrics row */}
                    <div className="grid grid-cols-4 gap-2 mb-4">
                        {[
                            { label: 'Page Views', value: '2.7K' },
                            { label: 'Bounce Rate', value: '40.6%' },
                            { label: 'Sessions', value: '479K' },
                            { label: 'Avg. Duration', value: '17m' },
                        ].map((m) => (
                            <div key={m.label} className="bg-zinc-900 border border-zinc-800 rounded-lg p-2 lg:p-2.5">
                                <div className="text-xs lg:text-sm font-bold text-zinc-100">{m.value}</div>
                                <div className="text-[7px] lg:text-[8px] text-zinc-500 mt-0.5">{m.label}</div>
                            </div>
                        ))}
                    </div>

                    {/* Chart */}
                    <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 lg:p-4 mb-4">
                        <div className="flex items-center justify-between mb-3">
                            <span className="text-[10px] lg:text-xs font-semibold text-zinc-200">Page Load vs Bounce Rate</span>
                            <div className="flex items-center gap-3">
                                <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500">
                                    <div className="w-2 h-0.5 bg-zinc-500 rounded" />
                                    Load Time
                                </span>
                                <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500">
                                    <div className="w-2 h-0.5 bg-zinc-400 rounded" />
                                    Bounce
                                </span>
                            </div>
                        </div>
                        <div className="relative h-20 lg:h-28">
                            {/* Bar chart */}
                            <div className="absolute inset-0 flex items-end gap-1">
                                {[30, 45, 60, 50, 70, 55, 80, 65, 75, 85, 60, 70].map((h, i) => (
                                    <div key={i} className="flex-1 flex flex-col justify-end">
                                        <div className="w-full rounded-t-sm bg-zinc-700" style={{ height: `${h}%` }} />
                                    </div>
                                ))}
                            </div>
                            {/* Line overlay */}
                            <svg className="absolute inset-0 w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M0,70 Q10,65 20,55 T40,50 T60,45 T80,40 T100,35" fill="none" stroke="rgb(161,161,170)" strokeWidth="1.5" vectorEffect="non-scaling-stroke" />
                            </svg>
                        </div>
                    </div>

                    {/* Bottom row */}
                    <div className="grid grid-cols-2 gap-2">
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                            <div className="flex items-center justify-between mb-2">
                                <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-300">Top Resources</span>
                            </div>
                            <div className="space-y-1.5">
                                {['Modul React', 'Tutorial API', 'CSS Tricks'].map((r, i) => (
                                    <div key={r} className="flex items-center justify-between">
                                        <span className="text-[8px] lg:text-[9px] text-zinc-400">{r}</span>
                                        <div className="flex items-center gap-1">
                                            <div className="h-1 rounded-full bg-zinc-600" style={{ width: `${[80, 60, 45][i]}px` }} />
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                        <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                            <div className="flex items-center justify-between mb-2">
                                <span className="text-[9px] lg:text-[10px] font-semibold text-zinc-300">Active Users</span>
                            </div>
                            <div className="flex items-center gap-1 mb-2">
                                <div className="text-lg lg:text-xl font-bold text-zinc-100">128</div>
                                <span className="text-[8px] lg:text-[9px] text-zinc-400 font-medium flex items-center gap-0.5 mt-1">
                                    <TrendingUp className="size-2.5" />
                                    +12%
                                </span>
                            </div>
                            <div className="flex -space-x-1">
                                {['A', 'M', 'R', 'S', 'K', '+23'].map((u, i) => (
                                    <div key={i} className="w-5 h-5 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[7px] lg:text-[8px] font-semibold text-zinc-200">
                                        {u}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
