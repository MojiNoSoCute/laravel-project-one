# Database Seeders Documentation

## Overview
This Laravel project includes comprehensive database seeders to populate the application with sample data for testing and development purposes.

## Available Seeders

### 1. DatabaseSeeder (Main Seeder)
- **Location**: `database/seeders/DatabaseSeeder.php`
- **Purpose**: Orchestrates all other seeders
- **Command**: `php artisan db:seed`

### 2. PostSeeder
- **Location**: `database/seeders/PostSeeder.php`
- **Purpose**: Creates sample posts across all 5 categories
- **Command**: `php artisan db:seed --class=PostSeeder`
- **Data Created**: 14 sample posts with images

#### Post Categories:
1. **Course Overview** (ภาพรวมหลักสูตร) - 2 posts
2. **Interesting Activities** (กิจกรรมที่น่าสนใจ) - 3 posts
3. **Teachers** (อาจารย์ผู้สอน) - 3 posts
4. **Student Works** (ผลงานนักศึกษา) - 3 posts
5. **Outstanding Alumni** (ศิษย์เก่าเด่น) - 3 posts

### 3. ImageSeeder
- **Location**: `database/seeders/ImageSeeder.php`
- **Purpose**: Creates professional sample images for posts
- **Command**: `php artisan db:seed --class=ImageSeeder`
- **Data Created**: 14 enhanced sample images with custom styling

### 4. UserSeeder
- **Location**: `database/seeders/UserSeeder.php`
- **Purpose**: Creates admin and test users
- **Command**: `php artisan db:seed --class=UserSeeder`
- **Data Created**: 
  - 1 admin user (admin@se.npru.ac.th / password123)
  - 5 test users

## Quick Commands

### Fresh Database with Sample Data
```bash
php artisan db:fresh-seed --force
```
This command will:
- Drop all existing tables
- Re-run all migrations
- Seed the database with sample data
- No confirmation required with `--force` flag

### Seed Only (without dropping tables)
```bash
php artisan db:seed
```

### Run Individual Seeders
```bash
php artisan db:seed --class=PostSeeder
php artisan db:seed --class=UserSeeder
```

## Image Management Commands

### List All Images
```bash
php artisan images:manage list
```
Shows all images in uploads directory with file sizes

### Create Sample Images
```bash
php artisan images:manage create
```
Creates all missing sample images with professional styling

### Clean Sample Images
```bash
php artisan images:manage clean
```
Removes all sample images (keeps user uploads)

## Sample Images
The seeder automatically creates enhanced sample images with professional styling:
- **High Quality**: 600x400 pixels with 90% JPEG quality
- **Custom Colors**: Each category has unique color scheme
- **Text Labels**: Clear text indicating content type
- **Gradient Effects**: Professional visual enhancement
- **Border Design**: Clean border styling
- **Category-Specific**: Images match their content category

### Image Categories:
- **Course Overview**: Blue theme with "SOFTWARE ENGINEERING" text
- **Activities**: Purple/Orange themes with event names
- **Teachers**: Professional grey/brown themes with names
- **Student Works**: Colorful themes with project types
- **Alumni**: Bright themes with names and companies

## Admin Access
After seeding, you can log in with:
- **Email**: admin@se.npru.ac.th
- **Password**: password123

## Development Notes
- All sample content is in both Thai and English
- Images are automatically generated placeholders
- Posts include realistic content for a Software Engineering program
- Seeders can be run multiple times safely (will create duplicates)
- Use `migrate:fresh` before seeding to avoid duplicates

## Customization
To modify the sample data:
1. Edit `database/seeders/PostSeeder.php` for post content
2. Edit `database/seeders/UserSeeder.php` for user accounts
3. Add new seeders using `php artisan make:seeder YourSeederName`
4. Register new seeders in `DatabaseSeeder.php`