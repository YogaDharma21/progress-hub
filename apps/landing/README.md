# Landing Page

Marketing and landing page for **Progress Hub** — built with Next.js 16, React 19, Tailwind CSS v4, and shadcn/ui.

## Tech Stack

- **Framework**: [Next.js 16](https://nextjs.org) (App Router)
- **UI**: [shadcn/ui](https://ui.shadcn.com) + [Tailwind CSS v4](https://tailwindcss.com)
- **Animation**: [Framer Motion](https://www.framer.com/motion/)
- **Language**: TypeScript

## Getting Started

```bash
npm install
npm run dev
```

Open [http://localhost:3000](http://localhost:3000).

## Adding Components

```bash
npx shadcn@latest add button
```

Components are placed in the `components/` directory.

## Project Structure

```
app/
├── layout.tsx          # Root layout with fonts and theme
├── page.tsx            # Landing page (composes all sections)
└── globals.css         # Tailwind config and theme variables

components/
├── ui/                 # shadcn UI primitives
├── hero-*.tsx          # Hero section variants
├── features-*.tsx      # Feature showcase sections
├── content-*.tsx       # Content sections
├── footer-*.tsx        # Footer
└── feature-demos/      # Interactive demo components
```
