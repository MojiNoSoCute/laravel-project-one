<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ManageImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:manage {action=list : Action to perform (list|create|clean)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage sample images for the application (list, create, or clean)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');
        $uploadDir = public_path('uploads');

        switch ($action) {
            case 'list':
                $this->listImages($uploadDir);
                break;
            case 'create':
                $this->createSampleImages($uploadDir);
                break;
            case 'clean':
                $this->cleanSampleImages($uploadDir);
                break;
            default:
                $this->error("Unknown action: {$action}");
                $this->info('Available actions: list, create, clean');
                return 1;
        }

        return 0;
    }

    private function listImages(string $uploadDir): void
    {
        if (!File::exists($uploadDir)) {
            $this->error('Uploads directory does not exist.');
            return;
        }

        $files = File::files($uploadDir);
        $sampleImages = array_filter($files, fn($file) => str_starts_with($file->getFilename(), 'sample_'));
        $userImages = array_filter($files, fn($file) => !str_starts_with($file->getFilename(), 'sample_'));

        $this->info('📁 Images in uploads directory:');
        $this->newLine();

        if (count($sampleImages) > 0) {
            $this->info('🎨 Sample Images (' . count($sampleImages) . '):');
            foreach ($sampleImages as $file) {
                $size = $this->formatBytes($file->getSize());
                $this->line("  • {$file->getFilename()} ({$size})");
            }
            $this->newLine();
        }

        if (count($userImages) > 0) {
            $this->info('📸 User Uploaded Images (' . count($userImages) . '):');
            foreach (array_slice($userImages, 0, 10) as $file) {
                $size = $this->formatBytes($file->getSize());
                $this->line("  • {$file->getFilename()} ({$size})");
            }
            if (count($userImages) > 10) {
                $this->line('  ... and ' . (count($userImages) - 10) . ' more');
            }
        }

        $totalSize = array_sum(array_map(fn($file) => $file->getSize(), $files));
        $this->newLine();
        $this->info('📊 Total: ' . count($files) . ' files, ' . $this->formatBytes($totalSize));
    }

    private function createSampleImages(string $uploadDir): void
    {
        $this->info('🎨 Creating enhanced sample images...');

        // Run the image seeder
        $this->call('db:seed', ['--class' => 'ImageSeeder']);

        $this->info('✅ Sample images created successfully!');
    }

    private function cleanSampleImages(string $uploadDir): void
    {
        if (!File::exists($uploadDir)) {
            $this->error('Uploads directory does not exist.');
            return;
        }

        $files = File::files($uploadDir);
        $sampleImages = array_filter($files, fn($file) => str_starts_with($file->getFilename(), 'sample_'));

        if (empty($sampleImages)) {
            $this->info('No sample images found to clean.');
            return;
        }

        if (!$this->confirm('Delete ' . count($sampleImages) . ' sample images?')) {
            $this->info('Operation cancelled.');
            return;
        }

        foreach ($sampleImages as $file) {
            File::delete($file->getPathname());
            $this->line("Deleted: {$file->getFilename()}");
        }

        $this->info('🗑️ Cleaned ' . count($sampleImages) . ' sample images.');
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 1) . 'MB';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 1) . 'KB';
        }
        return $bytes . 'B';
    }
}
