<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FixAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua user admin yang ada
        DB::table('users')->where('role', 'admin')->delete();
        
        // Buat admin1 dengan password yang benar
        DB::table('users')->insert([
            'name' => 'Admin System',
            'username' => 'admin1',
            'email' => 'admin1@smkn13bdg.sch.id',
            'phone' => '+62 812-3456-7890',
            'bio' => 'Administrator sistem GOW INSIDE',
            'role' => 'admin',
            'profile_photo' => null,
            'is_active' => true,
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        echo "Admin1 berhasil dibuat dengan password: 123456\n";
    }
}
