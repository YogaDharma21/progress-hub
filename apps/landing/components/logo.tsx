import { cn } from '@/lib/utils'

export const Logo = ({ className, uniColor }: { className?: string; uniColor?: boolean }) => {
    return (
        <div className={cn('flex items-center gap-2', className)}>
            <svg
                className="h-6 w-6 shrink-0"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect
                    x="3"
                    y="3"
                    width="8"
                    height="8"
                    rx="2"
                    fill={uniColor ? 'currentColor' : 'url(#paint_logo)'}
                />
                <rect
                    x="13"
                    y="13"
                    width="8"
                    height="8"
                    rx="2"
                    fill={uniColor ? 'currentColor' : 'url(#paint_logo)'}
                    opacity="0.6"
                />
                <rect
                    x="13"
                    y="3"
                    width="8"
                    height="8"
                    rx="2"
                    fill={uniColor ? 'currentColor' : 'url(#paint_logo)'}
                    opacity="0.3"
                />
                <defs>
                    <linearGradient
                        id="paint_logo"
                        x1="0"
                        y1="0"
                        x2="24"
                        y2="24"
                        gradientUnits="userSpaceOnUse">
                        <stop stopColor="#9B99FE" />
                        <stop
                            offset="1"
                            stopColor="#2BC8B7"
                        />
                    </linearGradient>
                </defs>
            </svg>
            <span className="text-foreground font-semibold">Progress Hub</span>
        </div>
    )
}

export const LogoIcon = ({ className, uniColor }: { className?: string; uniColor?: boolean }) => {
    return (
        <svg
            className={cn('size-6', className)}
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect
                x="3"
                y="3"
                width="8"
                height="8"
                rx="2"
                fill={uniColor ? 'currentColor' : 'url(#paint_logo_icon)'}
            />
            <rect
                x="13"
                y="13"
                width="8"
                height="8"
                rx="2"
                fill={uniColor ? 'currentColor' : 'url(#paint_logo_icon)'}
                opacity="0.6"
            />
            <rect
                x="13"
                y="3"
                width="8"
                height="8"
                rx="2"
                fill={uniColor ? 'currentColor' : 'url(#paint_logo_icon)'}
                opacity="0.3"
            />
            <defs>
                <linearGradient
                    id="paint_logo_icon"
                    x1="0"
                    y1="0"
                    x2="24"
                    y2="24"
                    gradientUnits="userSpaceOnUse">
                    <stop stopColor="#9B99FE" />
                    <stop
                        offset="1"
                        stopColor="#2BC8B7"
                    />
                </linearGradient>
            </defs>
        </svg>
    )
}
