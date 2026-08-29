import { Calendar, FolderGit2, BookOpen, Clock, Users } from 'lucide-react'
import Image from 'next/image'

export default function HeroDemo() {
    return (
        <>
            {/* Main dashboard panel (left) */}
            <div className="w-2/3 pt-6 lg:pt-16">
                <div className="bg-card relative h-full overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                    <div className="bg-zinc-950 min-h-[300px] lg:min-h-[420px]">
                        {/* Navbar */}
                        <div className="flex items-center justify-between px-4 lg:px-5 py-3 border-b border-zinc-800/60">
                            <div className="flex items-center gap-2">
                                <Image src="/icon-192.png" alt="Progress Hub" width={18} height={18} className="rounded" />
                                <span className="text-[11px] font-semibold text-zinc-100">Progress Hub</span>
                            </div>
                            <div className="hidden sm:flex items-center gap-5">
                                {['Events', 'Projects', 'Resources'].map((item) => (
                                    <span key={item} className="text-[10px] text-zinc-400">{item}</span>
                                ))}
                            </div>
                            <div className="flex items-center gap-2">
                                <div className="w-5 h-5 rounded-full bg-zinc-700 flex items-center justify-center text-[8px] font-semibold text-zinc-200">M</div>
                            </div>
                        </div>

                        <div className="p-4 lg:p-5">
                            {/* Dashboard heading */}
                            <h3 className="text-sm lg:text-base font-bold text-zinc-100 tracking-tight">Dashboard</h3>
                            <p className="text-[9px] lg:text-[10px] text-zinc-500 mt-0.5">Ringkasan data Progress Hub.</p>

                            {/* Stats row */}
                            <div className="grid grid-cols-4 gap-2 lg:gap-3 mt-3 lg:mt-4">
                                {[
                                    { label: 'Events', value: '4' },
                                    { label: 'Projects', value: '2' },
                                    { label: 'Resources', value: '2' },
                                    { label: 'Users', value: '8' },
                                ].map((stat) => (
                                    <div key={stat.label} className="bg-zinc-900 border border-zinc-800 rounded-xl p-2.5 lg:p-3">
                                        <div className="text-sm lg:text-base font-bold text-zinc-100">{stat.value}</div>
                                        <div className="text-[8px] lg:text-[9px] text-zinc-500">{stat.label}</div>
                                    </div>
                                ))}
                            </div>

                            {/* Chart + Activity */}
                            <div className="grid grid-cols-1 lg:grid-cols-5 gap-3 mt-4 lg:mt-5">
                                {/* Activity Chart */}
                                <div className="lg:col-span-3 bg-zinc-900 border border-zinc-800 rounded-xl p-3 lg:p-4">
                                    <h4 className="text-[10px] lg:text-[11px] font-semibold text-zinc-100 mb-3">Aktivitas 7 Hari</h4>
                                    <div className="flex items-end gap-1.5 h-20 lg:h-28">
                                        {[
                                            { day: 'Min', vals: [0, 0, 0] },
                                            { day: 'Sen', vals: [0, 0, 0] },
                                            { day: 'Sel', vals: [0, 0, 0] },
                                            { day: 'Rab', vals: [0, 0, 0] },
                                            { day: 'Kam', vals: [0, 0, 0] },
                                            { day: 'Jum', vals: [0, 0, 0] },
                                            { day: 'Sab', vals: [2, 1, 1] },
                                        ].map((d) => (
                                            <div key={d.day} className="flex-1 flex flex-col items-center gap-1">
                                                <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '80px' }}>
                                                    {d.vals[0] > 0 && <div className="w-full rounded-sm bg-zinc-600" style={{ height: `${(d.vals[0] / 3) * 100}%`, minHeight: '4px' }} />}
                                                    {d.vals[1] > 0 && <div className="w-full rounded-sm bg-zinc-500" style={{ height: `${(d.vals[1] / 3) * 100}%`, minHeight: '4px' }} />}
                                                    {d.vals[2] > 0 && <div className="w-full rounded-sm bg-zinc-400" style={{ height: `${(d.vals[2] / 3) * 100}%`, minHeight: '4px' }} />}
                                                    {d.vals.every(v => v === 0) && <div className="w-full h-px bg-zinc-800" />}
                                                </div>
                                                <span className="text-[7px] lg:text-[8px] text-zinc-500">{d.day}</span>
                                            </div>
                                        ))}
                                    </div>
                                    <div className="flex items-center gap-3 mt-2">
                                        <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-600"></div>Events</span>
                                        <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-500"></div>Projects</span>
                                        <span className="flex items-center gap-1 text-[7px] lg:text-[8px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-400"></div>Resources</span>
                                    </div>
                                </div>

                                {/* Activity Feed */}
                                <div className="lg:col-span-2 bg-zinc-900 border border-zinc-800 rounded-xl">
                                    <div className="px-3 lg:px-4 py-2.5 lg:py-3 border-b border-zinc-800">
                                        <h4 className="text-[10px] lg:text-[11px] font-semibold text-zinc-100">Aktivitas Terbaru</h4>
                                    </div>
                                    <div className="divide-y divide-zinc-800">
                                        {[
                                            { type: 'event', title: 'Hackathon Sprint', time: '2m lalu', icon: Calendar },
                                            { type: 'event', title: 'React Deep Dive', time: '15m lalu', icon: Calendar },
                                            { type: 'project', title: 'Progress Hub', time: '1j lalu', icon: FolderGit2 },
                                            { type: 'resource', title: 'Modul React', time: '3 hari lalu', icon: BookOpen },
                                        ].map((item, i) => (
                                            <div key={i} className="px-3 lg:px-4 py-2 flex items-center gap-2">
                                                <div className="w-6 h-6 rounded-md bg-zinc-950 flex items-center justify-center shrink-0">
                                                    <item.icon className="size-3 text-zinc-400" />
                                                </div>
                                                <div className="min-w-0 flex-1">
                                                    <p className="text-[9px] lg:text-[10px] text-zinc-100 font-medium truncate">{item.title}</p>
                                                    <p className="text-[7px] lg:text-[8px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Dashboard panel (right/overlapping) */}
            <div className="bg-card relative h-full w-2/3 overflow-hidden rounded-t-2xl shadow-2xl shadow-black/35 ring-1 ring-black/10">
                <div className="bg-zinc-950 p-4 lg:p-6 min-h-[300px] lg:min-h-[420px]">
                    {/* Stats */}
                    <div className="grid grid-cols-4 gap-2 mb-4">
                        {[
                            { label: 'Events', value: '4' },
                            { label: 'Projects', value: '2' },
                            { label: 'Resources', value: '2' },
                            { label: 'Users', value: '8' },
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
                            <span className="text-[10px] lg:text-xs font-semibold text-zinc-200">Aktivitas 7 Hari</span>
                        </div>
                        <div className="flex items-end gap-1 h-20 lg:h-28">
                            {[
                                { day: 'Min', vals: [0, 0, 0] },
                                { day: 'Sen', vals: [0, 0, 0] },
                                { day: 'Sel', vals: [0, 0, 0] },
                                { day: 'Rab', vals: [0, 0, 0] },
                                { day: 'Kam', vals: [0, 0, 0] },
                                { day: 'Jum', vals: [0, 0, 0] },
                                { day: 'Sab', vals: [2, 1, 1] },
                            ].map((d) => (
                                <div key={d.day} className="flex-1 flex flex-col items-center gap-1">
                                    <div className="w-full flex flex-col justify-end gap-0.5" style={{ height: '70px' }}>
                                        {d.vals[0] > 0 && <div className="w-full rounded-t-sm bg-zinc-700" style={{ height: `${(d.vals[0] / 3) * 100}%`, minHeight: '4px' }} />}
                                        {d.vals[1] > 0 && <div className="w-full rounded-t-sm bg-zinc-600" style={{ height: `${(d.vals[1] / 3) * 100}%`, minHeight: '4px' }} />}
                                        {d.vals[2] > 0 && <div className="w-full rounded-t-sm bg-zinc-500" style={{ height: `${(d.vals[2] / 3) * 100}%`, minHeight: '4px' }} />}
                                        {d.vals.every(v => v === 0) && <div className="w-full h-px bg-zinc-800" />}
                                    </div>
                                    <span className="text-[7px] text-zinc-500">{d.day}</span>
                                </div>
                            ))}
                        </div>
                        <div className="flex items-center gap-3 mt-2">
                            <span className="flex items-center gap-1 text-[7px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-700"></div>Events</span>
                            <span className="flex items-center gap-1 text-[7px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-600"></div>Projects</span>
                            <span className="flex items-center gap-1 text-[7px] text-zinc-500"><div className="w-1.5 h-1.5 rounded-sm bg-zinc-500"></div>Resources</span>
                        </div>
                    </div>

                    {/* Activity Feed */}
                    <div className="bg-zinc-900 border border-zinc-800 rounded-lg p-3 lg:p-4">
                        <div className="flex items-center justify-between mb-2.5">
                            <span className="text-[10px] lg:text-xs font-semibold text-zinc-200">Aktivitas Terbaru</span>
                        </div>
                        <div className="space-y-2">
                            {[
                                { type: 'Event', title: 'Hackathon Sprint', time: '2m lalu', icon: Calendar },
                                { type: 'Event', title: 'React Deep Dive', time: '15m lalu', icon: Calendar },
                                { type: 'Project', title: 'Progress Hub', time: '1j lalu', icon: FolderGit2 },
                                { type: 'Resource', title: 'Modul React', time: '3 hari lalu', icon: BookOpen },
                            ].map((item, i) => (
                                <div key={i} className="flex items-center gap-2">
                                    <div className="w-5 h-5 rounded bg-zinc-950 flex items-center justify-center shrink-0">
                                        <item.icon className="size-2.5 lg:size-3 text-zinc-400" />
                                    </div>
                                    <div className="min-w-0 flex-1">
                                        <p className="text-[8px] lg:text-[9px] text-zinc-100 font-medium truncate">{item.title}</p>
                                        <p className="text-[6px] lg:text-[7px] text-zinc-500">{item.type} &middot; {item.time}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
