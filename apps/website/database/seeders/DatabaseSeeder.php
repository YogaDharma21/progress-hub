<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\EventTopic;
use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectMember;
use App\Models\Resource;
use App\Models\ResourceChapter;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@progresshub.com'],
            [
                'name' => 'Admin Progress Hub',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Create Member Users
        $members = [];
        $userNames = ['Ahmad Fauzi', 'Budi Santoso', 'Citra Dewi', 'Dina Kurnia', 'Eko Prasetyo'];
        foreach ($userNames as $index => $name) {
            $email = strtolower(str_replace(' ', '', $name)) . '@example.com';
            $members[] = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password'),
                    'role' => 'member',
                ]
            );
        }

        // 1. Seed Events
        if (Event::count() === 0) {
            $event1 = Event::create([
                'title' => 'Kelas React Dasar',
                'description' => 'Fundamental React dari nol: komponen, state, useEffect, Router, dan integrasi API. Pembelajaran langsung dengan studi kasus nyata.',
                'status' => 'Berlangsung',
                'type' => 'class',
                'sessions_count' => 8,
                'target_capacity' => 50,
                'progress_percentage' => 65,
                'created_by' => $admin->id,
            ]);

            EventTopic::create([
                'event_id' => $event1->id,
                'title' => 'Komponen & Props',
                'description' => 'Memahami struktur komponen, props, dan cara meneruskan data antar komponen',
                'order' => 1,
            ]);
            EventTopic::create([
                'event_id' => $event1->id,
                'title' => 'State & useEffect',
                'description' => 'Mengelola state lokal dan efek samping dengan hooks React modern',
                'order' => 2,
            ]);
            EventTopic::create([
                'event_id' => $event1->id,
                'title' => 'React Router & API Integration',
                'description' => 'Navigasi single-page application, route protection, dan integrasi API RESTful',
                'order' => 3,
            ]);

            foreach ($members as $m) {
                EventParticipant::create([
                    'event_id' => $event1->id,
                    'user_id' => $m->id,
                    'status' => 'registered',
                    'registered_at' => now()->subDays(rand(1, 10)),
                ]);
            }

            $event2 = Event::create([
                'title' => 'Python Dasar untuk Pemula',
                'description' => 'Syntax, tipe data, loop, fungsi, dan dasar-dasar algoritma komputer untuk mahasiswa pemula.',
                'status' => 'Mendatang',
                'type' => 'class',
                'sessions_count' => 6,
                'target_capacity' => 40,
                'progress_percentage' => 0,
                'created_by' => $admin->id,
            ]);

            EventTopic::create([
                'event_id' => $event2->id,
                'title' => 'Dasar Syntax & Tipe Data',
                'description' => 'Variabel, tipe data, string manipulation, dan input/output',
                'order' => 1,
            ]);
            EventTopic::create([
                'event_id' => $event2->id,
                'title' => 'Struktur Kontrol & Loop',
                'description' => 'If-else statements, for loop, dan while loop',
                'order' => 2,
            ]);

            for ($i = 0; $i < 3; $i++) {
                EventParticipant::create([
                    'event_id' => $event2->id,
                    'user_id' => $members[$i]->id,
                    'status' => 'registered',
                    'registered_at' => now()->subDays(2),
                ]);
            }

            $event3 = Event::create([
                'title' => 'Hackathon Internal 2025',
                'description' => 'Kompetisi 48 jam dalam tim untuk membangun solusi digital kreatif seputar permasalahan kampus.',
                'status' => 'Registration',
                'type' => 'hackathon',
                'sessions_count' => 1,
                'target_capacity' => 100,
                'progress_percentage' => 15,
                'created_by' => $admin->id,
            ]);

            EventTopic::create([
                'event_id' => $event3->id,
                'title' => 'Opening & Brainstorming Ide',
                'description' => 'Pengenalan tema kompetisi, aturan main, dan pembentukan tim',
                'order' => 1,
            ]);
            EventTopic::create([
                'event_id' => $event3->id,
                'title' => 'Sprint Coding 48 Jam',
                'description' => 'Sesi pengerjaan produk MVP secara mandiri bersama mentoring teknis',
                'order' => 2,
            ]);
        }

        // 2. Seed Projects
        if (Project::count() === 0) {
            $proj1 = Project::create([
                'title' => 'Sistem E-Voting Kampus',
                'description' => 'Platform voting digital untuk pemilihan organisasi kampus dengan keamanan tinggi. Sistem ini mencakup proses registrasi kandidat, verifikasi pemilih, voting terenkripsi, dan perhitungan hasil real-time.',
                'category' => 'UKM Project',
                'technologies' => 'React, Node.js, PostgreSQL',
                'demo_url' => 'https://evoting-demo.example.com',
                'repository_url' => 'https://github.com/ukm-dev/evoting-kampus',
                'documentation_url' => 'https://docs.evoting-example.com',
                'created_by' => $admin->id,
            ]);

            ProjectFeature::create([
                'project_id' => $proj1->id,
                'title' => 'Verifikasi Identitas',
                'description' => 'Sistem verifikasi mahasiswa dengan data akademik terintegrasi',
            ]);
            ProjectFeature::create([
                'project_id' => $proj1->id,
                'title' => 'Voting Terenkripsi',
                'description' => 'Pemungutan suara dengan enkripsi end-to-end untuk integritas data',
            ]);
            ProjectFeature::create([
                'project_id' => $proj1->id,
                'title' => 'Hasil Real-time',
                'description' => 'Monitor perolehan suara secara langsung dengan dashboard statistik',
            ]);

            foreach (array_slice($members, 0, 3) as $idx => $m) {
                ProjectMember::create([
                    'project_id' => $proj1->id,
                    'user_id' => $m->id,
                    'role' => $idx === 0 ? 'Fullstack Lead' : 'Backend Engineer',
                ]);
            }

            $proj2 = Project::create([
                'title' => 'Website Portal Berita UKM',
                'description' => 'Portal berita dan dokumentasi kegiatan UKM dengan CMS kustom untuk mempublikasikan artikel, event, dan rilisan produk mahasiswa.',
                'category' => 'UKM Project',
                'technologies' => 'Next.js, Tailwind, MDX',
                'demo_url' => 'https://portal-berita.example.com',
                'repository_url' => 'https://github.com/ukm-dev/news-portal',
                'documentation_url' => null,
                'created_by' => $admin->id,
            ]);

            ProjectFeature::create([
                'project_id' => $proj2->id,
                'title' => 'CMS Berbasis MDX',
                'description' => 'Menulis artikel menggunakan sintaks markdown modern dengan komponen UI kaya',
            ]);
            ProjectFeature::create([
                'project_id' => $proj2->id,
                'title' => 'Optimasi SEO & Speed',
                'description' => 'Server-side rendering untuk performa akses cepat di mobile maupun desktop',
            ]);

            foreach (array_slice($members, 2, 2) as $idx => $m) {
                ProjectMember::create([
                    'project_id' => $proj2->id,
                    'user_id' => $m->id,
                    'role' => 'Frontend Developer',
                ]);
            }

            $proj3 = Project::create([
                'title' => 'CLI Task Manager (Rust)',
                'description' => 'Tools CLI cepat dan efisien untuk manajemen tugas harian dengan fitur pomodoro timer terintegrasi.',
                'category' => 'Member Project',
                'technologies' => 'Rust, CLI, Open Source',
                'demo_url' => null,
                'repository_url' => 'https://github.com/ahmadfauzi/rust-task-cli',
                'documentation_url' => 'https://github.com/ahmadfauzi/rust-task-cli#readme',
                'created_by' => $members[0]->id,
            ]);

            ProjectFeature::create([
                'project_id' => $proj3->id,
                'title' => 'Interactive TUI',
                'description' => 'Antarmuka terminal interaktif menggunakan ratatui',
            ]);
            ProjectFeature::create([
                'project_id' => $proj3->id,
                'title' => 'Pomodoro Timer',
                'description' => 'Timer terintegrasi dengan suara notifikasi terminal',
            ]);

            ProjectMember::create([
                'project_id' => $proj3->id,
                'user_id' => $members[0]->id,
                'role' => 'Creator & Maintainer',
            ]);
        }

        // 3. Seed Resources
        if (Resource::count() === 0) {
            $res1 = Resource::create([
                'title' => 'Modul Dasar React untuk Pemula',
                'description' => 'Panduan langkah demi langkah memahami komponen, props, state, dan lifecycle React. Modul ini dirancang untuk pemula yang ingin mempelajari React dari nol dengan pendekatan praktis dan contoh nyata.',
                'type' => 'module',
                'tags' => 'React, Frontend, JavaScript',
                'file_path' => 'https://example.com/modul-react.pdf',
                'views_count' => 1250,
                'created_by' => $admin->id,
            ]);

            ResourceChapter::create([
                'resource_id' => $res1->id,
                'chapter_number' => 1,
                'title' => 'Bab 1: Pengenalan React',
                'description' => 'Apa itu React, keunggulan Virtual DOM, dan setup lingkungan development',
            ]);
            ResourceChapter::create([
                'resource_id' => $res1->id,
                'chapter_number' => 2,
                'title' => 'Bab 2: Komponen & Props',
                'description' => 'Struktur komponen, props, dan data flow dalam React',
            ]);
            ResourceChapter::create([
                'resource_id' => $res1->id,
                'chapter_number' => 3,
                'title' => 'Bab 3: State & Hooks',
                'description' => 'useState, useEffect, dan manajemen state yang efektif',
            ]);

            $res2 = Resource::create([
                'title' => 'Debugging JavaScript: Tips & Trik',
                'description' => 'Teknik efektif debugging dengan Chrome DevTools, logging strategis, penanganan async/await, dan tools pemantau error otomatis.',
                'type' => 'article',
                'tags' => 'JavaScript, Debugging, DevTools',
                'file_path' => null,
                'views_count' => 842,
                'created_by' => $admin->id,
            ]);

            ResourceChapter::create([
                'resource_id' => $res2->id,
                'chapter_number' => 1,
                'title' => 'Menggunakan Console & Breakpoints',
                'description' => 'Panduan mengatur breakpoint kondisional dan memantau variabel runtime',
            ]);
            ResourceChapter::create([
                'resource_id' => $res2->id,
                'chapter_number' => 2,
                'title' => 'Network & Performance Tab',
                'description' => 'Analisis latensi request API dan memori leak pada aplikasi JS',
            ]);

            $res3 = Resource::create([
                'title' => 'Deploy Aplikasi dengan Docker',
                'description' => 'Panduan lengkap containerization dan deployment multi-environment menggunakan Dockerfile dan Docker Compose.',
                'type' => 'tool',
                'tags' => 'DevOps, Docker, Deployment',
                'file_path' => 'https://example.com/docker-guide.pdf',
                'views_count' => 934,
                'created_by' => $admin->id,
            ]);

            ResourceChapter::create([
                'resource_id' => $res3->id,
                'chapter_number' => 1,
                'title' => 'Konsep Container & Image',
                'description' => 'Memahami arsitektur Docker dan perintah dasar CLI',
            ]);
            ResourceChapter::create([
                'resource_id' => $res3->id,
                'chapter_number' => 2,
                'title' => 'Docker Compose & Multi-Container',
                'description' => 'Menjalankan web app, database, dan cache server dalam satu konfigurasi',
            ]);
        }
    }
}
