import type { SVGProps } from 'react'

export const Perplexity = (props: SVGProps<SVGSVGElement>) => (
    <svg
        {...props}
        preserveAspectRatio="xMidYMid"
        viewBox="0 0 256 256"
    >
        <path
            fill="currentColor"
            d="M128 0C57.3 0 0 57.3 0 128s57.3 128 128 128 128-57.3 128-128S198.7 0 128 0zm0 240c-61.9 0-112-50.1-112-112S66.1 16 128 16s112 50.1 112 112-50.1 112-112 112zm0-184c-40 0-72 32-72 72s32 72 72 72 72-32 72-72-32-72-72-72zm0 120c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"
        />
    </svg>
)
