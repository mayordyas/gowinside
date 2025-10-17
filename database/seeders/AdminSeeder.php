<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat admin default
        DB::table('users')->insert([
            'name' => 'Muhammad Admin',
            'username' => 'admin_gow',
            'email' => 'admin@smkn13bdg.sch.id',
            'phone' => '+62 812-3456-7890',
            'bio' => 'Administrator sistem GOW INSIDE yang berpengalaman dalam mengelola data siswa dan guru.',
            'role' => 'admin',
            'profile_photo' => null,
            'is_active' => true,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
