<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uploadDir = public_path('uploads');

        // Ensure uploads directory exists
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true);
        }

        // Check if sample images exist, if not create them
        $requiredImages = [
            'sample_course_overview.jpg',
            'sample_curriculum.jpg',
            'sample_hackathon.jpg',
            'sample_tech_talk.jpg',
            'sample_opensource.jpg',
            'sample_teacher_1.jpg',
            'sample_teacher_2.jpg',
            'sample_teacher_3.jpg',
            'sample_student_work_1.jpg',
            'sample_student_work_2.jpg',
            'sample_student_work_3.jpg',
            'sample_alumni_1.jpg',
            'sample_alumni_2.jpg',
            'sample_alumni_3.jpg'
        ];

        $missingImages = [];
        foreach ($requiredImages as $image) {
            if (!File::exists($uploadDir . '/' . $image)) {
                $missingImages[] = $image;
            }
        }

        if (!empty($missingImages)) {
            $this->command->info('Creating ' . count($missingImages) . ' missing sample images...');
            $this->createSampleImages($missingImages, $uploadDir);
        } else {
            $this->command->info('All sample images already exist.');
        }

        $this->command->info('Image seeding completed. Total images: ' . count($requiredImages));
    }

    /**
     * Create sample images with professional styling
     */
    private function createSampleImages(array $imageNames, string $uploadDir): void
    {
        $imageConfigs = [
            'sample_course_overview.jpg' => ['color' => [52, 152, 219], 'text' => 'SOFTWARE', 'sub' => 'ENGINEERING'],
            'sample_curriculum.jpg' => ['color' => [46, 125, 50], 'text' => 'CURRICULUM', 'sub' => 'STRUCTURE'],
            'sample_hackathon.jpg' => ['color' => [156, 39, 176], 'text' => 'HACKATHON', 'sub' => '2025'],
            'sample_tech_talk.jpg' => ['color' => [255, 87, 34], 'text' => 'TECH TALK', 'sub' => 'SERIES'],
            'sample_opensource.jpg' => ['color' => [33, 150, 243], 'text' => 'OPEN SOURCE', 'sub' => 'WORKSHOP'],
            'sample_teacher_1.jpg' => ['color' => [96, 125, 139], 'text' => 'DR. SOMCHAI', 'sub' => 'WEB EXPERT'],
            'sample_teacher_2.jpg' => ['color' => [121, 85, 72], 'text' => 'DR. SIRIPORN', 'sub' => 'MOBILE DEV'],
            'sample_teacher_3.jpg' => ['color' => [69, 90, 100], 'text' => 'PROF. NIRAN', 'sub' => 'TESTING'],
            'sample_student_work_1.jpg' => ['color' => [76, 175, 80], 'text' => 'E-COMMERCE', 'sub' => 'PLATFORM'],
            'sample_student_work_2.jpg' => ['color' => [63, 81, 181], 'text' => 'MOBILE APP', 'sub' => 'LEARNING'],
            'sample_student_work_3.jpg' => ['color' => [233, 30, 99], 'text' => 'AI SYSTEM', 'sub' => 'TASK MGT'],
            'sample_alumni_1.jpg' => ['color' => [255, 193, 7], 'text' => 'KITTIPONG', 'sub' => 'GOOGLE'],
            'sample_alumni_2.jpg' => ['color' => [139, 195, 74], 'text' => 'PLOY S.', 'sub' => 'STARTUP CTO'],
            'sample_alumni_3.jpg' => ['color' => [255, 152, 0], 'text' => 'ANAN W.', 'sub' => 'LINE THAI']
        ];

        foreach ($imageNames as $imageName) {
            if (isset($imageConfigs[$imageName])) {
                $config = $imageConfigs[$imageName];
                $this->createImage($uploadDir . '/' . $imageName, $config);
                $this->command->info("Created: {$imageName}");
            }
        }
    }

    /**
     * Create a single professional image
     */
    private function createImage(string $filepath, array $config): void
    {
        $width = 600;
        $height = 400;
        $img = imagecreate($width, $height);

        // Colors
        $bgColor = imagecolorallocate($img, $config['color'][0], $config['color'][1], $config['color'][2]);
        $textColor = imagecolorallocate($img, 255, 255, 255);
        $borderColor = imagecolorallocate($img, 255, 255, 255);

        // Gradient effect
        $darkerBg = imagecolorallocate(
            $img,
            max(0, $config['color'][0] - 30),
            max(0, $config['color'][1] - 30),
            max(0, $config['color'][2] - 30)
        );

        for ($i = 0; $i < $height; $i += 20) {
            imagefilledrectangle($img, 0, $i, $width, $i + 10, $darkerBg);
        }

        // Main text
        $font_size = 5;
        $text = $config['text'];
        $text_width = imagefontwidth($font_size) * strlen($text);
        $text_x = ($width - $text_width) / 2;
        $text_y = ($height / 2) - 20;
        imagestring($img, $font_size, $text_x, $text_y, $text, $textColor);

        // Subtext
        $subfont_size = 3;
        $subtext = $config['sub'];
        $subtext_width = imagefontwidth($subfont_size) * strlen($subtext);
        $subtext_x = ($width - $subtext_width) / 2;
        $subtext_y = $text_y + 30;
        imagestring($img, $subfont_size, $subtext_x, $subtext_y, $subtext, $textColor);

        // Border
        imagerectangle($img, 10, 10, $width - 11, $height - 11, $borderColor);

        // Save with high quality
        imagejpeg($img, $filepath, 90);
        imagedestroy($img);
    }
}
