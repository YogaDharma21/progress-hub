# Website

Main application for **Progress Hub** — built with Laravel 13, Blade Templates, Tailwind CSS v4, and Vite.

## Features

- **Authentication & Authorization**: Role-based access control (`admin` and `member`)
- **Member Submission Flow**: Members submit events, projects, and resources for admin approval
- **Admin Approval**: Review, approve, or reject submissions with reasons
- **Event Management**: Create, browse, and register for events with topic tracking
- **Project Showcase**: Display projects with tech stack, features, and team members
- **Learning Resources**: Structured modules, articles, and tools with chapter navigation
- **Dashboards**: Member dashboard with submission status; admin dashboard with activity feed

## Tech Stack

- **Backend**: [PHP 8.3+](https://php.net), [Laravel 13.x](https://laravel.com)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade), [Tailwind CSS v4](https://tailwindcss.com), [Vite](https://vitejs.dev)
- **Database**: MySQL
- **Testing**: [Pest PHP](https://pestphp.com)

## Getting Started

### Prerequisites

- **PHP** >= 8.3
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm**

### Installation

```bash
# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Set up database
php artisan migrate --seed

# Run development server
composer run dev
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000).

### Default Accounts

| Role | Email | Password |
|---|---|---|
| **Admin** | `admin@progresshub.com` | `password` |
| **Member** | `ahmadfauzi@example.com` | `password` |
| **Member** | `budisantoso@example.com` | `password` |
| **Member** | `citradewi@example.com` | `password` |

## Project Structure

```text
app/
├── Http/Controllers/           # Application controllers
│   ├── Admin/                  # Admin-specific controllers
│   └── Member/                 # Member submission controllers
├── Http/Middleware/             # RoleMiddleware
└── Models/                     # Eloquent models (User, Event, Project, Resource, Submission, etc.)

database/
├── migrations/                 # Database schema migrations
└── seeders/                    # Database seeders

resources/
├── css/                        # Tailwind styling & theme config
└── views/
    ├── layouts/                # Layouts (admin, app, guest)
    ├── admin/                  # Admin panel views
    ├── members/                # Member dashboard & browsing views
    └── auth/                   # Login & register views

routes/
└── web.php                     # Web route definitions

tests/                          # Pest test suites
```

## License

This project is open-sourced software licensed under the [MIT License](../LICENSE).
