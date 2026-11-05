<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * البيانات منظمة بمصفوفة واحدة — سهل تضيف/تعدّل موظف من هنا فقط
     */
    protected array $staff = [
        ['name' => 'System Admin',     'email' => 'admin@mawidi.local',       'employee_id' => 'EMP-1001', 'role' => 'admin',        'password' => 'Admin@2026'],
        ['name' => 'Hospital Manager', 'email' => 'manager@mawidi.local',     'employee_id' => 'EMP-2001', 'role' => 'manager',      'password' => 'Manager@2026'],
        ['name' => 'Dr. Sara Ahmed',   'email' => 'doctor@mawidi.local',      'employee_id' => 'EMP-3001', 'role' => 'doctor',       'password' => 'Doctor@2026'],
        ['name' => 'Front Desk',       'email' => 'receptionist@mawidi.local','employee_id' => 'EMP-4001', 'role' => 'receptionist', 'password' => 'Reception@2026'],
    ];

    public function run(): void
    {
        foreach ($this->staff as $member) {
            User::updateOrCreate(
                ['employee_id' => $member['employee_id']], // يبحث بهذا العمود
                [
                    'name'     => $member['name'],
                    'email'    => $member['email'],
                    'role'     => $member['role'],
                    'password' => bcrypt($member['password']),
                ]
            );
        }

        $this->command->info('✅ تم تخزين ' . count($this->staff) . ' حسابات موظفين بنجاح.');
    }
}