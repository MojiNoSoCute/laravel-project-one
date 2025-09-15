<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample posts for different categories
        $posts = [
            // Category 1: Course Overview (ภาพรวมหลักสูตร)
            [
                'main' => '1',
                'title' => 'Software Engineering Program Overview',
                'content' => 'The Software Engineering program at our university is designed to provide students with comprehensive knowledge and practical skills in software development, project management, and system design. Our curriculum covers modern programming languages, software architecture, database design, and software testing methodologies.',
                'image' => 'uploads/sample_course_overview.jpg'
            ],
            [
                'main' => '1',
                'title' => 'Curriculum Structure and Learning Outcomes',
                'content' => 'Our 4-year program is structured to progressively build expertise from fundamental programming concepts to advanced software engineering practices. Students will learn object-oriented programming, web development, mobile app development, and enterprise software solutions.',
                'image' => 'uploads/sample_curriculum.jpg'
            ],

            // Category 2: Interesting Activities (กิจกรรมที่น่าสนใจ)
            [
                'main' => '2',
                'title' => 'Annual Hackathon Competition 2025',
                'content' => 'Join our exciting 48-hour hackathon where students collaborate to create innovative software solutions. Participants work in teams to develop applications addressing real-world problems, with mentorship from industry professionals and faculty members.',
                'image' => 'uploads/sample_hackathon.jpg'
            ],
            [
                'main' => '2',
                'title' => 'Tech Talk Series: Industry Insights',
                'content' => 'Monthly tech talks featuring guest speakers from leading technology companies. Students gain insights into current industry trends, emerging technologies, and career opportunities in software engineering.',
                'image' => 'uploads/sample_tech_talk.jpg'
            ],
            [
                'main' => '2',
                'title' => 'Open Source Contribution Workshop',
                'content' => 'Learn how to contribute to open source projects and build your portfolio. This workshop covers Git workflows, code review processes, and best practices for collaborative software development.',
                'image' => 'uploads/sample_opensource.jpg'
            ],

            // Category 3: Teachers (อาจารย์ผู้สอน)
            [
                'main' => '3',
                'title' => 'Dr. Somchai Jaidee',
                'content' => 'Professor of Software Engineering with 15 years of experience in web development and database systems. Specializes in full-stack development, RESTful APIs, and microservices architecture. PhD in Computer Science from Chulalongkorn University.',
                'image' => 'uploads/sample_teacher_1.jpg'
            ],
            [
                'main' => '3',
                'title' => 'Dr. Siriporn Thanakit',
                'content' => 'Associate Professor specializing in mobile application development and user experience design. Expert in iOS and Android development, UI/UX principles, and human-computer interaction. Former senior developer at leading tech companies.',
                'image' => 'uploads/sample_teacher_2.jpg'
            ],
            [
                'main' => '3',
                'title' => 'Asst. Prof. Niran Suksan',
                'content' => 'Assistant Professor focusing on software testing, quality assurance, and DevOps practices. Industry experience in automated testing frameworks, continuous integration, and cloud deployment strategies.',
                'image' => 'uploads/sample_teacher_3.jpg'
            ],

            // Category 4: Student Works (ผลงานนักศึกษา)
            [
                'main' => '4',
                'title' => 'E-Commerce Platform Development',
                'content' => 'Final year project creating a complete e-commerce solution using Laravel and React. Features include user authentication, payment integration, inventory management, and admin dashboard. Developed by Team Alpha.',
                'image' => 'uploads/sample_student_work_1.jpg'
            ],
            [
                'main' => '4',
                'title' => 'Mobile Learning Application',
                'content' => 'Cross-platform mobile app for online learning built with Flutter. Includes video streaming, interactive quizzes, progress tracking, and offline content access. Winner of Best Mobile App Award 2024.',
                'image' => 'uploads/sample_student_work_2.jpg'
            ],
            [
                'main' => '4',
                'title' => 'AI-Powered Task Management System',
                'content' => 'Intelligent task management system using machine learning to predict project timelines and optimize resource allocation. Built with Python Django and TensorFlow. Featured in university research publication.',
                'image' => 'uploads/sample_student_work_3.jpg'
            ],

            // Category 5: Outstanding Alumni (ศิษย์เก่าเด่น)
            [
                'main' => '5',
                'title' => 'Kittipong Rattana - Senior Software Engineer at Google',
                'content' => 'Class of 2018 graduate now working at Google Thailand as Senior Software Engineer. Leads the development of Google Cloud Platform services and mentors junior developers. Active contributor to open source projects.',
                'image' => 'uploads/sample_alumni_1.jpg'
            ],
            [
                'main' => '5',
                'title' => 'Ploy Siriporn - CTO at StartupXYZ',
                'content' => 'Class of 2019 graduate who founded her own fintech startup. Successfully raised Series A funding and leads a team of 25 engineers. Recognized as "Young Entrepreneur of the Year 2023" by Tech Magazine.',
                'image' => 'uploads/sample_alumni_2.jpg'
            ],
            [
                'main' => '5',
                'title' => 'Anan Wongsakul - Lead Developer at LINE Thailand',
                'content' => 'Class of 2020 graduate working as Lead Developer at LINE Thailand. Specializes in backend systems and messaging platforms. Regular speaker at tech conferences and active in the Thai developer community.',
                'image' => 'uploads/sample_alumni_3.jpg'
            ]
        ];

        // Create sample posts
        foreach ($posts as $postData) {
            Post::create($postData);
        }

        $this->command->info('Created ' . count($posts) . ' sample posts across all categories.');
    }
}
