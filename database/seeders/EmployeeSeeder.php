<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employees = [
            ['employee_id' => 'EMP001', 'name' => 'John Doe', 'position' => 'Manager', 'department' => 'Sales', 'basic_salary' => 50000],
            ['employee_id' => 'EMP002', 'name' => 'Jane Smith', 'position' => 'Developer', 'department' => 'IT', 'basic_salary' => 60000],
            ['employee_id' => 'EMP003', 'name' => 'Alice Johnson', 'position' => 'HR Manager', 'department' => 'Human Resources', 'basic_salary' => 55000],
            ['employee_id' => 'EMP004', 'name' => 'Robert Brown', 'position' => 'Sales Executive', 'department' => 'Sales', 'basic_salary' => 48000],
            ['employee_id' => 'EMP005', 'name' => 'Michael Lee', 'position' => 'Accountant', 'department' => 'Finance', 'basic_salary' => 58000],
            ['employee_id' => 'EMP006', 'name' => 'Emily Wilson', 'position' => 'Marketing Specialist', 'department' => 'Marketing', 'basic_salary' => 52000],
            ['employee_id' => 'EMP007', 'name' => 'David Wilson', 'position' => 'Customer Service Representative', 'department' => 'Customer Service', 'basic_salary' => 45000],
            ['employee_id' => 'EMP008', 'name' => 'Mary Brown', 'position' => 'Project Manager', 'department' => 'Project Management', 'basic_salary' => 65000],
            ['employee_id' => 'EMP009', 'name' => 'Richard Taylor', 'position' => 'Quality Assurance Analyst', 'department' => 'QA', 'basic_salary' => 57000],
            ['employee_id' => 'EMP010', 'name' => 'Jennifer Clark', 'position' => 'Operations Manager', 'department' => 'Operations', 'basic_salary' => 62000],
            ['employee_id' => 'EMP011', 'name' => 'Daniel Martinez', 'position' => 'Systems Administrator', 'department' => 'IT', 'basic_salary' => 59000],
            ['employee_id' => 'EMP012', 'name' => 'Susan Rodriguez', 'position' => 'Graphic Designer', 'department' => 'Design', 'basic_salary' => 53000],
            ['employee_id' => 'EMP013', 'name' => 'James Anderson', 'position' => 'Legal Counsel', 'department' => 'Legal', 'basic_salary' => 68000],
            ['employee_id' => 'EMP014', 'name' => 'Patricia Hall', 'position' => 'Executive Assistant', 'department' => 'Administration', 'basic_salary' => 51000],
            ['employee_id' => 'EMP015', 'name' => 'Christopher White', 'position' => 'Sales Manager', 'department' => 'Sales', 'basic_salary' => 70000],
            ['employee_id' => 'EMP016', 'name' => 'Jessica Martinez', 'position' => 'Marketing Manager', 'department' => 'Marketing', 'basic_salary' => 68000],
            ['employee_id' => 'EMP017', 'name' => 'Brian Harris', 'position' => 'Financial Analyst', 'department' => 'Finance', 'basic_salary' => 61000],
            ['employee_id' => 'EMP018', 'name' => 'Kimberly King', 'position' => 'Training Coordinator', 'department' => 'Training', 'basic_salary' => 54000],
            ['employee_id' => 'EMP019', 'name' => 'Matthew Young', 'position' => 'Network Engineer', 'department' => 'IT', 'basic_salary' => 60000],
            ['employee_id' => 'EMP020', 'name' => 'Amanda Scott', 'position' => 'Event Coordinator', 'department' => 'Events', 'basic_salary' => 52000],
            ['employee_id' => 'EMP021', 'name' => 'John Miller', 'position' => 'Warehouse Supervisor', 'department' => 'Logistics', 'basic_salary' => 48000],
            ['employee_id' => 'EMP022', 'name' => 'Melissa Turner', 'position' => 'Recruiter', 'department' => 'HR', 'basic_salary' => 55000],
            ['employee_id' => 'EMP023', 'name' => 'Steven Edwards', 'position' => 'Technical Writer', 'department' => 'Documentation', 'basic_salary' => 56000],
            ['employee_id' => 'EMP024', 'name' => 'Laura Martinez', 'position' => 'Public Relations Specialist', 'department' => 'PR', 'basic_salary' => 57000],
            ['employee_id' => 'EMP025', 'name' => 'Eric Carter', 'position' => 'Customer Success Manager', 'department' => 'Customer Success', 'basic_salary' => 63000],
            ['employee_id' => 'EMP026', 'name' => 'Nancy Hill', 'position' => 'Data Analyst', 'department' => 'Data', 'basic_salary' => 59000],
            ['employee_id' => 'EMP027', 'name' => 'Joshua King', 'position' => 'Facilities Manager', 'department' => 'Facilities', 'basic_salary' => 60000],
        ];
        
        foreach ($employees as $employeeData) {
            Employee::create($employeeData);
        }
    }
}
