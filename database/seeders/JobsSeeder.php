<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            'Web Developer',
            'Mobile App Developer',
            'Database Administrator',
            'Network Administrator',
            'System Administrator',
            'Software Engineer',
            'UI/UX Designer',
            'Data Scientist',
            'Machine Learning Engineer',
            'Digital Marketing Specialist',
            'Content Writer',
            'Graphic Designer',
            'Project Manager',
            'Business Analyst',
            'Financial Analyst',
            'Customer Service Representative',
            'Sales Representative',
            'Human Resources Specialist',
            'Operations Manager',
            'Quality Assurance Analyst',
        ];

        foreach ($jobs as $jobName) {
            Jobs::create(['name' => $jobName]);
        }
    }
}
