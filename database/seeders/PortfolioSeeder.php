<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
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
    }
}
