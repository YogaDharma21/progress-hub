# Architecture Documentation

## Project Structure

```
progress-hub/
├── apps/
│   ├── website/    # Laravel 13 main application
│   └── landing/    # Next.js 16 marketing site
├── docs/           # Documentation
└── .github/        # GitHub workflows
```

## Monorepo Layout

Two independent apps with no shared code between them:

- **`apps/website`** — Laravel 13 (PHP 8.3+), Blade templates, Tailwind CSS v4, Vite 8. The main community platform with admin/member dashboards, events, projects, resources, and submissions.
- **`apps/landing`** — Next.js 16 (React 19, TypeScript), shadcn/ui, Tailwind CSS v4, Framer Motion. Marketing/landing page.

## CI/CD

Path-based filtering runs only relevant jobs:
- Changes to `apps/website/**` trigger PHP tests (Pest)
- Changes to `apps/landing/**` trigger Node.js build
