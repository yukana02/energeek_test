<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
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

        foreach ($skills as $skillName) {
            Skills::create(['name' => $skillName]);
        }
    }
}
