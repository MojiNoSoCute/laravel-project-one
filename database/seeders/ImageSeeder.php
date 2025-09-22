<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

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

        // List of required images with specific dimensions for different types
        $requiredImages = [
            'sample_course_overview.jpg' => ['width' => 800, 'height' => 600, 'category' => 'tech'],
            'sample_curriculum.jpg' => ['width' => 800, 'height' => 600, 'category' => 'business'],
            'sample_hackathon.jpg' => ['width' => 800, 'height' => 600, 'category' => 'people'],
            'sample_tech_talk.jpg' => ['width' => 800, 'height' => 600, 'category' => 'business'],
            'sample_opensource.jpg' => ['width' => 800, 'height' => 600, 'category' => 'tech'],
            'sample_teacher_1.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people'],
            'sample_teacher_2.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people'],
            'sample_teacher_3.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people'],
            'sample_student_work_1.jpg' => ['width' => 600, 'height' => 400, 'category' => 'tech'],
            'sample_student_work_2.jpg' => ['width' => 600, 'height' => 400, 'category' => 'tech'],
            'sample_student_work_3.jpg' => ['width' => 600, 'height' => 400, 'category' => 'tech'],
            'sample_alumni_1.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people'],
            'sample_alumni_2.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people'],
            'sample_alumni_3.jpg' => ['width' => 400, 'height' => 500, 'category' => 'people']
        ];

        $missingImages = [];
        foreach ($requiredImages as $imageName => $config) {
            if (!File::exists($uploadDir . '/' . $imageName)) {
                $missingImages[$imageName] = $config;
            }
        }

        if (!empty($missingImages)) {
            $this->command->info('Downloading ' . count($missingImages) . ' random photos from internet...');
            $this->downloadRandomImages($missingImages, $uploadDir);
        } else {
            $this->command->info('All sample images already exist.');
        }

        $this->command->info('Image seeding completed. Total images: ' . count($requiredImages));
    }

    /**
     * Download random images from Lorem Picsum (copyright-free)
     */
    private function downloadRandomImages(array $missingImages, string $uploadDir): void
    {
        foreach ($missingImages as $imageName => $config) {
            try {
                // Generate a random seed for consistent but random images
                $seed = rand(1, 1000);

                // Build URL based on category and dimensions
                $url = $this->buildImageUrl($config['width'], $config['height'], $seed, $config['category']);

                // Download the image
                $response = Http::timeout(30)->get($url);

                if ($response->successful()) {
                    $filePath = $uploadDir . '/' . $imageName;
                    file_put_contents($filePath, $response->body());
                    $this->command->info("Downloaded: {$imageName} from {$url}");
                } else {
                    $this->command->error("Failed to download: {$imageName}");
                    // Create a fallback placeholder if download fails
                    $this->createFallbackImage($uploadDir . '/' . $imageName, $config);
                }

                // Small delay to be respectful to the service
                usleep(500000); // 0.5 seconds

            } catch (\Exception $e) {
                $this->command->error("Error downloading {$imageName}: " . $e->getMessage());
                // Create a fallback placeholder if download fails
                $this->createFallbackImage($uploadDir . '/' . $imageName, $config);
            }
        }
    }

    /**
     * Build image URL based on category and requirements
     */
    private function buildImageUrl(int $width, int $height, int $seed, string $category): string
    {
        // Base URL for Lorem Picsum
        $baseUrl = "https://picsum.photos";

        // For people category, use Lorem Picsum with specific seeds that often contain people
        if ($category === 'people') {
            // Use Lorem Picsum for people-related images with specific seeds
            $peopleSeeds = [1, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70];
            $selectedSeed = $peopleSeeds[array_rand($peopleSeeds)];
            return "{$baseUrl}/seed/{$selectedSeed}/{$width}/{$height}";
        }

        // For other categories, use Lorem Picsum with random seeds
        return "{$baseUrl}/seed/{$seed}/{$width}/{$height}";
    }

    /**
     * Create a simple fallback image if download fails
     */
    private function createFallbackImage(string $filepath, array $config): void
    {
        $width = $config['width'];
        $height = $config['height'];
        $img = imagecreate($width, $height);

        // Create a simple gradient background
        $colors = [
            'tech' => [52, 152, 219],      // Blue
            'business' => [46, 125, 50],   // Green  
            'people' => [156, 39, 176]     // Purple
        ];

        $colorSet = $colors[$config['category']] ?? [128, 128, 128];
        $bgColor = imagecolorallocate($img, $colorSet[0], $colorSet[1], $colorSet[2]);
        $textColor = imagecolorallocate($img, 255, 255, 255);

        // Add category text
        $text = strtoupper($config['category']) . ' IMAGE';
        $font_size = 5;
        $text_width = imagefontwidth($font_size) * strlen($text);
        $text_x = ($width - $text_width) / 2;
        $text_y = ($height / 2) - 10;
        imagestring($img, $font_size, $text_x, $text_y, $text, $textColor);

        // Save the image
        imagejpeg($img, $filepath, 90);
        imagedestroy($img);

        $this->command->info("Created fallback image: " . basename($filepath));
    }
}
