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
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with comprehensive programming data.
     */
    public function run(): void
    {
        // ponytail: Truncating allows clean re-runs during development. Switch to safe diff sync when preserving user records.
        Schema::disableForeignKeyConstraints();
        Submission::truncate();
        EventParticipant::truncate();
        EventTopic::truncate();
        ProjectMember::truncate();
        ProjectFeature::truncate();
        ResourceChapter::truncate();
        Event::truncate();
        Project::truncate();
        Resource::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // Single hash compute for snappy seeding
        $defaultPassword = Hash::make('password');

        // 1. Create Admin User
        $admin = User::create([
            'name' => 'Admin Progress Hub',
            'email' => 'admin@progresshub.com',
            'password' => $defaultPassword,
            'role' => 'admin',
        ]);

        // 2. Create Diverse Member Users (25 members)
        $memberData = [
            ['name' => 'Ahmad Fauzi', 'email' => 'ahmadfauzi@example.com'],
            ['name' => 'Budi Santoso', 'email' => 'budisantoso@example.com'],
            ['name' => 'Citra Dewi', 'email' => 'citradewi@example.com'],
            ['name' => 'Dina Kurnia', 'email' => 'dinakurnia@example.com'],
            ['name' => 'Eko Prasetyo', 'email' => 'ekoprasetyo@example.com'],
            ['name' => 'Farhan Ramadhan', 'email' => 'farhanramadhan@example.com'],
            ['name' => 'Gita Safitri', 'email' => 'gitasafitri@example.com'],
            ['name' => 'Hendra Wijaya', 'email' => 'hendrawijaya@example.com'],
            ['name' => 'Indah Permata', 'email' => 'indahpermata@example.com'],
            ['name' => 'Joko Susilo', 'email' => 'jokosusilo@example.com'],
            ['name' => 'Kevin Pratama', 'email' => 'kevinpratama@example.com'],
            ['name' => 'Larasati Putri', 'email' => 'larasatiputri@example.com'],
            ['name' => 'Muhammad Rizky', 'email' => 'muhammadrizky@example.com'],
            ['name' => 'Nabila Zahra', 'email' => 'nabilazahra@example.com'],
            ['name' => 'Oscar Fernando', 'email' => 'oscarfernando@example.com'],
            ['name' => 'Putri Anggraini', 'email' => 'putrianggraini@example.com'],
            ['name' => 'Qonita Rahma', 'email' => 'qonitarahma@example.com'],
            ['name' => 'Raditya Pratama', 'email' => 'radityapratama@example.com'],
            ['name' => 'Siti Nurhaliza', 'email' => 'sitinurhaliza@example.com'],
            ['name' => 'Taufik Hidayat', 'email' => 'taufikhidayat@example.com'],
            ['name' => 'Umar Al-Faruq', 'email' => 'umaralfaruq@example.com'],
            ['name' => 'Vina Melinda', 'email' => 'vinamelinda@example.com'],
            ['name' => 'Wahyu Setiawan', 'email' => 'wahyusetiawan@example.com'],
            ['name' => 'Yogi Saputra', 'email' => 'yogisaputra@example.com'],
            ['name' => 'Zulfikar Ali', 'email' => 'zulfikarali@example.com'],
        ];

        $members = [];
        foreach ($memberData as $m) {
            $members[] = User::create([
                'name' => $m['name'],
                'email' => $m['email'],
                'password' => $defaultPassword,
                'role' => 'member',
            ]);
        }

        // ==========================================
        // 3. SEED EVENTS (28 total: 25 approved, 2 pending, 1 rejected)
        // ==========================================
        $eventsSeed = [
            [
                'title' => 'Kelas React & Next.js App Router Masterclass',
                'description' => 'Pendalaman arsitektur React 19 dan Next.js App Router: Server Components, Streaming SSR, Server Actions, Caching strategies, dan integrasi backend modern.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 10,
                'target_capacity' => 60,
                'progress_percentage' => 70,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'React Server Components vs Client Boundaries', 'description' => 'Pemahaman mendalam isolasi server/client, serialization, dan optimal bundle size.'],
                    ['title' => 'Streaming SSR & Suspense Architecture', 'description' => 'Pemuatan UI progresif dengan instant loading states dan parallel routes.'],
                    ['title' => 'Server Actions & Revalidation Mutasi Data', 'description' => 'Mutasi data tanpa endpoint API eksplisit, optimistik UI, dan validasi form Zod.'],
                    ['title' => 'Advanced Routing: Intercepting & Parallel Routes', 'description' => 'Membangun modal kompleks, tab navigasi independen, dan nested layouts.'],
                ],
            ],
            [
                'title' => 'Kelas Fundamental Rust: Ownership, Borrowing & Concurrency',
                'description' => 'Mempelajari bahasa pemrograman sistem Rust dari dasar: memori safety tanpa garbage collector, ownership, lifetimes, traits, dan fearless concurrency.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 45,
                'progress_percentage' => 50,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Ownership Model & Borrowing Checker', 'description' => 'Aturan kepemilikan memori, immutable vs mutable borrow, dan mencegah dangling references.'],
                    ['title' => 'Structs, Enums & Exhaustive Pattern Matching', 'description' => 'Pemodelan data aman dengan Option dan Result tanpa null pointer exception.'],
                    ['title' => 'Traits, Generics & Lifetime Annotations', 'description' => 'Abstraksi polymorphism nol biaya runtime dan syntax anotasi lifetime eksplisit.'],
                    ['title' => 'Fearless Concurrency dengan Threads & Channels', 'description' => 'Komunikasi antar-thread menggunakan CSP mpsc channel dan Arc/Mutex synchronization.'],
                ],
            ],
            [
                'title' => 'Kelas Backend Engineering dengan Go & gRPC',
                'description' => 'Pembangunan layanan mikro performa tinggi menggunakan Go, gRPC, Protocol Buffers, dan integrasi database transaksional.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 50,
                'progress_percentage' => 62,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Goroutines, Channels & Context Propagation', 'description' => 'Manajemen concurrency ringan, pembatalan request cascading, dan timeout deadline.'],
                    ['title' => 'Protocol Buffers v3 & Schema First Design', 'description' => 'Mendefinisikan service contract, protobuf generation, dan backward compatibility.'],
                    ['title' => 'Interceptors, Middleware & Auth JWT', 'description' => 'Logging otomatis, rate limiter interceptor, dan token verifikasi pada level RPC.'],
                    ['title' => 'Database Transactions & Connection Pooling', 'description' => 'Manajemen transaksi ACID pada PostgreSQL menggunakan SQLX dan database migration.'],
                ],
            ],
            [
                'title' => 'Kelas Database Internals & PostgreSQL Optimization',
                'description' => 'Eksplorasi engine PostgreSQL: struktur penyimpanan heap, indeks B-Tree/GIN, analisis query planner, dan tuning konkurensi MVCC.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 6,
                'target_capacity' => 40,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Anatomi Indexing: B-Tree, Hash, GIN, dan GiST', 'description' => 'Kapan menggunakan indeks multi-kolom, partial index, dan indeks JSONB.'],
                    ['title' => 'Membaca & Mengoptimasi EXPLAIN ANALYZE', 'description' => 'Memahami Sequential Scan, Index Scan, Bitmap Heap Scan, dan Nested Loop Join.'],
                    ['title' => 'MVCC, Vacuuming, dan Transaction Isolation', 'description' => 'Mekanisme tuple versioning, mencegah write skew, dan tuning autovacuum agresif.'],
                ],
            ],
            [
                'title' => 'Kelas Docker & Container Orchestration Dasar',
                'description' => 'Containerization aplikasi dari nol: pembuatan Dockerfile yang aman dan minimalis, multi-stage build, container networking, dan compose multi-service.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 6,
                'target_capacity' => 50,
                'progress_percentage' => 35,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Arsitektur Container vs Virtual Machine', 'description' => 'Namespace, cgroups, layered filesystem, dan runtime containerd.'],
                    ['title' => 'Dockerfile Multi-Stage Build Minimalis', 'description' => 'Mengurangi ukuran image dari ratusan MB menjadi sub-20MB menggunakan Alpine/Distroless.'],
                    ['title' => 'Docker Networking & Storage Persistence', 'description' => 'Bridge network, port mapping, volume mounting, dan bind mounts aman.'],
                ],
            ],
            [
                'title' => 'Kelas Kubernetes Essentials: Dari Pods ke Production',
                'description' => 'Praktik orkestrasi container production-grade: Deployments, StatefulSets, Ingress Controller, ConfigMaps, Secrets, dan Helm Packaging.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 40,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Control Plane, Nodes, dan Kubelet Architecture', 'description' => 'Memahami etcd, API Server, Kube-Scheduler, dan arsitektur cluster k8s.'],
                    ['title' => 'Workload Resources: Pods, Deployments & ReplicaSets', 'description' => 'Rolling updates zero-downtime, health checks liveness/readiness.'],
                    ['title' => 'Networking: ClusterIP, NodePort, Ingress & TLS', 'description' => 'Routing traffic eksternal, SSL termination via Cert-Manager.'],
                ],
            ],
            [
                'title' => 'Kelas Machine Learning System Design dengan Python',
                'description' => 'Mendesain arsitektur end-to-end aplikasi AI/ML: pipeline ETL data, pelatihan model scikit-learn, deployment API serving, dan monitoring drift.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 50,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Data Processing & Feature Pipelines', 'description' => 'Pipeline otomatisasi transformasi data numerik & kategorikal dengan Scikit-learn.'],
                    ['title' => 'Model Serving Berlatensi Rendah via FastAPI & ONNX', 'description' => 'Kompilasi model ML ke format ONNX runtime untuk inferensi mikro-detik.'],
                    ['title' => 'Model Registry & Drift Detection', 'description' => 'Pelacakan performa model di production dan retraining trigger otomatis.'],
                ],
            ],
            [
                'title' => 'Kelas Modern Frontend Architecture dengan TypeScript',
                'description' => 'Prinsip arsitektur frontend skala korporat: Strict Type System, State Machine, Microfrontends, dan Monorepo berbasis Turborepo.',
                'status' => 'Selesai',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 55,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Advanced TypeScript: Conditional & Mapped Types', 'description' => 'Utility types kustom, template literal types, dan penegakan strict null.'],
                    ['title' => 'Finite State Machines dengan XState', 'description' => 'Mencegah bug UI state mustahil dengan pemodelan diagram keadaan formal.'],
                    ['title' => 'Monorepo Setup dengan Turborepo & pnpm', 'description' => 'Berbagi UI library, linting config, dan pipeline build caching super cepat.'],
                ],
            ],
            [
                'title' => 'Kelas Flutter Mobile App: Clean Architecture & Bloc',
                'description' => 'Membangun aplikasi mobile cross-platform Android & iOS dengan arsitektur bersih, pemisahan layer independen, dan pattern BLoC state management.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 10,
                'target_capacity' => 45,
                'progress_percentage' => 60,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Widget Tree, InheritedWidget & RenderObject', 'description' => 'Memahami cara kerja rendering skia engine pada Flutter.'],
                    ['title' => 'Clean Architecture: Domain, Data, & Presentation', 'description' => 'Entities, Use Cases, Repository Interfaces, dan Data Sources DTO.'],
                    ['title' => 'State Management Berbasis Event dengan flutter_bloc', 'description' => 'Transisi state deterministik, unit testing Bloc, dan dependency injection GetIt.'],
                ],
            ],
            [
                'title' => 'Kelas Cyber Security: Penetrasi & Web Application Security',
                'description' => 'Panduan hands-on pengujian penetrasi etis web app: OWASP Top 10, SQLi, XSS, CSRF, JWT cracking, dan perbaikan keamanan kode.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 6,
                'target_capacity' => 40,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Eksploitasi & Mitigasi OWASP Top 10', 'description' => 'Injeksi parameter, Broken Access Control, dan Security Misconfiguration.'],
                    ['title' => 'Authentication & Authorization Flaws', 'description' => 'Serangan brute-force token, IDOR, dan validasi signature kriptografi.'],
                    ['title' => 'Security Headers & Content Security Policy (CSP)', 'description' => 'Mencegah serangan XSS dengan konfigurasi CSP ketat dan CORS whitelist.'],
                ],
            ],
            [
                'title' => 'Kelas Linux System Administration & Shell Scripting',
                'description' => 'Automasi tugas sistem operasi server Linux: Process management, systemd service, cron automation, awk/sed, dan hardening SSH.',
                'status' => 'Selesai',
                'type' => 'Kelas',
                'sessions_count' => 6,
                'target_capacity' => 45,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'File Permissions, ACL & Process Management', 'description' => 'Chmod oktal, umask, chown, htop, dan sinyal kill/SIGTERM.'],
                    ['title' => 'Text Wrangling Tingkat Tinggi dengan AWK & SED', 'description' => 'Manipulasi file log gigabyte secara streaming di command line.'],
                    ['title' => 'Systemd Service Creation & Journalctl Logging', 'description' => 'Menjalankan aplikasi backend sebagai background daemon otomatis restart.'],
                ],
            ],
            [
                'title' => 'Kelas Cloud Native Architecture di AWS',
                'description' => 'Mendesain infrastruktur cloud yang scalable dan cost-effective: VPC, EC2, ECS Fargate, Lambda, S3, RDS, dan CloudFront.',
                'status' => 'Open Registration',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 50,
                'progress_percentage' => 10,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'VPC Networking: Subnets, Route Tables, NAT Gateway', 'description' => 'Membangun jaringan aman private dan public subnet.'],
                    ['title' => 'Compute Strategies: EC2 vs ECS Fargate vs Lambda', 'description' => 'Menentukan komputasi berbasis beban kerja dan kalkulasi biaya.'],
                    ['title' => 'Database & Caching: Multi-AZ RDS & ElastiCache', 'description' => 'High availability database dan caching layer terdistribusi.'],
                ],
            ],
            [
                'title' => 'Kelas Algoritma & Struktur Data Tingkat Lanjut',
                'description' => 'Persiapan intensif coding interview: Graf (Dijkstra, Tarjan), Dynamic Programming kompleks, Segment Tree, dan Union-Find.',
                'status' => 'Berlangsung',
                'type' => 'Kelas',
                'sessions_count' => 12,
                'target_capacity' => 40,
                'progress_percentage' => 40,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Graph Theory: Shortest Path & Minimum Spanning Tree', 'description' => 'Implementasi efisien Dijkstra, Bellman-Ford, dan Kruskal.'],
                    ['title' => 'Dynamic Programming: Knapsack & Tree DP', 'description' => 'Teknik memoization, bottom-up tabulation, dan space optimization.'],
                    ['title' => 'Advanced Trees: Trie & Segment Tree with Lazy Propagation', 'description' => 'Range query sub-linear dan manipulasi prefix string cepat.'],
                ],
            ],
            [
                'title' => 'Kelas Fullstack Vue 3 & Nuxt 3',
                'description' => 'Pengembangan web modern reaktif menggunakan Composition API, Script Setup, Pinia State, Nitro Server Engine, dan Server-Side Rendering.',
                'status' => 'Selesai',
                'type' => 'Kelas',
                'sessions_count' => 8,
                'target_capacity' => 45,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Vue 3 Composition API & Reactivity Core', 'description' => 'Ref, reactive, computed, watchEffect, dan custom composables reusable.'],
                    ['title' => 'Nuxt 3 Nitro Engine & Hybrid Rendering', 'description' => 'Server routes, edge caching, ISR, dan integrasi Tailwind.'],
                    ['title' => 'Pinia State Management & Auto-imports', 'description' => 'Modular state, SSR hydration safe, dan type-safe actions.'],
                ],
            ],
            [
                'title' => 'Kelas CI/CD Pipeline Automation dengan GitHub Actions',
                'description' => 'Otomasi siklus rilis perangkat lunak: automated testing gates, multi-arch docker builds, secret scanning, dan continuous deployment ke VPS.',
                'status' => 'Registration',
                'type' => 'Kelas',
                'sessions_count' => 4,
                'target_capacity' => 50,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Workflow Triggers, Runners, & Job Dependencies', 'description' => 'Menyusun pipeline paralel, fail-fast matrix, dan composite actions.'],
                    ['title' => 'Automated Build, Test, & Lint Verification', 'description' => 'Menjaga kualitas kode master branch dengan status check PR wajib.'],
                    ['title' => 'Zero-Downtime Deployment via SSH & Webhooks', 'description' => 'Deploy otomatis menggunakan rsync/docker stack saat release tag dibuat.'],
                ],
            ],
            [
                'title' => 'Hackathon Campus Solution Sprint 2026',
                'description' => 'Kompetisi hackathon 48 jam antar-mahasiswa untuk membangun solusi digital nyata bagi masalah mobilitas, akademik, dan fasilitas kampus.',
                'status' => 'Berlangsung',
                'type' => 'Hackathon',
                'sessions_count' => 4,
                'target_capacity' => 120,
                'progress_percentage' => 50,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Opening Ceremony & Problem Statement Reveal', 'description' => 'Pembagian tantangan resmi: transit kampus, food waste kantin, dan jadwal lab.'],
                    ['title' => 'Sprint Coding 48 Jam & Technical Mentoring', 'description' => 'Sesi prototyping kilat didampingi alumni senior software engineer.'],
                    ['title' => 'Final Pitching, Live Demo & Judging', 'description' => 'Presentasi produk di hadapan dewan juri akademisi dan industri.'],
                ],
            ],
            [
                'title' => 'Hackathon Open Source AI Challenge',
                'description' => 'Membangun aplikasi open-source inovatif berbasis model LLM lokal dan distributed AI agents dalam sprint 36 jam.',
                'status' => 'Registration',
                'type' => 'Hackathon',
                'sessions_count' => 3,
                'target_capacity' => 80,
                'progress_percentage' => 15,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'LLM Hack Kickoff & Local Model Setup (Ollama)', 'description' => 'Pemberian akses komputasi GPU dan framework agentik.'],
                    ['title' => 'Hack Sprint: Multi-Agent Collaboration System', 'description' => 'Pengembangan fitur fungsional dengan integrasi RAG dan tool calling.'],
                    ['title' => 'Showcase, Evaluasi Benchmark & Awarding', 'description' => 'Demonstrasi akurasi, efisiensi token, dan kebaruan konsep.'],
                ],
            ],
            [
                'title' => 'Hackathon Web3 & Smart Contract Security Sprint',
                'description' => 'Adu kecepatan menemukan kerentanan pada smart contract dan membangun aplikasi terdesentralisasi yang tahan manipulasi.',
                'status' => 'Selesai',
                'type' => 'Hackathon',
                'sessions_count' => 3,
                'target_capacity' => 60,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Security Audit Briefing & Target Contracts', 'description' => 'Aturan kompetisi Capture The Flag smart contract EVM.'],
                    ['title' => 'Exploit Hunting & Patching Sprint 24 Jam', 'description' => 'Pencarian bug reentrancy, integer overflow, dan access control.'],
                    ['title' => 'Debriefing & Solusi Terbaik Presentasi Tim', 'description' => 'Pembahasan teknik mitigasi bersama auditor keamanan blockchain.'],
                ],
            ],
            [
                'title' => 'Hackathon Green Tech & IoT Innovation Sprint',
                'description' => 'Membangun perangkat keras IoT dan platform cloud monitoring untuk efisiensi energi gedung kampus dan pemantauan kualitas udara.',
                'status' => 'Open Registration',
                'type' => 'Hackathon',
                'sessions_count' => 3,
                'target_capacity' => 70,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Sensor Integration Workshop & Cloud Setup', 'description' => 'Konektivitas ESP32/Raspberry Pi ke broker MQTT kampus.'],
                    ['title' => 'Prototype Construction & Live Telemetry Test', 'description' => 'Perakitan sirkuit sensor dan kalibrasi pembacaan data lingkungan.'],
                    ['title' => 'Demo Produk & Evaluasi Dampak Lingkungan', 'description' => 'Pengujian reliabilitas transmisi data dan efisiensi konsumsi daya.'],
                ],
            ],
            [
                'title' => 'Sharing Session: Menembus Tech Winter & Meraih Offer Perdana',
                'description' => 'Alumni berbagi strategi nyata lolos seleksi software engineer: portofolio GitHub bernilai tinggi, coding assessment, dan negosiasi.',
                'status' => 'Selesai',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 150,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Bedah Portofolio & CV Software Engineer', 'description' => 'Kriteria proyek yang menarik perhatian engineering lead vs proyek tutorial generik.'],
                    ['title' => 'Strategi Lolos Coding Assessment & System Design', 'description' => 'Tips menghadapi Live Coding, komunikasi terstruktur, dan penanganan edge case.'],
                ],
            ],
            [
                'title' => 'Sharing Session: Membangun SaaS Mandiri dari Kamar Kost',
                'description' => 'Kisah sukses membangun produk perangkat lunak berbayar yang menghasilkan pendapatan pasif tanpa modal pemodal ventura.',
                'status' => 'Selesai',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 100,
                'progress_percentage' => 100,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Validasi Ide & Peluncuran MVP dalam 14 Hari', 'description' => 'Menemukan masalah nyata pengguna yang bersedia membayar solusi.'],
                    ['title' => 'Integrasi Payment Gateway & Automasi Billing', 'description' => 'Penanganan webhook pembayaran, langganan recurring, dan pajak digital.'],
                ],
            ],
            [
                'title' => 'Sharing Session: Transisi Monolith ke Event-Driven Microservices',
                'description' => 'Studi kasus dekomposisi sistem monolitik skala jutaan pengguna: kapan harus beralih, mitigasi kegagalan, dan arsitektur Kafka.',
                'status' => 'Mendatang',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 120,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Antipattern Dekomposisi Terlalu Cepat', 'description' => 'Mengapa distributed monolith lebih buruk daripada modular monolith terawat.'],
                    ['title' => 'Eventual Consistency & Pattern Outbox Transaksional', 'description' => 'Menjamin pesan terkirim ke Kafka tanpa data loss saat database commit.'],
                ],
            ],
            [
                'title' => 'Sharing Session: AI Coding Assistants: Memaksimalkan Produktivitas Dev',
                'description' => 'Mengupas workflow engineering masa depan: integrasi Cursor, Copilot CLI, dan agen AI otomatisasi tanpa kehilangan pemahaman fundamental.',
                'status' => 'Berlangsung',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 110,
                'progress_percentage' => 50,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Prompting Berbasis Arsitektur & Context Management', 'description' => 'Menyediakan context files yang tepat untuk hasil generasi kode presisi.'],
                    ['title' => 'Mendeteksi Halusinasi AI & Keamanan Kode Terbuka', 'description' => 'Kritik keamanan terhadap kode yang digenerasi otomatis sebelum masuk production.'],
                ],
            ],
            [
                'title' => 'Sharing Session: Pengalaman Berkontribusi di Repositori Open Source Global',
                'description' => 'Langkah konkret memulai kontribusi di proyek software dunia: mencari good first issue, komunikasi di PR thread, dan review etiquette.',
                'status' => 'Mendatang',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 130,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Navigasi Codebase Raksasa Pertama Kali', 'description' => 'Strategi membaca kode asing, git blame, dan reproduksi issue lokal.'],
                    ['title' => 'Etika Komunikasi dengan Core Maintainers', 'description' => 'Menulis deskripsi PR yang ringkas, tes regresi, dan menerima feedback konstruktif.'],
                ],
            ],
            [
                'title' => 'Sharing Session: Zero-Trust Security untuk Mahasiswa Dev',
                'description' => 'Menghindari celah keamanan fatal pada aplikasi karya mahasiswa: secret management aman, enkripsi data at rest, dan SSH hardening.',
                'status' => 'Mendatang',
                'type' => 'Sharing',
                'sessions_count' => 2,
                'target_capacity' => 100,
                'progress_percentage' => 0,
                'approval_status' => 'approved',
                'topics' => [
                    ['title' => 'Mencegah Kebocoran API Key di Repositori Publik', 'description' => 'Penggunaan git-secrets, environment injection, dan rotasi credential otomatis.'],
                    ['title' => 'Prinsip Least Privilege pada Konfigurasi Server', 'description' => 'Mematikan password auth SSH, konfigurasi sudoers spesifik, dan isolasi jaringan.'],
                ],
            ],
            // Additional events for Member Submissions
            [
                'title' => 'Kelas Deep Dive Apache Kafka & Event Streaming',
                'description' => 'Arsitektur internal Kafka: partition rebalancing, log compaction, consumer lag monitoring, dan high throughput streaming pipeline.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 6,
                'target_capacity' => 40,
                'progress_percentage' => 0,
                'approval_status' => 'pending',
                'topics' => [
                    ['title' => 'Kafka Broker & Partition Architecture', 'description' => 'Mekanisme segment log, replication factor, dan leader/follower consensus.'],
                    ['title' => 'Producer Guarantees & Consumer Groups', 'description' => 'At-least-once vs exactly-once semantics dan handling consumer rebalance.'],
                ],
            ],
            [
                'title' => 'Kelas GraphQL API Architecture dengan Node.js',
                'description' => 'Mendesain skema GraphQL yang tahan perubahan: query resolvers, DataLoader batching, rate limiting query complexity, dan caching.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 5,
                'target_capacity' => 35,
                'progress_percentage' => 0,
                'approval_status' => 'pending',
                'topics' => [
                    ['title' => 'Schema Definition Language (SDL) & Resolvers', 'description' => 'Tipe data kustom, mutasi, dan struktur resolver terpisah.'],
                    ['title' => 'Mengatasi Problem N+1 dengan DataLoader', 'description' => 'Batching dan caching request database dalam siklus query GraphQL.'],
                ],
            ],
            [
                'title' => 'Workshop Hacking Mobile Apps Android & iOS',
                'description' => 'Decompiling APK, dynamic instrumentation Frida, bypass SSL pinning, dan reverse engineering file biner.',
                'status' => 'Mendatang',
                'type' => 'Kelas',
                'sessions_count' => 3,
                'target_capacity' => 30,
                'progress_percentage' => 0,
                'approval_status' => 'rejected',
                'rejection_reason' => 'Silabus terlalu berfokus pada eksploitasi agresif tanpa materi defensive security dan etika pengungkapan kerentanan yang memadai.',
                'topics' => [
                    ['title' => 'APK Decompilation dengan Jadx', 'description' => 'Analisis bytecode smali dan ekstraksi resource tersembunyi.'],
                    ['title' => 'Dynamic Hooking Runtime dengan Frida', 'description' => 'Manipulasi return value method otentikasi di memori aplikasi.'],
                ],
            ],
        ];

        $createdEvents = [];
        foreach ($eventsSeed as $index => $eData) {
            $creator = $index < 20 ? $admin : $members[$index % count($members)];

            $event = Event::create([
                'title' => $eData['title'],
                'description' => $eData['description'],
                'status' => $eData['status'],
                'type' => $eData['type'],
                'sessions_count' => $eData['sessions_count'],
                'target_capacity' => $eData['target_capacity'],
                'progress_percentage' => $eData['progress_percentage'],
                'created_by' => $creator->id,
                'approval_status' => $eData['approval_status'],
                'rejection_reason' => $eData['rejection_reason'] ?? null,
            ]);

            foreach ($eData['topics'] as $order => $topic) {
                EventTopic::create([
                    'event_id' => $event->id,
                    'title' => $topic['title'],
                    'description' => $topic['description'],
                    'order' => $order + 1,
                ]);
            }

            // Assign varied participants for approved events
            if ($eData['approval_status'] === 'approved') {
                $participantCount = min(rand(4, 12), count($members));
                $selectedMembers = (array) array_rand($members, $participantCount);
                foreach ($selectedMembers as $mIdx) {
                    EventParticipant::create([
                        'event_id' => $event->id,
                        'user_id' => $members[$mIdx]->id,
                        'status' => 'registered',
                        'registered_at' => now()->subDays(rand(1, 20)),
                    ]);
                }
            }

            $createdEvents[] = $event;
        }

        // ==========================================
        // 4. SEED PROJECTS (28 total: 25 approved, 2 pending, 1 rejected)
        // ==========================================
        $projectsSeed = [
            [
                'title' => 'Sistem E-Voting Kampus Terdesentralisasi',
                'description' => 'Platform voting digital untuk pemilihan organisasi kampus dengan keamanan tinggi, enkripsi end-to-end, dan audit trail perolehan suara secara langsung.',
                'category' => 'UKM Project',
                'technologies' => 'React, Node.js, PostgreSQL, Redis, Docker',
                'demo_url' => 'https://evoting.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/evoting-kampus',
                'documentation_url' => 'https://docs.progresshub.dev/evoting',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Verifikasi Identitas Mahasiswa Terintegrasi', 'description' => 'Validasi NIM dan autentikasi multi-faktor menggunakan Single Sign-On kampus.'],
                    ['title' => 'Pemungutan Suara Terenkripsi End-to-End', 'description' => 'Penyimpanan surat suara digital dengan kriptografi asimetris untuk mencegah modifikasi.'],
                    ['title' => 'Audit Trail & Tally Real-time', 'description' => 'Dashboard analitik perolehan suara transparan yang dapat dipantau oleh seluruh civitas akademika.'],
                ],
                'roles' => ['Fullstack Lead', 'Backend Engineer', 'DevOps Specialist'],
            ],
            [
                'title' => 'Portal Repositori Proyek & Talent Showcase UKM',
                'description' => 'Platform direktori proyek mahasiswa dan pameran talenta teknologi. Dilengkapi kurasi portofolio, filter keahlian, dan statistik interaksi pengunjung.',
                'category' => 'UKM Project',
                'technologies' => 'Laravel, Tailwind CSS, Alpine.js, MySQL',
                'demo_url' => 'https://showcase.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/talent-showcase',
                'documentation_url' => 'https://github.com/progresshub/talent-showcase#readme',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Katalog Multi-Teknologi Interaktif', 'description' => 'Pencarian cepat berbasis tag bahasa pemrograman, framework, dan kategori proyek.'],
                    ['title' => 'Manajemen Profil & Verifikasi Karya', 'description' => 'Integrasi akun GitHub mahasiswa untuk menampilkan kontribusi riil dan repositori publik.'],
                    ['title' => 'Sistem Moderasi Kurasi Mahasiswa', 'description' => 'Alur pengajuan, peninjauan kode, dan persetujuan publikasi proyek oleh admin lab.'],
                ],
                'roles' => ['Lead Developer', 'UI/UX Designer', 'Frontend Developer'],
            ],
            [
                'title' => 'CLI Task Manager & Pomodoro Timer (RustyTask)',
                'description' => 'Aplikasi command-line interface super cepat untuk manajemen tugas, pelacakan waktu kerja metode Pomodoro, dan penyimpanan data lokal terisolasi.',
                'category' => 'Member Project',
                'technologies' => 'Rust, Ratatui, SQLite',
                'demo_url' => null,
                'repository_url' => 'https://github.com/ahmadfauzi/rustytask-cli',
                'documentation_url' => 'https://github.com/ahmadfauzi/rustytask-cli#readme',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Terminal User Interface (TUI) Responsif', 'description' => 'Navigasi keyboard vim-style dengan rendering warna ANSI dan panel split dinamis.'],
                    ['title' => 'Pomodoro Timer dengan Audio Alert', 'description' => 'Timer interval kerja dan istirahat dengan notifikasi terminal beep dan system tray banner.'],
                    ['title' => 'Ekspor Rekap Harian Format Markdown', 'description' => 'Rangkuman produktivitas otomatis untuk keperluan daily standup atau personal journaling.'],
                ],
                'roles' => ['Creator & Maintainer'],
            ],
            [
                'title' => 'Distributed Key-Value Store (TinyKV)',
                'description' => 'Sistem penyimpanan key-value terdistribusi berbasis algoritma konsensus Raft, replikasi log toleran terhadap partisi jaringan, dan indexing LSM Tree.',
                'category' => 'Member Project',
                'technologies' => 'Go, Raft Consensus, gRPC, BadgerDB',
                'demo_url' => null,
                'repository_url' => 'https://github.com/budisantoso/tinykv-raft',
                'documentation_url' => 'https://github.com/budisantoso/tinykv-raft/wiki',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Implementasi Konsensus Raft Mandiri', 'description' => 'Pemilihan leader otomatis, replikasi entri log, dan pemulihan node crash.'],
                    ['title' => 'Komunikasi Antar-Node Berlatensi Mikro via gRPC', 'description' => 'Streaming data log biner efisien dengan serialisasi Protocol Buffers.'],
                    ['title' => 'Penyimpanan Persisten Log-Structured Merge Tree', 'description' => 'Throughput penulisan tinggi dengan compaction latar belakang otomatis.'],
                ],
                'roles' => ['Systems Engineer', 'Core Contributor'],
            ],
            [
                'title' => 'GitOps Kubernetes Deployment Operator',
                'description' => 'Kubernetes custom controller untuk menyinkronkan status cluster secara otomatis dengan repositori git, mendeteksi drift konfigurasi, dan audit rollout.',
                'category' => 'Member Project',
                'technologies' => 'Go, Kubernetes Controller Runtime, Helm, Docker',
                'demo_url' => null,
                'repository_url' => 'https://github.com/citradewi/gitops-operator',
                'documentation_url' => 'https://citradewi.github.io/gitops-operator',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Rekonsiliasi Otomatis Siklus Pendek', 'description' => 'Sinkronisasi manifest k8s dalam interval hitungan detik dengan deteksi konflik.'],
                    ['title' => 'Integrasi Webhook Notifikasi Slack & Discord', 'description' => 'Peringatan otomatis saat terjadi kegagalan deployment atau container crash-loop.'],
                    ['title' => 'Rollback Otomatis Saat Healthcheck Gagal', 'description' => 'Pembalikan instan ke commit stabil terakhir jika endpoint readiness gagal merespons.'],
                ],
                'roles' => ['DevOps Engineer'],
            ],
            [
                'title' => 'Smart Campus Attendance System via BLE Beacon',
                'description' => 'Sistem presensi perkuliahan nirsentuh berbasis Bluetooth Low Energy beacon dengan verifikasi koordinat GPS dan proteksi anti fake-GPS.',
                'category' => 'UKM Project',
                'technologies' => 'Flutter, Python FastAPI, PostgreSQL, Bluetooth LE',
                'demo_url' => 'https://attendance.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/smart-attendance',
                'documentation_url' => 'https://docs.progresshub.dev/attendance',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Deteksi Sinyal BLE Berkecepatan Tinggi', 'description' => 'Pemindaian hardware beacon ruang kelas dengan batas toleransi jarak 3 meter.'],
                    ['title' => 'Validasi Anti-Spoofing & Device Integrity', 'description' => 'Pemeriksaan status root/jailbreak perangkat dan kecocokan token biometrik.'],
                    ['title' => 'Dashboard Rekapitulasi Dosen Instan', 'description' => 'Grafik persentase kehadiran kelas dan ekspor laporan terformat XLSX.'],
                ],
                'roles' => ['Mobile App Lead', 'Backend Engineer'],
            ],
            [
                'title' => 'Database Query Visualizer & Performance Profiler',
                'description' => 'Alat visualisasi grafis untuk menganalisis rencana eksekusi query SQL (EXPLAIN ANALYZE), menyorot node paling lambat, dan memberikan rekomendasi indeks.',
                'category' => 'Member Project',
                'technologies' => 'Next.js, TypeScript, D3.js, PostgreSQL',
                'demo_url' => 'https://queryvis.vercel.app',
                'repository_url' => 'https://github.com/dinakurnia/query-visualizer',
                'documentation_url' => 'https://queryvis.vercel.app/docs',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Visualisasi Pohon Rencana Eksekusi Interaktif', 'description' => 'Diagram hirarkis grafis menampilkan cost, time, dan baris data tiap tahapan scan.'],
                    ['title' => 'Pendeteksi Bottleneck Otomatis', 'description' => 'Pemberian kode warna merah pada node dengan deviasi estimasi baris signifikan.'],
                    ['title' => 'Generator Rekomendasi Indeks DDL', 'description' => 'Saran pembuatan index otomatis untuk mengeliminasi Sequential Scan berlebih.'],
                ],
                'roles' => ['Frontend Architect'],
            ],
            [
                'title' => 'Real-time Collaborative Code Editor (CollabCode)',
                'description' => 'Editor kode kolaboratif berbasis web dengan kursor multi-pengguna, sinkronisasi state tanpa konflik menggunakan CRDT, dan eksekusi kode WebAssembly.',
                'category' => 'Member Project',
                'technologies' => 'TypeScript, React, WebSockets, CRDT (Yjs), Monaco Editor',
                'demo_url' => 'https://collabcode.progresshub.dev',
                'repository_url' => 'https://github.com/ekoprasetyo/collab-code',
                'documentation_url' => 'https://collabcode.progresshub.dev/docs',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Multi-Cursor Editing dengan Resolusi Konflik Yjs', 'description' => 'Kolaborasi penulisan teks konkuren tanpa ketergantungan central locking server.'],
                    ['title' => 'Runner Kode WebAssembly di Browser', 'description' => 'Kompilasi dan eksekusi kode Python/JavaScript langsung di sisi klien secara terisolasi.'],
                    ['title' => 'Ruang Diskusi Suara Peer-to-Peer WebRTC', 'description' => 'Koneksi audio langsung antar anggota tim tanpa membebani bandwidth server.'],
                ],
                'roles' => ['Fullstack Engineer'],
            ],
            [
                'title' => 'API Gateway & Rate Limiter Ringan (PulseGate)',
                'description' => 'Reverse proxy berlatensi rendah untuk routing request API mikro, pembatasan kuota request berbasis sliding window Redis, dan metrik Prometheus.',
                'category' => 'Member Project',
                'technologies' => 'Go, Redis, Lua Scripts, Docker',
                'demo_url' => null,
                'repository_url' => 'https://github.com/farhanramadhan/pulsegate',
                'documentation_url' => 'https://github.com/farhanramadhan/pulsegate#architecture',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Algoritma Token Bucket & Sliding Window', 'description' => 'Eksekusi atomic rate limiting menggunakan skrip Lua langsung di server Redis.'],
                    ['title' => 'Routing Dinamis dengan Service Discovery', 'description' => 'Penerusan rute trafik tanpa perlu melakukan restart aplikasi proxy.'],
                    ['title' => 'Eksposur Metrik Standar Prometheus', 'description' => 'Metrik latensi p99, error rate 5xx, dan konsumsi memori siap divisualkan di Grafana.'],
                ],
                'roles' => ['Backend Architect'],
            ],
            [
                'title' => 'LMS Platform Microlearning untuk Mahasiswa',
                'description' => 'Platform pembelajaran mandiri pemrograman dengan materi bite-sized, tantangan interaktif di browser, dan penerbitan sertifikat digital ber-hash verifikasi.',
                'category' => 'UKM Project',
                'technologies' => 'Next.js, Prisma, PostgreSQL, Tailwind CSS, Cloudflare R2',
                'demo_url' => 'https://learn.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/microlearn-lms',
                'documentation_url' => 'https://learn.progresshub.dev/about',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Kurikulum Terstruktur Berbasis Milestone', 'description' => 'Bab materi dilengkapi indikator progres visual dan pengingat jadwal belajar.'],
                    ['title' => 'Kuis Interaktif dengan Umpan Balik Instan', 'description' => 'Evaluasi pemahaman konsep dengan analisis opsi salah dan penjelasan teknis.'],
                    ['title' => 'Sertifikat Digital Terverifikasi QR Code', 'description' => 'Dokumen PDF yang ditandatangani secara kriptografis untuk validasi keaslian.'],
                ],
                'roles' => ['Product Lead', 'Frontend Developer', 'Backend Developer'],
            ],
            [
                'title' => 'Static Site Generator Berkecepatan Tinggi (FastBreeze)',
                'description' => 'Generator situs statis berbasis Rust yang mengompilasi ribuan dokumen markdown menjadi HTML siap saji dalam waktu di bawah satu detik.',
                'category' => 'Member Project',
                'technologies' => 'Rust, Markdown, Tera Templates, Rayon',
                'demo_url' => null,
                'repository_url' => 'https://github.com/gitasafitri/fastbreeze-ssg',
                'documentation_url' => 'https://github.com/gitasafitri/fastbreeze-ssg#quickstart',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Kompilasi Paralel Multithreading dengan Rayon', 'description' => 'Memanfaatkan seluruh core CPU untuk memproses parsing file markdown.'],
                    ['title' => 'Sintaks Highlighting Bawaan via Syntect', 'description' => 'Pewarnaan kode sumber berbasis TextMate grammar tanpa JavaScript runtime tambahan.'],
                    ['title' => 'Built-in Dev Server dengan Live Reload WebSocket', 'description' => 'Pembaruan otomatis tampilan browser saat file markdown disimpan.'],
                ],
                'roles' => ['Author & Maintainer'],
            ],
            [
                'title' => 'Network Packet Sniffer & Traffic Analyzer',
                'description' => 'Aplikasi inspeksi paket data jaringan lokal untuk mendeteksi anomali trafik, pemindaian port terbuka mencurigakan, dan analisis payload protokol.',
                'category' => 'Member Project',
                'technologies' => 'Python, Scapy, PyQt6, Wireshark Lib',
                'demo_url' => null,
                'repository_url' => 'https://github.com/hendrawijaya/net-analyzer',
                'documentation_url' => 'https://github.com/hendrawijaya/net-analyzer#readme',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Inspeksi Header TCP/UDP/ICMP Real-time', 'description' => 'Pemilahan data biner paket mentah menjadi representasi field yang mudah dibaca.'],
                    ['title' => 'Sistem Peringatan Pemindaian Port (SYN Scan)', 'description' => 'Deteksi pola koneksi berulang dari IP address yang sama dalam rentang detik.'],
                    ['title' => 'Ekspor Rekaman Trafik Format PCAP', 'description' => 'Penyimpanan sesi tangkapan jaringan untuk dianalisis lebih lanjut pada Wireshark.'],
                ],
                'roles' => ['Security Researcher'],
            ],
            [
                'title' => 'Platform Asesmen Coding Otomatis (CodeJudge)',
                'description' => 'Mesin penilaian kode tugas mahasiswa dengan eksekusi aman di dalam sandbox Docker terisolasi, batasan resource memori, dan testing otomatis.',
                'category' => 'UKM Project',
                'technologies' => 'Go, Docker SDK, RabbitMQ, Vue 3, PostgreSQL',
                'demo_url' => 'https://judge.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/code-judge',
                'documentation_url' => 'https://docs.progresshub.dev/judge',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Sandbox Eksekusi Terisolasi Tanpa Akses Jaringan', 'description' => 'Pencegahan malicious code dengan cgroups, seccomp filters, dan non-root container.'],
                    ['title' => 'Antrean Eksekusi Terdistribusi via RabbitMQ', 'description' => 'Penjadwalan penilaian kode berskala ratusan submisi bersamaan tanpa lonjakan server.'],
                    ['title' => 'Dukungan Kompilasi Multi-Bahasa', 'description' => 'Mendukung compiler C++, Java, Python 3, Go, dan Node.js dengan laporan detail error.'],
                ],
                'roles' => ['Backend Architect', 'Infrastructure Engineer'],
            ],
            [
                'title' => 'Personal Finance Tracker dengan OCR Struk Otomatis',
                'description' => 'Aplikasi pengatur keuangan mahasiswa yang mengekstrak nilai total struk belanja secara otomatis menggunakan Optical Character Recognition.',
                'category' => 'Member Project',
                'technologies' => 'React Native, Express.js, PostgreSQL, Tesseract OCR',
                'demo_url' => 'https://finance.progresshub.dev',
                'repository_url' => 'https://github.com/indahpermata/finance-ocr',
                'documentation_url' => 'https://github.com/indahpermata/finance-ocr#guide',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Pemindaian Kamera & Ekstraksi Teks Struk', 'description' => 'Prapemrosesan citra dengan thresholding kontras dan parsing angka nominal belanja.'],
                    ['title' => 'Kategorisasi Pengeluaran Cerdas Otomatis', 'description' => 'Pengelompokan transaksi ke kategori makanan, buku, atau tagihan kos.'],
                    ['title' => 'Grafik Anggaran Bulanan & Peringatan Overbudget', 'description' => 'Notifikasi lokal jika pengeluaran harian melebihi ambang batas yang ditentukan.'],
                ],
                'roles' => ['Mobile Developer'],
            ],
            [
                'title' => 'URL Shortener Skala Tinggi dengan Geolocation Analytics',
                'description' => 'Layanan pemendekan tautan URL cepat yang menyimpan jutaan tautan dengan hashing base62 dan mengumpulkan metrik analitik pengunjung berbasis ClickHouse.',
                'category' => 'Member Project',
                'technologies' => 'Node.js, Express, Redis, ClickHouse, Docker',
                'demo_url' => 'https://sho.rt',
                'repository_url' => 'https://github.com/jokosusilo/fast-shortener',
                'documentation_url' => 'https://github.com/jokosusilo/fast-shortener#benchmarks',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Resolusi Redirect Sub-10 Milidetik', 'description' => 'Pengambilan alamat tujuan langsung dari memory cache Redis tanpa query disk.'],
                    ['title' => 'Analitik Lokasi Pengunjung Real-time', 'description' => 'Penyimpanan log kunjungan terkompresi di database kolumnar ClickHouse.'],
                    ['title' => 'Pemeriksaan Tautan Terhadap Database Malware', 'description' => 'Verifikasi URL tujuan melalui API keamanan Google Safe Browsing.'],
                ],
                'roles' => ['Fullstack Developer'],
            ],
            [
                'title' => 'IoT Smart Greenhouse Monitor',
                'description' => 'Sistem pemantauan lingkungan kebun pintar berbasis mikrokontroler ESP32, sensor suhu-kelembaban, broker MQTT, dan dashboard telemetri Grafana.',
                'category' => 'UKM Project',
                'technologies' => 'C++, ESP32, MQTT, Node.js, InfluxDB, Grafana',
                'demo_url' => 'https://greenhouse.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/iot-greenhouse',
                'documentation_url' => 'https://docs.progresshub.dev/greenhouse',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Telemetri Sensor Multi-Titik Kontinu', 'description' => 'Transmisi data kelembaban tanah, suhu udara, dan intensitas cahaya tiap 10 detik.'],
                    ['title' => 'Aktuasi Otomatis Pompa Air & Exhaust Fan', 'description' => 'Pemicu relay otomatis saat parameter kelembaban tanah berada di bawah nilai kritis.'],
                    ['title' => 'Penyimpanan Data Deret Waktu di InfluxDB', 'description' => 'Penyimpanan data historis jangka panjang dengan downsampling otomatis.'],
                ],
                'roles' => ['Hardware Engineer', 'Backend Specialist'],
            ],
            [
                'title' => 'AI-Powered Code Reviewer GitHub Action',
                'description' => 'Aksi GitHub otomatis yang menganalisis git diff pull request, mendeteksi potensi celah keamanan, dan memberikan komentar review terperinci secara otomatis.',
                'category' => 'Member Project',
                'technologies' => 'TypeScript, GitHub Octokit, OpenAI API',
                'demo_url' => null,
                'repository_url' => 'https://github.com/kevinpratama/ai-reviewer-action',
                'documentation_url' => 'https://github.com/kevinpratama/ai-reviewer-action#marketplace',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Analisis Perubahan Diff Baris per Baris', 'description' => 'Pemrosesan potongan diff patch untuk fokus pada penambahan dan modifikasi kode saja.'],
                    ['title' => 'Komentar Inline Langsung pada File PR', 'description' => 'Penyampaian saran perbaikan sintaks langsung pada baris kode yang bermasalah.'],
                    ['title' => 'Konfigurasi Aturan Tim Berbasis File YAML', 'description' => 'Pengaturan fokus review khusus seperti standar konvensi penamaan atau unit testing.'],
                ],
                'roles' => ['Open Source Maintainer'],
            ],
            [
                'title' => 'Sistem Reservasi Laboratorium Komputer Kampus',
                'description' => 'Aplikasi web pemesanan dan jadwal pemakaian laboratorium komputer fakultas untuk kegiatan praktikum, riset, atau workshop mandiri.',
                'category' => 'UKM Project',
                'technologies' => 'Laravel, Livewire, Alpine.js, Tailwind CSS, MySQL',
                'demo_url' => 'https://lab.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/lab-reservation',
                'documentation_url' => 'https://docs.progresshub.dev/lab',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Kalender Jadwal Laboratorium Interaktif', 'description' => 'Visualisasi ketersediaan slot ruangan dan komputer secara real-time tanpa refresh halaman.'],
                    ['title' => 'Alur Persetujuan Bertingkat Asisten & Kepala Lab', 'description' => 'Notifikasi email otomatis kepada pengaju saat permohonan disetujui atau ditolak.'],
                    ['title' => 'Verifikasi Tiket Masuk Berbasis QR Code', 'description' => 'Pemindaian barcode tiket saat mahasiswa memasuki ruangan laboratorium.'],
                ],
                'roles' => ['Fullstack Lead', 'UI Designer'],
            ],
            [
                'title' => 'Simple In-Memory Cache Server (MemMini)',
                'description' => 'Implementasi server caching in-memory mandiri menggunakan bahasa C dengan protokol soket BSD, multi-threading posix, dan kebijakan penggusuran LRU.',
                'category' => 'Member Project',
                'technologies' => 'C, POSIX Threads, BSD Sockets',
                'demo_url' => null,
                'repository_url' => 'https://github.com/larasatiputri/memmini-cache',
                'documentation_url' => 'https://github.com/larasatiputri/memmini-cache#specs',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Hash Table Dinamis Thread-Safe', 'description' => 'Penguncian granular (bucket-level mutex) untuk meminimalisir perebutan resource antar thread.'],
                    ['title' => 'Kebijakan Penggusuran Least Recently Used (LRU)', 'description' => 'Struktur doubly linked list untuk membuang key tertua saat kuota memori penuh.'],
                    ['title' => 'Protokol Teks Kompatibel Sederhana', 'description' => 'Dukungan perintah SET, GET, DEL, dan STATS melalui koneksi telnet atau soket raw.'],
                ],
                'roles' => ['Systems Programmer'],
            ],
            [
                'title' => 'Search Engine Mini untuk Dokumen Akademik',
                'description' => 'Mesin pencari teks dokumen skripsi dan jurnal internal kampus berbasis algoritma BM25, ekstraksi token teks bahasa Indonesia, dan pencarian sinonim.',
                'category' => 'Member Project',
                'technologies' => 'Python, FastAPI, TF-IDF, BM25, React',
                'demo_url' => 'https://search.progresshub.dev',
                'repository_url' => 'https://github.com/muhammadrizky/academic-search',
                'documentation_url' => 'https://github.com/muhammadrizky/academic-search#algorithm',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Indeksasi & Stemming Bahasa Indonesia (Sastrawi)', 'description' => 'Pemotongan imbuhan kata dasar untuk meningkatkan akurasi temuan pencarian.'],
                    ['title' => 'Algoritma Perangkingan Dokumen BM25', 'description' => 'Kalkulasi relevansi dokumen berdasarkan frekuensi kata dan panjang dokumen relatif.'],
                    ['title' => 'Highlight Kata Kunci pada Cuplikan Paragraf', 'description' => 'Menampilkan cuplikan konteks di sekitar istilah yang dicari dengan tanda tebal.'],
                ],
                'roles' => ['Data Engineer'],
            ],
            [
                'title' => 'Web Scraper & Job Market Tracker Mahasiswa IT',
                'description' => 'Sistem pemantau tren kebutuhan industri teknologi di Indonesia: ekstraksi lowongan kerja, visualisasi bahasa pemrograman terpopuler, dan estimasi gaji.',
                'category' => 'Member Project',
                'technologies' => 'Python, Playwright, DuckDB, Streamlit',
                'demo_url' => 'https://jobtracker.progresshub.dev',
                'repository_url' => 'https://github.com/nabilazahra/tech-job-tracker',
                'documentation_url' => 'https://jobtracker.progresshub.dev/about',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Scraper Otomatis Bersih Tanpa Terblokir', 'description' => 'Pemanfaatan browser headless Playwright dengan rotasi user-agent dan jeda natural.'],
                    ['title' => 'Ekstraksi Entitas Skill dengan NLP Ringan', 'description' => 'Pengenalan otomatis nama framework, database, dan cloud provider dari deskripsi pekerjaan.'],
                    ['title' => 'Dashboard Analitik Tren Gaji & Kebutuhan Role', 'description' => 'Grafik korelasi keahlian teknis terhadap penawaran kompensasi di pasar kerja.'],
                ],
                'roles' => ['Data Analyst'],
            ],
            [
                'title' => 'Interactive Linux Command Playground',
                'description' => 'Simulator lingkungan terminal Linux x86 langsung di browser klien menggunakan WebAssembly untuk latihan perintah dasar tanpa risiko merusak server.',
                'category' => 'UKM Project',
                'technologies' => 'Next.js, WebAssembly (v86), xterm.js, Tailwind CSS',
                'demo_url' => 'https://terminal.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/linux-playground',
                'documentation_url' => 'https://docs.progresshub.dev/terminal',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Emulasi Mesin Virtual x86 di WebAssembly', 'description' => 'Booting kernel Linux ringan langsung di memori tab browser pengguna.'],
                    ['title' => 'Integrasi Terminal Interaktif xterm.js', 'description' => 'Dukungan penuh navigasi ANSI, autocomplete tombol Tab, dan riwayat perintah.'],
                    ['title' => 'Modul Latihan Mandiri dengan Evaluasi Status', 'description' => 'Sistem mendeteksi apakah pengguna berhasil membuat folder, memindahkan file, atau mengedit teks.'],
                ],
                'roles' => ['Frontend Architect', 'Wasm Engineer'],
            ],
            [
                'title' => 'Markdown Documentation Knowledge Base (DocFlow)',
                'description' => 'Pusat pengetahuan dokumentasi proyek internal dengan rendering super cepat berbasis Astro, pencarian instan klien, dan diagram Mermaid otomatis.',
                'category' => 'Member Project',
                'technologies' => 'Astro, TypeScript, Tailwind CSS, Pagefind',
                'demo_url' => 'https://docflow.progresshub.dev',
                'repository_url' => 'https://github.com/oscarfernando/docflow-kb',
                'documentation_url' => 'https://docflow.progresshub.dev/overview',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Output Zero-JavaScript Default Astro', 'description' => 'Waktu muat halaman instan dengan skor performa Google Lighthouse 100.'],
                    ['title' => 'Mesin Pencari Statis Tanpa Server (Pagefind)', 'description' => 'Indeksasi teks statis saat build time dengan ukuran payload pencarian minimal.'],
                    ['title' => 'Rendering Diagram Mermaid Dinamis', 'description' => 'Penyusunan diagram arsitektur dan sequence flow langsung dari kode teks markdown.'],
                ],
                'roles' => ['Lead Maintainer'],
            ],
            [
                'title' => 'Sistem Antrean Klinik Kampus Terintegrasi WhatsApp',
                'description' => 'Platform pengelolaan antrean pasien klinik kampus dengan pembaruan status posisi nomor giliran otomatis yang dikirim via bot WhatsApp.',
                'category' => 'UKM Project',
                'technologies' => 'NestJS, TypeScript, PostgreSQL, Baileys WA API',
                'demo_url' => 'https://klinik.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/klinik-antrean',
                'documentation_url' => 'https://docs.progresshub.dev/klinik',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Pendaftaran Nomor Antrean Online Mandiri', 'description' => 'Pengambilan tiket dari smartphone mahasiswa sebelum tiba di lokasi klinik.'],
                    ['title' => 'Pengingat WhatsApp Otomatis 3 Nomor Sebelum Giliran', 'description' => 'Mencegah penumpukan ruang tunggu dengan notifikasi real-time ke nomor ponsel pasien.'],
                    ['title' => 'Layar Monitor Antrean Pemanggilan Suara Otomatis', 'description' => 'Pemanggilan text-to-speech audio bahasa Indonesia di layar ruang tunggu dokter.'],
                ],
                'roles' => ['Backend Lead', 'Integration Specialist'],
            ],
            [
                'title' => 'Terminal File Manager dengan Pratinjau Gambar (TermView)',
                'description' => 'Manajer berkas berbasis teks untuk sistem Unix dengan antarmuka dual-pane, navigasi vim-keys, dan fitur pratinjau grafik gambar berbasis protokol Sixel.',
                'category' => 'Member Project',
                'technologies' => 'Rust, Ratatui, Chafa Lib, Libmagic',
                'demo_url' => null,
                'repository_url' => 'https://github.com/putrianggraini/termview-fm',
                'documentation_url' => 'https://github.com/putrianggraini/termview-fm#keybindings',
                'approval_status' => 'approved',
                'features' => [
                    ['title' => 'Antarmuka Dual-Pane Navigasi Cepat', 'description' => 'Menyalin dan memindahkan file antar direktori dengan satu pintasan tombol keyboard.'],
                    ['title' => 'Pratinjau Gambar High-Resolution di Terminal', 'description' => 'Konversi gambar otomatis ke grafis Sixel atau blok teks Kitty graphics protocol.'],
                    ['title' => 'Batch Rename Berkas dengan Editor Teks Favorit', 'description' => 'Mengubah nama ratusan berkas sekaligus melalui sesi instan vim/nano.'],
                ],
                'roles' => ['Core Developer'],
            ],
            // Additional projects for Member Submissions
            [
                'title' => 'Automated Vulnerability Scanner untuk CI/CD',
                'description' => 'Tool analisis keamanan statis yang memindai dependensi kode dari celah kerentanan CVE dan menghasilkan laporan format standar SARIF.',
                'category' => 'Member Project',
                'technologies' => 'Python, Docker, Bandit, Semgrep',
                'demo_url' => null,
                'repository_url' => 'https://github.com/qonitarahma/ci-vuln-scanner',
                'documentation_url' => 'https://github.com/qonitarahma/ci-vuln-scanner#usage',
                'approval_status' => 'pending',
                'features' => [
                    ['title' => 'Pemindaian Cepat Berkas Sumber', 'description' => 'Mendeteksi kredensial rahasia yang tidak sengaja tertulis pada kode repositori.'],
                    ['title' => 'Laporan Ekspor SARIF Terstandarisasi', 'description' => 'Terintegrasi langsung dengan dashboard keamanan GitHub Code Scanning.'],
                ],
                'roles' => ['Security Enthusiast'],
            ],
            [
                'title' => 'Platform Crowdfunding Proyek Riset Mahasiswa',
                'description' => 'Portal penggalangan dana kolaboratif untuk membiayai pembuatan prototype perangkat keras dan publikasi riset ilmiah mahasiswa kampus.',
                'category' => 'UKM Project',
                'technologies' => 'Laravel, Vue 3, PostgreSQL, Midtrans',
                'demo_url' => 'https://fund.progresshub.dev',
                'repository_url' => 'https://github.com/progresshub/research-fund',
                'documentation_url' => null,
                'approval_status' => 'pending',
                'features' => [
                    ['title' => 'Halaman Kampanye Riset Terperinci', 'description' => 'Transparansi target kebutuhan anggaran dan timeline milestone riset.'],
                    ['title' => 'Integrasi Payment Gateway Virtual Account', 'description' => 'Pembayaran donasi instan melalui QRIS, transfer bank, dan dompet digital.'],
                ],
                'roles' => ['Fullstack Contributor'],
            ],
            [
                'title' => 'Cryptocurrency High-Frequency Arbitrage Bot',
                'description' => 'Bot transaksi otomatis yang mencari selisih harga koin kripto di berbagai bursa secara terus-menerus menggunakan koneksi WebSocket berkecepatan tinggi.',
                'category' => 'Member Project',
                'technologies' => 'Python, WebSockets, Binance API',
                'demo_url' => null,
                'repository_url' => 'https://github.com/radityapratama/crypto-arbitrage-bot',
                'documentation_url' => null,
                'approval_status' => 'rejected',
                'rejection_reason' => 'Proyek tidak sesuai dengan fokus edukasi teknologi kampus dan tidak menyertakan dokumentasi penanganan risiko kegagalan finansial.',
                'features' => [
                    ['title' => 'Monitoring Orderbook Bursa Real-time', 'description' => 'Mendeteksi ketidaksesuaian harga spread antar exchange dalam hitungan milidetik.'],
                ],
                'roles' => ['Solo Developer'],
            ],
        ];

        $createdProjects = [];
        foreach ($projectsSeed as $index => $pData) {
            $creator = $index < 20 ? $admin : $members[$index % count($members)];

            $project = Project::create([
                'title' => $pData['title'],
                'description' => $pData['description'],
                'category' => $pData['category'],
                'technologies' => $pData['technologies'],
                'image_path' => null,
                'demo_url' => $pData['demo_url'],
                'repository_url' => $pData['repository_url'],
                'documentation_url' => $pData['documentation_url'],
                'created_by' => $creator->id,
                'approval_status' => $pData['approval_status'],
                'rejection_reason' => $pData['rejection_reason'] ?? null,
            ]);

            foreach ($pData['features'] as $feat) {
                ProjectFeature::create([
                    'project_id' => $project->id,
                    'title' => $feat['title'],
                    'description' => $feat['description'],
                ]);
            }

            foreach ($pData['roles'] as $rIdx => $roleTitle) {
                $memberUser = $members[($index * 2 + $rIdx) % count($members)];
                ProjectMember::create([
                    'project_id' => $project->id,
                    'user_id' => $memberUser->id,
                    'role' => $roleTitle,
                ]);
            }

            $createdProjects[] = $project;
        }

        // ==========================================
        // 5. SEED RESOURCES (28 total: 25 approved, 2 pending, 1 rejected)
        // ==========================================
        $resourcesSeed = [
            [
                'title' => 'Panduan Lengkap Arsitektur Microservices dengan Go',
                'description' => 'Materi terstruktur membangun sistem mikro berkinerja tinggi: decoupling layanan, komunikasi gRPC, transaksi terdistribusi, dan observability.',
                'type' => 'Modul',
                'tags' => 'Go, Microservices, gRPC, Docker, Architecture',
                'file_path' => 'https://storage.progresshub.dev/modules/golang-microservices.pdf',
                'views_count' => 2480,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Desain Batasan Layanan (Domain-Driven Design)', 'description' => 'Menentukan batasan bounded context agar service tidak saling bergantung erat.'],
                    ['title' => 'Bab 2: Komunikasi Antar Layanan dengan gRPC & Protobuf', 'description' => 'Menerapkan RPC berbasis HTTP/2 untuk kecepatan pertukaran data internal.'],
                    ['title' => 'Bab 3: Manajemen Data & Transaksi Terdistribusi (Saga Pattern)', 'description' => 'Menjaga konsistensi data di banyak database tanpa two-phase commit usang.'],
                    ['title' => 'Bab 4: Observability: Metrics, Distributed Tracing & Healthchecks', 'description' => 'Melacak perjalanan request menggunakan OpenTelemetry dan Jaeger.'],
                ],
            ],
            [
                'title' => 'Mastering PostgreSQL: Indexing, Query Optimization & Partitioning',
                'description' => 'Panduan tingkat lanjut memahami cara kerja database relational PostgreSQL, strategi indexing yang efisien, dan optimasi query berat.',
                'type' => 'Modul',
                'tags' => 'PostgreSQL, Database, SQL, Performance Tuning',
                'file_path' => 'https://storage.progresshub.dev/modules/mastering-postgresql.pdf',
                'views_count' => 3120,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Struktur Data Penyimpanan & Algoritma B-Tree', 'description' => 'Bagaimana engine PostgreSQL membaca blok halaman data dari disk.'],
                    ['title' => 'Bab 2: Menafsirkan EXPLAIN ANALYZE & Query Cost', 'description' => 'Membongkar estimasi perencana query dan menemukan titik lambat sesungguhnya.'],
                    ['title' => 'Bab 3: Strategi Indexing Lanjutan: Partial, Expression, & Multi-Column', 'description' => 'Membuat indeks tertarget yang hemat ukuran memori cache.'],
                    ['title' => 'Bab 4: Table Partitioning untuk Skala Data Jutaan Baris', 'description' => 'Memecah tabel besar berdasarkan rentang waktu untuk query cepat.'],
                ],
            ],
            [
                'title' => 'Rust untuk Programmer Pemula: Konsep Inti & Praktik Terbaik',
                'description' => 'Modul komprehensif memahami memori safety tanpa garbage collector: ownership, referensi pinjaman, enum pattern matching, dan penanganan error idiomatik.',
                'type' => 'Modul',
                'tags' => 'Rust, Systems Programming, Memory Safety',
                'file_path' => 'https://storage.progresshub.dev/modules/rust-for-beginners.pdf',
                'views_count' => 1890,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Filosofi Ownership & Aturan Peminjaman (Borrowing)', 'description' => 'Memahami stack, heap, serta bagaimana compiler Rust menjamin bebas bug memori.'],
                    ['title' => 'Bab 2: Pattern Matching & Konstruksi Error Handling', 'description' => 'Mengeliminasi null exception dengan tipe Option dan Result.'],
                    ['title' => 'Bab 3: Trait, Generics & Lifetime Annotations', 'description' => 'Menulis fungsi yang fleksibel namun tetap diproses zero-cost saat kompilasi.'],
                    ['title' => 'Bab 4: Membangun Proyek CLI Mandiri dengan Cargo', 'description' => 'Struktur folder standar, manajemen package crates.io, dan unit testing bawaan.'],
                ],
            ],
            [
                'title' => 'React & Next.js Design Patterns: Panduan Arsitektur Skala Besar',
                'description' => 'Pola desain frontend modern: compound components, render props, pemisahan server-client boundaries, dan arsitektur atomic design yang modular.',
                'type' => 'Modul',
                'tags' => 'React, Next.js, TypeScript, Frontend',
                'file_path' => 'https://storage.progresshub.dev/modules/react-design-patterns.pdf',
                'views_count' => 2740,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Pola Komponen: Compound Components & Render Props', 'description' => 'Membangun komponen UI yang fleksibel dan mudah di-extend oleh anggota tim.'],
                    ['title' => 'Bab 2: Mengelola Server State vs Client State', 'description' => 'Kapan menggunakan React Context vs Server Actions vs TanStack Query.'],
                    ['title' => 'Bab 3: Performance Tuning: Virtualization & Bundle Splitting', 'description' => 'Menjaga FPS tetap 60 saat me-render ribuan baris data tabel.'],
                    ['title' => 'Bab 4: Arsitektur Folder & Desain Design System', 'description' => 'Pengorganisasian token warna, tipografi, dan komponen headless Tailwind.'],
                ],
            ],
            [
                'title' => 'Modern Linux CLI Mastery: Alat & Otomasi untuk Developer',
                'description' => 'Kumpulan trik baris perintah sistem operasi Linux: pengolahan teks streaming, manajemen proses background, automasi skrip shell, dan konfigurasi terminal nyaman.',
                'type' => 'Modul',
                'tags' => 'Linux, Bash, Terminal, DevOps',
                'file_path' => 'https://storage.progresshub.dev/modules/linux-cli-mastery.pdf',
                'views_count' => 2150,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Pipeline Unix & Text Processing: awk, sed, grep, jq', 'description' => 'Menyaring ribuan baris log server dalam satu perintah ringkas.'],
                    ['title' => 'Bab 2: Manajemen Proses, Signal, & Systemd Daemon', 'description' => 'Memantau penggunaan memori dan mengelola background daemon service.'],
                    ['title' => 'Bab 3: Otomasi Shell Scripting yang Kuat & Tahan Error', 'description' => 'Menulis script bash dengan penanganan error strict mode (set -euo pipefail).'],
                    ['title' => 'Bab 4: Konfigurasi SSH, Tmux, & Lingkungan Kerja Produktif', 'description' => 'Navigasi terminal tanpa mouse menggunakan multiplexer tmux.'],
                ],
            ],
            [
                'title' => 'Strategi Debugging Memory Leak pada Aplikasi Node.js',
                'description' => 'Langkah praktis menganalisis kebocoran memori pada runtime Node.js menggunakan heap snapshot, profiler Chrome DevTools, dan deteksi closure tersembunyi.',
                'type' => 'Artikel',
                'tags' => 'Node.js, V8 Engine, Performance, Debugging',
                'file_path' => null,
                'views_count' => 1430,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Memahami Siklus Garbage Collector V8 Engine', 'description' => 'Perbedaan generasi memori Scavenge vs Mark-Sweep-Compact pada Node.js.'],
                    ['title' => 'Bagian 2: Mengambil & Menganalisis Heap Snapshot', 'description' => 'Membandingkan dua kondisi memori untuk menemukan objek yang tidak terlepas.'],
                    ['title' => 'Bagian 3: Pola Umum Penyebab Memory Leak dan Solusinya', 'description' => 'Mengatasi event listener yang lupa di-remove dan cache global tanpa batas ukuran.'],
                ],
            ],
            [
                'title' => 'Mengamankan API Web: Dari CORS hingga JWT Hardening',
                'description' => 'Panduan komprehensif mencegah celah otentikasi dan autorisasi pada antarmuka REST API: token expiration, refresh rotation, rate limiting, dan CORS.',
                'type' => 'Artikel',
                'tags' => 'Web Security, API, Auth, OWASP',
                'file_path' => null,
                'views_count' => 1980,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Kelemahan Populer pada Implementasi JWT Token', 'description' => 'Mencegah serangan pergantian algoritma None dan kebocoran data di payload.'],
                    ['title' => 'Bagian 2: Konfigurasi Header Keamanan & Kebijakan CORS Ketat', 'description' => 'Menolak request lintas domain berbahaya tanpa memblokir aplikasi resmi.'],
                    ['title' => 'Bagian 3: Rate Limiting Terdistribusi Menggunakan Token Bucket', 'description' => 'Melindungi endpoint publik dari serangan DoS dan brute-force kredensial.'],
                ],
            ],
            [
                'title' => 'Memahami Concurrency vs Parallelism Secara Visual',
                'description' => 'Penjelasan mendalam perbedaan fundamental antara konkurensi (desain struktur) dan paralelisme (eksekusi simultan hardware) dengan ilustrasi animasi nyata.',
                'type' => 'Artikel',
                'tags' => 'Computer Science, Concurrency, Multithreading',
                'file_path' => null,
                'views_count' => 1670,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Perbedaan Thread OS, Green Threads, dan Coroutines', 'description' => 'Biaya overhead alokasi memori dan context switching tiap model konkurensi.'],
                    ['title' => 'Bagian 2: Bahaya Race Condition, Deadlock, dan Livelock', 'description' => 'Bagaimana dua thread yang mengakses variabel bersamaan dapat merusak data.'],
                    ['title' => 'Bagian 3: Pola Concurrency Aman: CSP vs Actor Model', 'description' => 'Pendekatan berbagi memori lewat komunikasi alih-alih mengunci resource.'],
                ],
            ],
            [
                'title' => 'Membangun CI/CD Pipeline Cepat & Efisien di GitHub Actions',
                'description' => 'Praktik terbaik mengoptimalkan waktu eksekusi automated workflow: dependency caching, Docker buildx cache, dan matrix testing.',
                'type' => 'Artikel',
                'tags' => 'CI/CD, DevOps, GitHub Actions, Automation',
                'file_path' => null,
                'views_count' => 1340,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Merancang Matrix Strategy & Dependency Caching', 'description' => 'Menghindari unduh ulang package npm/pip pada setiap commit yang di-push.'],
                    ['title' => 'Bagian 2: Mengurangi Waktu Build Docker dengan Multi-Stage Cache', 'description' => 'Memanfaatkan GitHub Cache backend untuk mempercepat kompilasi image.'],
                    ['title' => 'Bagian 3: Keamanan Pipeline: Secrets Scanning & Environment Protection', 'description' => 'Membatasi deploy production hanya dari branch rilis yang disetujui.'],
                ],
            ],
            [
                'title' => 'Panduan Praktis Clean Architecture pada Backend Development',
                'description' => 'Menyusun kode sumber backend agar mudah diuji, independen dari framework, dan fleksibel terhadap penggantian database.',
                'type' => 'Artikel',
                'tags' => 'Software Architecture, Clean Architecture, OOP',
                'file_path' => null,
                'views_count' => 2290,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Batasan Layer: Domain, Use Case, Interface Adapters', 'description' => 'Menjaga logika bisnis tetap murni tanpa import pustaka database eksternal.'],
                    ['title' => 'Bagian 2: Menerapkan Dependency Inversion Principle (DIP)', 'description' => 'Menggunakan interface contract untuk memisahkan implementasi spesifik.'],
                    ['title' => 'Bagian 3: Menulis Unit Test Tanpa Ketergantungan Database Nyata', 'description' => 'Mengeksekusi ribuan test case logika bisnis dalam waktu beberapa detik.'],
                ],
            ],
            [
                'title' => 'Docker Compose Starter Kit untuk Proyek Web Multi-Service',
                'description' => 'Template konfigurasi Docker Compose siap pakai untuk setup lingkungan development lokal: web app, database PostgreSQL, Redis cache, dan Mailhog.',
                'type' => 'Tools',
                'tags' => 'Docker, DevOps, Tooling, Local Development',
                'file_path' => 'https://storage.progresshub.dev/tools/docker-starter-kit.zip',
                'views_count' => 1780,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Setup Service Web, Database PostgreSQL, dan Redis', 'description' => 'Konektivitas internal network bridge dengan DNS resolving otomatis.'],
                    ['title' => 'Bagian 2: Konfigurasi Healthcheck & Startup Dependency Order', 'description' => 'Memastikan database siap menerima query sebelum aplikasi web dinyalakan.'],
                    ['title' => 'Bagian 3: Manajemen Persistent Volume & Environment Variables', 'description' => 'Menjaga data database tidak hilang saat container di-restart.'],
                ],
            ],
            [
                'title' => 'Makefile Template untuk Otomasi Tugas Developer',
                'description' => 'Koleksi file Makefile modern untuk menstandarisasi perintah development tim: compile, test, lint, database migration, dan container deployment.',
                'type' => 'Tools',
                'tags' => 'Makefile, Automation, CLI, Productivity',
                'file_path' => 'https://storage.progresshub.dev/tools/developer-makefile.zip',
                'views_count' => 1120,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Struktur Target Dasar: Build, Test, Lint, Run', 'description' => 'Menyediakan interface seragam untuk berbagai bahasa pemrograman.'],
                    ['title' => 'Bagian 2: Menerapkan Help Command Otomatis Berbasis Komentar', 'description' => 'Menampilkan daftar perintah dan penjelasannya saat mengetik make help.'],
                    ['title' => 'Bagian 3: Mengintegrasikan Formatter & Static Analyzer', 'description' => 'Memastikan seluruh kode tim otomatis rapi sebelum masuk proses git commit.'],
                ],
            ],
            [
                'title' => 'Koleksi Git Hook Scripts untuk Menjaga Kualitas Kode',
                'description' => 'Kumpulan script bash git hook untuk memblokir commit yang mengandung API key rahasia, memformat kode otomatis, dan memvalidasi pesan commit.',
                'type' => 'Tools',
                'tags' => 'Git, Git Hooks, Code Quality, Bash',
                'file_path' => 'https://storage.progresshub.dev/tools/git-hooks-pack.zip',
                'views_count' => 1260,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Pre-commit Hook: Linting & Secret Detection Otomatis', 'description' => 'Memindai pola token AWS, GitHub, atau private key sebelum commit tersimpan.'],
                    ['title' => 'Bagian 2: Commit-msg Hook: Penegakan Format Conventional Commits', 'description' => 'Memvalidasi awalan commit seperti feat:, fix:, chore:, dan refactor:.'],
                    ['title' => 'Bagian 3: Pre-push Hook: Menjalankan Test Cepat Sebelum Push', 'description' => 'Mencegah kode yang gagal unit test terdorong ke repositori remote.'],
                ],
            ],
            [
                'title' => 'Postman & Bruno Collection untuk API Testing Standar',
                'description' => 'Template workspace pengujian endpoint API lengkap dengan script penanganan token auth otomatis, assertion response skema JSON, dan environment variable.',
                'type' => 'Tools',
                'tags' => 'API Testing, Postman, Bruno, QA',
                'file_path' => 'https://storage.progresshub.dev/tools/api-test-collection.json',
                'views_count' => 1410,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Pengorganisasian Environment & Variabel Global', 'description' => 'Beralih antara server lokal, staging, dan production dengan satu klik.'],
                    ['title' => 'Bagian 2: Menulis Assertion Script untuk Validasi Status & JSON', 'description' => 'Verifikasi struktur response dan nilai kembalian secara otomatis.'],
                    ['title' => 'Bagian 3: Otomasi Eksekusi Test Runner via Command Line', 'description' => 'Menjalankan kumpulan pengujian API secara headless di pipeline CI/CD.'],
                ],
            ],
            [
                'title' => 'Neovim Configuration Starter Kit untuk Fullstack Engineer',
                'description' => 'Konfigurasi editor teks Neovim modern berbasis Lua: integrasi LSP otomatis, autocomplete cerdas, fuzzy finder Telescope, dan keymaps efisien.',
                'type' => 'Tools',
                'tags' => 'Neovim, Lua, Productivity, IDE',
                'file_path' => 'https://storage.progresshub.dev/tools/neovim-starter-lua.zip',
                'views_count' => 1950,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Setup Package Manager Lazy.nvim & Struktur Folder', 'description' => 'Pengorganisasian modul konfigurasi yang bersih dan mudah dirawat.'],
                    ['title' => 'Bagian 2: Integrasi LSP (Language Server Protocol) & Mason', 'description' => 'Instalasi otomatis server bahasa TypeScript, Go, Python, dan Rust.'],
                    ['title' => 'Bagian 3: Konfigurasi Treesitter, Telescope Fuzzy Finder & Keymaps', 'description' => 'Navigasi berkas kilat dan penyorotan sintaks kode tingkat tinggi.'],
                ],
            ],
            [
                'title' => 'Tutorial Membangun RESTful API dengan FastAPI & SQLAlchemy 2.0',
                'description' => 'Panduan langkah demi langkah merancang antarmuka REST API asinkron menggunakan Python FastAPI, validasi model Pydantic v2, dan session SQLAlchemy 2.0.',
                'type' => 'Tutorial',
                'tags' => 'Python, FastAPI, SQLAlchemy, REST API',
                'file_path' => 'https://storage.progresshub.dev/tutorials/fastapi-tutorial.pdf',
                'views_count' => 2850,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Setup Proyek & Definisi Skema Pydantic v2', 'description' => 'Membuat validasi input request otomatis dan serialisasi JSON response.'],
                    ['title' => 'Bab 2: Async Database Session dengan SQLAlchemy 2.0', 'description' => 'Menghubungkan model Python ke PostgreSQL menggunakan async engine.'],
                    ['title' => 'Bab 3: Dependency Injection untuk Autentikasi Pengguna', 'description' => 'Mengekstrak token JWT header dan memverifikasi identitas pengguna.'],
                    ['title' => 'Bab 4: Dokumentasi Otomatis OpenAPI & Validasi Request', 'description' => 'Menguji endpoint interaktif langsung melalui antarmuka Swagger UI bawaan.'],
                ],
            ],
            [
                'title' => 'Tutorial Mengimplementasikan WebSocket Real-time dengan Go',
                'description' => 'Membangun aplikasi obrolan real-time berdaya tampung ribuan koneksi konkuren menggunakan bahasa Go, goroutine channels, dan protokol WebSocket.',
                'type' => 'Tutorial',
                'tags' => 'Go, WebSockets, Realtime, Networking',
                'file_path' => 'https://storage.progresshub.dev/tutorials/golang-websockets.pdf',
                'views_count' => 2340,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Protokol Handshake & Upgrade HTTP ke WebSocket', 'description' => 'Mengubah koneksi HTTP biasa menjadi saluran komunikasi full-duplex permanen.'],
                    ['title' => 'Bab 2: Mengelola Connection Hub & Broadcast Channels', 'description' => 'Mendistribusikan pesan masuk ke seluruh klien yang terdaftar secara thread-safe.'],
                    ['title' => 'Bab 3: Menangani Ping/Pong Heartbeat & Auto-reconnect', 'description' => 'Mendeteksi koneksi klien yang terputus mendadak dan membersihkan resource memori.'],
                ],
            ],
            [
                'title' => 'Tutorial Tailwind CSS v4: Fitur Baru & Optimasi Performa',
                'description' => 'Eksplorasi versi terbaru Tailwind CSS: mesin kompilasi baru berbasis native CSS variables, @theme directive, dan pengurangan ukuran bundle.',
                'type' => 'Tutorial',
                'tags' => 'Tailwind CSS, CSS, Frontend, UI',
                'file_path' => null,
                'views_count' => 1650,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Arsitektur Mesin Engine Baru Berbasis CSS Native', 'description' => 'Menghilangkan konfigurasi file tailwind.config.js dan beralih ke native CSS rules.'],
                    ['title' => 'Bab 2: Penggunaan @theme Directives & Custom Variables', 'description' => 'Kustomisasi warna, font, dan spacing langsung di dalam file CSS utama.'],
                    ['title' => 'Bab 3: Optimasi Ukuran File CSS Produksi Sub-10KB', 'description' => 'Menghasilkan file style minimalis yang hanya menyertakan utility aktif.'],
                ],
            ],
            [
                'title' => 'Tutorial Unit Testing & Mocking di Laravel Menggunakan Pest PHP',
                'description' => 'Belajar menulis pengujian otomatis yang elegan, ekspresif, dan mudah dibaca pada framework Laravel menggunakan testing suite Pest PHP.',
                'type' => 'Tutorial',
                'tags' => 'PHP, Laravel, Pest, Testing',
                'file_path' => null,
                'views_count' => 1820,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Konsep Dasar Pest: Expectation API & Higher Order Testing', 'description' => 'Menyusun assertion yang jelas tanpa boilerplate class PHPUnit kuno.'],
                    ['title' => 'Bab 2: Mocking Layanan Eksternal & HTTP Client', 'description' => 'Mengisolasi pengujian tanpa perlu melakukan request jaringan sungguhan.'],
                    ['title' => 'Bab 3: Menulis Architecture Test untuk Menjaga Struktur Folder', 'description' => 'Memastikan controller tidak memanggil model secara langsung tanpa repository.'],
                ],
            ],
            [
                'title' => 'Tutorial Dasar Cloudflare Workers: Serverless Edge Computing',
                'description' => 'Panduan mendeploy fungsi serverless di jaringan edge global Cloudflare: manipulasi request, autentikasi header, dan pemanfaatan key-value storage.',
                'type' => 'Tutorial',
                'tags' => 'Serverless, Cloudflare, Edge Computing, JavaScript',
                'file_path' => null,
                'views_count' => 1560,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Arsitektur V8 Isolates vs Container Serverless Konvensional', 'description' => 'Keunggulan cold start nol milidetik pada komputasi edge.'],
                    ['title' => 'Bab 2: Menangani Request Masuk & Manipulasi Header di Edge', 'description' => 'Menyuntikkan token otentikasi sebelum request diteruskan ke server origin.'],
                    ['title' => 'Bab 3: Menggunakan Cloudflare KV untuk Caching Data Global', 'description' => 'Menyimpan konfigurasi dan data statis yang didistribusikan ke ratusan data center dunia.'],
                ],
            ],
            [
                'title' => 'Panduan Konkurensi & Mutex di Bahasa C untuk Pemula',
                'description' => 'Memahami dasar pemrograman konkuren tingkat rendah di sistem operasi Unix: pembuatan thread POSIX, locking mutex, dan pencegahan deadlocks.',
                'type' => 'Modul',
                'tags' => 'C, Operating Systems, Posix Threads, Concurrency',
                'file_path' => 'https://storage.progresshub.dev/modules/c-concurrency.pdf',
                'views_count' => 1430,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Membuat Thread dengan pthread_create & pthread_join', 'description' => 'Siklus hidup thread dan pemisahan eksekusi instruksi CPU.'],
                    ['title' => 'Bab 2: Melindungi Critical Section dengan pthread_mutex', 'description' => 'Mencegah inkonsistensi nilai variabel bersama saat diakses bersamaan.'],
                    ['title' => 'Bab 3: Kondisi Sinyal Thread dengan pthread_cond', 'description' => 'Membangun antrean produsen-konsumen dengan mekanisme sinyal efisien.'],
                ],
            ],
            [
                'title' => 'Sistem Antrian & Background Job Terdistribusi dengan RabbitMQ',
                'description' => 'Arsitektur pemrosesan tugas asinkron di belakang layar: pertukaran pesan (exchanges), antrean tahan banting (durable queues), dan dead letter exchange.',
                'type' => 'Modul',
                'tags' => 'RabbitMQ, Message Broker, Distributed Systems, Backend',
                'file_path' => 'https://storage.progresshub.dev/modules/rabbitmq-distributed.pdf',
                'views_count' => 2050,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Konsep Exchange, Queue, & Routing Key', 'description' => 'Perbedaan pola pengiriman Direct, Fanout, Topic, dan Headers exchange.'],
                    ['title' => 'Bab 2: Pola Work Queues & Publish/Subscribe', 'description' => 'Membagi beban kerja pemrosesan gambar/video ke banyak worker node.'],
                    ['title' => 'Bab 3: Penanganan Pesan Gagal: Dead Letter Exchange & Retry Policies', 'description' => 'Menangani pesan rusak tanpa menghentikan pemrosesan antrean lainnya.'],
                ],
            ],
            [
                'title' => 'Panduan Elasticsearch: Search Engine & Log Aggregation',
                'description' => 'Membangun pencarian teks skala besar dan agregasi log: mapping dokumen, analyzers bahasa, query DSL kompleks, dan cluster sharding.',
                'type' => 'Modul',
                'tags' => 'Elasticsearch, Search, Log Management, Big Data',
                'file_path' => 'https://storage.progresshub.dev/modules/elasticsearch-guide.pdf',
                'views_count' => 1710,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Konsep Cluster, Node, Shard, & Replica', 'description' => 'Bagaimana data didistribusikan dan direplikasi untuk ketersediaan tinggi.'],
                    ['title' => 'Bab 2: Mapping Dokumen, Analyzers, & Tokenizers', 'description' => 'Menguraikan kalimat menjadi kata dasar untuk pencarian teks terbalik.'],
                    ['title' => 'Bab 3: Query DSL: Full-Text Search, Fuzzy Search & Filtering', 'description' => 'Menyusun query pencarian yang mentoleransi salah ketik pengguna.'],
                ],
            ],
            [
                'title' => 'Dasar Komputasi Grafika & WebGL dengan Three.js',
                'description' => 'Belajar membuat visualisasi 3D interaktif pada web browser menggunakan Three.js: scene, kamera, pencahayaan realistis, shader, dan raycasting.',
                'type' => 'Tutorial',
                'tags' => 'WebGL, Three.js, 3D Graphics, JavaScript',
                'file_path' => null,
                'views_count' => 2190,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bab 1: Scene, Camera, & Renderer: Tiga Pilar Utama', 'description' => 'Menyiapkan panggung visual 3D dan proyeksi kamera perspektif.'],
                    ['title' => 'Bab 2: Geometry, Material, & Pencahayaan Realistis', 'description' => 'Menerapkan tekstur gambar, bayangan dinamis, dan efek pantulan cahaya.'],
                    ['title' => 'Bab 3: Animasi Loop & Interaksi Objek via Raycaster', 'description' => 'Mendeteksi klik mouse pengguna pada objek 3D di layar monitor.'],
                ],
            ],
            [
                'title' => 'Panduan Regulasi Privasi Data & Enkripsi untuk Developer',
                'description' => 'Prinsip implementasi perlindungan data pribadi dalam kode aplikasi: enkripsi simetris/asimetris, hashing password kuat, dan kepatuhan hukum privasi.',
                'type' => 'Artikel',
                'tags' => 'Cryptography, Data Privacy, Compliance, Security',
                'file_path' => null,
                'views_count' => 1180,
                'approval_status' => 'approved',
                'chapters' => [
                    ['title' => 'Bagian 1: Enkripsi Simetris (AES-GCM) vs Asimetris (RSA/ECC)', 'description' => 'Kapan mengamankan data at-rest vs mengamankan pertukaran kunci sesi.'],
                    ['title' => 'Bagian 2: Hashing Password yang Aman: Argon2id vs Bcrypt', 'description' => 'Mengapa algoritma MD5 dan SHA256 berbahaya untuk penyimpanan kata sandi.'],
                    ['title' => 'Bagian 3: Prinsip Minimalisasi Data & Kepatuhan UU PDP', 'description' => 'Membatasi pengumpulan data sensitif hanya pada hal yang esensial bagi bisnis.'],
                ],
            ],
            // Additional resources for Member Submissions
            [
                'title' => 'Modul Pengenalan WebAssembly dengan Rust',
                'description' => 'Panduan langkah awal mengompilasi kode bahasa Rust menjadi berkas biner WebAssembly (.wasm) untuk performa komputasi intensif di browser.',
                'type' => 'Modul',
                'tags' => 'WebAssembly, Rust, Performance',
                'file_path' => 'https://storage.progresshub.dev/modules/rust-wasm-intro.pdf',
                'views_count' => 450,
                'approval_status' => 'pending',
                'chapters' => [
                    ['title' => 'Bab 1: Kompilasi Rust ke Wasm via wasm-pack', 'description' => 'Setup toolchain kompilasi dan pembuatan berkas package npm.'],
                    ['title' => 'Bab 2: Interop Data Antara JavaScript dan WebAssembly Memory', 'description' => 'Melewatkan string dan array byte bolak-balik tanpa bottleneck.'],
                ],
            ],
            [
                'title' => 'Panduan Setup Kubernetes Multi-Node Menggunakan K3s',
                'description' => 'Instalasi cluster Kubernetes ringan berbasis distribusi K3s pada server fisik lokal atau VPS berdaya komputasi hemat.',
                'type' => 'Tutorial',
                'tags' => 'Kubernetes, K3s, DevOps, Homelab',
                'file_path' => null,
                'views_count' => 520,
                'approval_status' => 'pending',
                'chapters' => [
                    ['title' => 'Bab 1: Instalasi Control Plane & Worker Node K3s', 'description' => 'Menghubungkan agent node ke master node menggunakan token cluster.'],
                    ['title' => 'Bab 2: Konfigurasi Ingress Traefik & Cert-Manager', 'description' => 'Penerbitan sertifikat SSL Let\'s Encrypt otomatis untuk domain publik.'],
                ],
            ],
            [
                'title' => 'Koleksi Script Pentest Ilegal Jaringan Kampus',
                'description' => 'Script otomatisasi pemindaian router wifi dan injeksi brute force untuk memperoleh akses jaringan internal tanpa izin pengelola.',
                'type' => 'Tools',
                'tags' => 'Security, Pentest, Scripting',
                'file_path' => null,
                'views_count' => 120,
                'approval_status' => 'rejected',
                'rejection_reason' => 'Materi mengandung panduan eksploitasi yang melanggar hukum dan tidak memenuhi standar etika keamanan siber UKM.',
                'chapters' => [
                    ['title' => 'Bagian 1: Script Brute-force Login WiFi', 'description' => 'Otomasi kamus kata sandi pada portal login router.'],
                ],
            ],
        ];

        $createdResources = [];
        foreach ($resourcesSeed as $index => $rData) {
            $creator = $index < 20 ? $admin : $members[$index % count($members)];

            $resource = Resource::create([
                'title' => $rData['title'],
                'description' => $rData['description'],
                'type' => $rData['type'],
                'tags' => $rData['tags'],
                'file_path' => $rData['file_path'],
                'cover_image' => null,
                'views_count' => $rData['views_count'],
                'created_by' => $creator->id,
                'approval_status' => $rData['approval_status'],
                'rejection_reason' => $rData['rejection_reason'] ?? null,
            ]);

            foreach ($rData['chapters'] as $order => $chap) {
                ResourceChapter::create([
                    'resource_id' => $resource->id,
                    'chapter_number' => $order + 1,
                    'title' => $chap['title'],
                    'description' => $chap['description'],
                ]);
            }

            $createdResources[] = $resource;
        }

        // ==========================================
        // 6. SEED SUBMISSIONS (26 total: 9 Events, 9 Projects, 8 Resources)
        // ==========================================
        // Structure:
        // - Approved submissions (reviewed by admin, approved status)
        // - Pending submissions (submitted by members, awaiting admin action)
        // - Rejected submissions (rejected by admin with concrete feedback reason)

        $submissionsSeed = [
            // --- Event Submissions (9) ---
            [
                'user_index' => 0,
                'submittable' => $createdEvents[12], // Kelas Algoritma Lanjut
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 1,
                'submittable' => $createdEvents[13], // Kelas Vue 3 & Nuxt 3
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 2,
                'submittable' => $createdEvents[14], // Kelas CI/CD Actions
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 3,
                'submittable' => $createdEvents[21], // Sharing Session Monolith to Microservices
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 4,
                'submittable' => $createdEvents[22], // Sharing Session AI Assistants
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 5,
                'submittable' => $createdEvents[25], // Kelas Kafka (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 6,
                'submittable' => $createdEvents[26], // Kelas GraphQL (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 7,
                'submittable' => $createdEvents[27], // Workshop Hacking Mobile (Rejected)
                'status' => 'rejected',
                'rejection_reason' => 'Silabus terlalu berfokus pada eksploitasi agresif tanpa materi defensive security dan etika pengungkapan kerentanan yang memadai.',
                'reviewed' => true,
            ],
            [
                'user_index' => 8,
                'submittable' => $createdEvents[24], // Sharing Session Zero-Trust Security
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],

            // --- Project Submissions (9) ---
            [
                'user_index' => 9,
                'submittable' => $createdProjects[2], // RustyTask
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 10,
                'submittable' => $createdProjects[3], // TinyKV
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 11,
                'submittable' => $createdProjects[6], // Query Visualizer
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 12,
                'submittable' => $createdProjects[7], // CollabCode
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 13,
                'submittable' => $createdProjects[8], // PulseGate
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 14,
                'submittable' => $createdProjects[25], // CI Vuln Scanner (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 15,
                'submittable' => $createdProjects[26], // Crowdfunding Riset (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 16,
                'submittable' => $createdProjects[27], // Crypto Arbitrage Bot (Rejected)
                'status' => 'rejected',
                'rejection_reason' => 'Proyek tidak sesuai dengan fokus edukasi teknologi kampus dan tidak menyertakan dokumentasi penanganan risiko kegagalan finansial.',
                'reviewed' => true,
            ],
            [
                'user_index' => 17,
                'submittable' => $createdProjects[16], // AI Reviewer Action
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],

            // --- Resource Submissions (8) ---
            [
                'user_index' => 18,
                'submittable' => $createdResources[5], // Debugging Memory Leak Node.js
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 19,
                'submittable' => $createdResources[6], // Mengamankan API Web
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 20,
                'submittable' => $createdResources[10], // Docker Compose Starter Kit
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 21,
                'submittable' => $createdResources[15], // Tutorial FastAPI & SQLAlchemy
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
            [
                'user_index' => 22,
                'submittable' => $createdResources[25], // Wasm Rust (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 23,
                'submittable' => $createdResources[26], // K3s Tutorial (Pending)
                'status' => 'pending',
                'rejection_reason' => null,
                'reviewed' => false,
            ],
            [
                'user_index' => 24,
                'submittable' => $createdResources[27], // Script Pentest Ilegal (Rejected)
                'status' => 'rejected',
                'rejection_reason' => 'Materi mengandung panduan eksploitasi yang melanggar hukum dan tidak memenuhi standar etika keamanan siber UKM.',
                'reviewed' => true,
            ],
            [
                'user_index' => 0,
                'submittable' => $createdResources[16], // Tutorial WebSockets Go
                'status' => 'approved',
                'rejection_reason' => null,
                'reviewed' => true,
            ],
        ];

        foreach ($submissionsSeed as $sData) {
            $user = $members[$sData['user_index'] % count($members)];
            $submittable = $sData['submittable'];

            Submission::create([
                'user_id' => $user->id,
                'submittable_type' => get_class($submittable),
                'submittable_id' => $submittable->id,
                'status' => $sData['status'],
                'rejection_reason' => $sData['rejection_reason'],
                'reviewed_by' => $sData['reviewed'] ? $admin->id : null,
                'reviewed_at' => $sData['reviewed'] ? now()->subDays(rand(1, 10)) : null,
            ]);
        }
    }
}
