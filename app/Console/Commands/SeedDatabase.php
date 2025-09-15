<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeedDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fresh-seed {--force : Force the operation without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all tables, re-run migrations, and seed the database with sample data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->option('force')) {
            if (!$this->confirm('This will delete all existing data. Do you want to continue?')) {
                $this->info('Operation cancelled.');
                return 0;
            }
        }

        $this->info('🔄 Refreshing database...');
        
        // Fresh migration
        $this->call('migrate:fresh');
        
        $this->info('🌱 Seeding database with sample data...');
        
        // Run seeders
        $this->call('db:seed');
        
        $this->info('✅ Database refreshed and seeded successfully!');
        $this->newLine();
        $this->info('📊 Sample data includes:');
        $this->info('   • Course overview posts');
        $this->info('   • Activity announcements');
        $this->info('   • Teacher profiles');
        $this->info('   • Student project showcases');
        $this->info('   • Alumni success stories');
        $this->info('   • Admin and test users');
        
        return 0;
    }
}
