<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Profile::query()->updateOrCreate([], [
            'name' => 'Subkhi Mashadi',
            'email' => 'subkhimash@gmail.com',
            'whatsapp' => 'https://wa.me/6283134543314',
            'linkedin' => 'https://www.linkedin.com/in/subkhimashadi',
            'about_p1_id' => 'Fullstack Developer dengan latar belakang pendidikan S1 Informatika yang memiliki pengalaman dalam mengembangkan aplikasi web secara end-to-end.',
            'about_p1_en' => 'Fullstack Developer with a Bachelor\'s degree in Informatics, experienced in building end-to-end web applications.',
            'about_p2_id' => 'Berfokus pada pengembangan clean code menggunakan Laravel dan React, pengelolaan basis data MySQL, integrasi RESTful API, serta optimasi performa sistem. Siap berkontribusi secara adaptif dan kolaboratif dalam lingkungan tim pengembangan perangkat lunak.',
            'about_p2_en' => 'Focused on writing clean code with Laravel and React, managing MySQL databases, integrating RESTful APIs, and optimizing system performance. Ready to contribute adaptively and collaboratively within a software development team.',
        ]);

        $skills = [
            ['name' => 'PHP', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'JavaScript', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'HTML5', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'CSS3', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'R', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'Python', 'group' => 'Bahasa Pemrograman'],
            ['name' => 'Laravel', 'group' => 'Framework & Library'],
            ['name' => 'React', 'group' => 'Framework & Library'],
            ['name' => 'CodeIgniter (CI3, CI4)', 'group' => 'Framework & Library'],
            ['name' => 'Express.js', 'group' => 'Framework & Library'],
            ['name' => 'Node.js', 'group' => 'Framework & Library'],
            ['name' => 'MySQL', 'group' => 'Database & Tools'],
            ['name' => 'Git', 'group' => 'Database & Tools'],
            ['name' => 'GitHub', 'group' => 'Database & Tools'],
            ['name' => 'Postman', 'group' => 'Database & Tools'],
            ['name' => 'RESTful API', 'group' => 'Database & Tools'],
            ['name' => 'WordPress', 'group' => 'Database & Tools'],
            ['name' => 'Elementor', 'group' => 'Database & Tools'],
        ];

        foreach ($skills as $skill) {
            Skill::query()->updateOrCreate(
                ['name' => $skill['name']],
                ['group' => $skill['group'], 'is_active' => true],
            );
        }

        $experiences = [
            [
                'company' => 'Konnco Studio',
                'role_id' => 'Full Stack Developer',
                'role_en' => 'Full Stack Developer',
                'type_id' => 'Penuh Waktu',
                'type_en' => 'Full-time',
                'points_id' => [
                    'Mengembangkan dan memelihara aplikasi web skala penuh (fullstack) menggunakan Laravel pada sisi Back-End dan React pada sisi Front-End.',
                    'Merancang serta mengimplementasikan arsitektur database MySQL, perancangan RESTful API, dan antarmuka pengguna yang responsif.',
                    'Melakukan optimasi performa aplikasi, penanganan bug (debugging), dan memastikan keandalan serta keamanan sistem.',
                    'Berkolaborasi dengan tim lintas fungsi untuk merencanakan dan mengeksekusi fitur-fitur baru sesuai kebutuhan bisnis.',
                ],
                'points_en' => [
                    'Developed and maintained fullstack web applications using Laravel on the back-end and React on the front-end.',
                    'Designed and implemented MySQL database architecture, RESTful API design, and responsive user interfaces.',
                    'Optimized application performance, handled debugging, and ensured system reliability and security.',
                    'Collaborated with cross-functional teams to plan and execute new features according to business needs.',
                ],
                'started_at' => '2025-09-01',
                'ended_at' => null,
            ],
            [
                'company' => 'Coding Camp DBS Foundation',
                'role_id' => 'Mentor',
                'role_en' => 'Mentor',
                'type_id' => 'Magang',
                'type_en' => 'Internship',
                'points_id' => [
                    'Membimbing mahasiswa yang ikut serta dalam Coding Camp DBS Foundation.',
                    'Membantu mahasiswa dalam memecahkan masalah pada saat pelatihan Coding Camp DBS Foundation berlangsung.',
                ],
                'points_en' => [
                    'Mentored students participating in the Coding Camp DBS Foundation program.',
                    'Helped students solve problems during the Coding Camp DBS Foundation training.',
                ],
                'started_at' => '2025-01-01',
                'ended_at' => '2025-07-31',
            ],
            [
                'company' => 'Universitas Alma Ata',
                'role_id' => 'Wordpress Administrator',
                'role_en' => 'Wordpress Administrator',
                'type_id' => 'Magang',
                'type_en' => 'Internship',
                'points_id' => [
                    'Implementasi praktik SEO On-Page seperti optimasi heading, URL, internal linking, dan schema markup.',
                    'Membangun website rapi dan SEO-friendly menggunakan Elementor dan page builder.',
                ],
                'points_en' => [
                    'Implemented on-page SEO practices such as heading, URL, internal linking, and schema markup optimization.',
                    'Built clean, SEO-friendly websites using Elementor and page builders.',
                ],
                'started_at' => '2024-10-01',
                'ended_at' => '2025-02-28',
            ],
            [
                'company' => 'Kominfo Yogyakarta',
                'role_id' => 'Junior Web Developer',
                'role_en' => 'Junior Web Developer',
                'type_id' => 'Magang',
                'type_en' => 'Internship',
                'points_id' => [
                    'Mengembangkan dan mengelola situs web pada Front End dan Backend menggunakan bahasa PHP.',
                    'Membantu manajer proyek dalam merencanakan dan melaksanakan berbagai proyek pengembangan web, memastikan proyek berjalan sesuai jadwal dan target yang telah ditentukan.',
                ],
                'points_en' => [
                    'Developed and managed front-end and back-end websites using PHP.',
                    'Assisted the project manager in planning and executing web development projects, ensuring they ran on schedule and met targets.',
                ],
                'started_at' => '2024-06-01',
                'ended_at' => '2024-06-30',
            ],
            [
                'company' => 'Dicoding',
                'role_id' => 'Front End & Backend Developer',
                'role_en' => 'Front End & Backend Developer',
                'type_id' => 'Magang',
                'type_en' => 'Internship',
                'points_id' => [
                    'Berkontribusi dalam pengembangan aplikasi web baik pada sisi Front End maupun Backend menggunakan teknologi seperti React, Node.js, dan Express.',
                    'Mengoptimalkan performa aplikasi dan memperbaiki bug yang ditemukan, meningkatkan kecepatan dan stabilitas aplikasi secara signifikan, serta berkolaborasi dengan tim pengembangan dalam merancang dan mengimplementasikan API untuk mendukung integrasi sistem yang efisien.',
                ],
                'points_en' => [
                    'Contributed to front-end and back-end web application development using React, Node.js, and Express.',
                    'Optimized application performance and fixed bugs, significantly improving speed and stability, while collaborating with the development team to design and implement APIs for efficient system integration.',
                ],
                'started_at' => '2023-06-01',
                'ended_at' => '2023-12-31',
            ],
            [
                'company' => 'KBBMI',
                'role_id' => 'Backend Developer',
                'role_en' => 'Backend Developer',
                'type_id' => 'Magang',
                'type_en' => 'Internship',
                'points_id' => [
                    'Membangun dan mengelola sistem Backend menggunakan Laravel dan database MySQL, memastikan data tersimpan dengan aman dan efisien.',
                    'Bekerja sama dengan tim Front End untuk mengintegrasikan layanan Backend yang optimal dan responsif terhadap permintaan pengguna.',
                ],
                'points_en' => [
                    'Built and managed backend systems using Laravel and MySQL, ensuring data was stored safely and efficiently.',
                    'Worked with the Front End team to integrate optimal, responsive backend services.',
                ],
                'started_at' => '2022-07-01',
                'ended_at' => '2023-03-31',
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::query()->updateOrCreate(
                ['company' => $experience['company'], 'role_id' => $experience['role_id']],
                array_merge($experience, ['is_active' => true]),
            );
        }

        $certificates = [
            [
                'title' => 'Sertifikat Kompetensi - Junior Web Developer',
                'issuer' => 'BNSP (Badan Nasional Sertifikasi Profesi)',
                'year' => '2024',
            ],
            [
                'title' => 'Digital Talent Scholarship (VSGA) - Junior Web Developer',
                'issuer' => 'Kominfo & VSGA',
                'year' => '2024',
            ],
            [
                'title' => 'Dicoding x Kampus Merdeka - Front-End & Back-End Developer',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2023',
            ],
            [
                'title' => 'Data Science Training',
                'issuer' => 'DQLab Academy',
                'year' => '2025',
            ],
            [
                'title' => 'Certificate of Appreciation - Mentor Coding Camp',
                'issuer' => 'Dicoding x DBS Foundation',
                'year' => '2025',
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::query()->updateOrCreate(
                ['title' => $certificate['title']],
                array_merge($certificate, ['is_active' => true]),
            );
        }

        $projects = [
            [
                'title' => 'Konnco Studio Client Portal',
                'cover_path' => 'projects/client-portal.svg',
                'stack' => ['Laravel', 'React', 'MySQL', 'RESTful API'],
                'github' => 'https://github.com/subkhi-mashadi/client-portal',
                'live' => 'https://klien.konncostudio.com',
                'problem_id' => 'Tim internal kesulitan melacak progres proyek klien karena komunikasi tersebar di banyak channel terpisah.',
                'problem_en' => 'The internal team struggled to track client project progress because communication was scattered across many separate channels.',
                'solution_id' => 'Membangun portal klien fullstack dengan Laravel di Back-End dan React di Front-End, lengkap dengan dashboard progres real-time dan RESTful API buat integrasi antar tim.',
                'solution_en' => 'Built a fullstack client portal with Laravel on the back-end and React on the front-end, complete with a real-time progress dashboard and a RESTful API for cross-team integration.',
                'result_id' => 'Waktu respon tim ke klien turun 40%, semua progres proyek terpusat di satu tempat.',
                'result_en' => 'Reduced team response time to clients by 40%, centralizing all project progress in one place.',
            ],
            [
                'title' => 'Inventory & POS System',
                'cover_path' => 'projects/inventory-pos.svg',
                'stack' => ['Laravel', 'MySQL', 'Alpine.js', 'Tailwind CSS'],
                'github' => 'https://github.com/subkhi-mashadi/inventory-pos',
                'live' => 'https://demo-pos.subkhimash.dev',
                'problem_id' => 'UMKM masih mencatat stok dan penjualan secara manual, sering terjadi selisih stok dan laporan yang lambat.',
                'problem_en' => 'Small businesses were tracking stock and sales manually, leading to frequent stock discrepancies and slow reporting.',
                'solution_id' => 'Mengembangkan sistem POS & inventory berbasis Laravel dengan validasi stok otomatis, cetak struk, dan laporan penjualan harian.',
                'solution_en' => 'Developed a Laravel-based POS and inventory system with automatic stock validation, receipt printing, and daily sales reports.',
                'result_id' => 'Selisih stok berkurang signifikan, laporan penjualan bisa diakses real-time tanpa rekap manual.',
                'result_en' => 'Significantly reduced stock discrepancies, with real-time sales reports replacing manual recaps.',
            ],
            [
                'title' => 'Alma Ata University Website Revamp',
                'cover_path' => 'projects/almaata-revamp.svg',
                'stack' => ['WordPress', 'Elementor', 'SEO'],
                'github' => null,
                'live' => 'https://almaata.ac.id',
                'problem_id' => 'Website kampus punya struktur URL berantakan dan skor SEO rendah, susah ditemukan calon mahasiswa lewat Google.',
                'problem_en' => 'The university website had messy URL structures and low SEO scores, making it hard for prospective students to find via Google.',
                'solution_id' => 'Melakukan revamp on-page SEO (heading, URL, internal linking, schema markup) dan membangun ulang halaman-halaman utama pakai Elementor.',
                'solution_en' => 'Performed an on-page SEO revamp (headings, URLs, internal linking, schema markup) and rebuilt key pages using Elementor.',
                'result_id' => 'Trafik organik meningkat, halaman utama lebih cepat diakses dan lebih rapi secara struktur.',
                'result_en' => 'Increased organic traffic, with main pages loading faster and structured more cleanly.',
            ],
            [
                'title' => 'Realtime Chat Dashboard',
                'cover_path' => 'projects/chat-dashboard.svg',
                'stack' => ['Node.js', 'Express.js', 'React', 'Socket.IO'],
                'github' => 'https://github.com/subkhi-mashadi/realtime-chat-dashboard',
                'live' => 'https://chat-demo.subkhimash.dev',
                'problem_id' => 'Tim customer service butuh alat monitoring chat pelanggan secara real-time tanpa refresh manual.',
                'problem_en' => 'The customer service team needed a tool to monitor customer chats in real time without manual refreshing.',
                'solution_id' => 'Membangun dashboard chat real-time dengan Express.js dan Socket.IO di Backend, React di Front-End buat update pesan instan.',
                'solution_en' => 'Built a real-time chat dashboard with Express.js and Socket.IO on the back-end, and React on the front-end for instant message updates.',
                'result_id' => 'Waktu tanggap CS ke pelanggan lebih cepat, tanpa perlu refresh halaman manual.',
                'result_en' => 'Faster customer service response times, eliminating the need for manual page refreshes.',
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                ['title' => $project['title']],
                array_merge($project, ['is_active' => true]),
            );
        }
    }
}
