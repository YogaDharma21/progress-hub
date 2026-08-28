import Link from 'next/link'
import { Logo } from '@/components/logo'

const footerLinks = [
    {
        name: 'Platform',
        links: [
            { href: 'https://progress-hub.laravel.cloud/members', label: 'Events' },
            { href: 'https://progress-hub.laravel.cloud/members/projects', label: 'Projects' },
            { href: 'https://progress-hub.laravel.cloud/members/resources', label: 'Resources' },
        ],
    },
    {
        name: 'Akun',
        links: [
            { href: 'https://progress-hub.laravel.cloud/login', label: 'Login' },
            { href: 'https://progress-hub.laravel.cloud/register', label: 'Register' },
        ],
    },
]

export default function Footer() {
    return (
        <footer>
            <div className="mx-auto max-w-7xl space-y-16 px-6 pb-6 pt-32">
                <div className="grid grid-cols-2 gap-x-3 gap-y-12 sm:grid-cols-4 lg:grid-cols-6">
                    <div className="col-span-full lg:col-span-3">
                        <Link
                            href="/"
                            aria-label="go home"
                        >
                            <Logo uniColor />
                        </Link>
                    </div>

                    {footerLinks.map((linksGroup, index) => (
                        <div key={index}>
                            <span className="text-foreground text-sm">{linksGroup.name}</span>
                            <ul className="mt-4 list-inside space-y-4">
                                {linksGroup.links.map((link, index) => (
                                    <li key={index}>
                                        <Link
                                            href={link.href}
                                            className="hover:text-primary text-muted-foreground text-sm duration-150"
                                        >
                                            {link.label}
                                        </Link>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    ))}
                </div>
                <div className="mt-24 border-t pt-6">
                    <span className="text-muted-foreground block text-sm">&copy; 2026 <a href="https://github.com/yogaDharma21/" className="hover:text-foreground underline underline-offset-4">Yoga Dharma</a> · <a href="https://github.com/YogaDharma21/progress-hub" className="hover:text-foreground underline underline-offset-4">Progress Hub</a></span>
                </div>
            </div>
        </footer>
    )
}
