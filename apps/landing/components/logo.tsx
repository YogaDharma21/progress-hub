import Image from 'next/image'
import { cn } from '@/lib/utils'

export const Logo = ({ className, uniColor }: { className?: string; uniColor?: boolean }) => {
    return (
        <div className={cn('flex items-center gap-2', className)}>
            <Image
                src="/icon-192.png"
                alt="Progress Hub"
                width={24}
                height={24}
                className="h-6 w-6 shrink-0"
            />
            <span className="text-foreground font-semibold">Progress Hub</span>
        </div>
    )
}

export const LogoIcon = ({ className, uniColor }: { className?: string; uniColor?: boolean }) => {
    return (
        <Image
            src="/icon-192.png"
            alt="Progress Hub"
            width={24}
            height={24}
            className={cn('size-6', className)}
        />
    )
}
