<?php

namespace Database\Seeders;
use Database\Seeders\AdminSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\WorkspaceSeeder;
use Database\Seeders\InviteSeeder;
use Database\Seeders\TagSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\FeedbackSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\AttendSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\LessonSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            MemberSeeder::class,
            WorkspaceSeeder::class,
            TeamSeeder::class,
            InviteSeeder::class,
            TagSeeder::class,
            StatusSeeder::class,
           ProjectSeeder::class,
           TaskSeeder::class,
            FeedbackSeeder::class,
            EventSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            AttendSeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
        ]);
    }
}
