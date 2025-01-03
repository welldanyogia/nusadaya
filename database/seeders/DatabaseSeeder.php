<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        User::create([
//            'name' => 'Super Admin',
//            'username' => 'SuperAdmin',
//            'email' => 'superadmin@superadmin.com',
//            'password' => bcrypt('12341234'), // Jangan lupa untuk mengganti password ini
//            'role' => 'superadmin',
//        ]);

        // Seed admin
//        User::create([
//            'name' => 'Admin',
//            'username' => 'Admin',
//            'email' => 'admin@admin.com',
//            'password' => bcrypt('12341234'), // Jangan lupa untuk mengganti password ini
//            'role' => 'admin',
//        ]);
        User::create([
            'name' => 'admin001',
            'username' => 'admin001',
            'email' => 'admin001@admin.com',
            'password' => bcrypt('5$|49(<=9</o'), // Jangan lupa untuk mengganti password ini
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'admin002',
            'username' => 'admin002',
            'email' => 'admin002@admin.com',
            'password' => bcrypt('x65s/i"3;T~c'), // Jangan lupa untuk mengganti password ini
            'role' => 'admin',
        ]);
//        User::create([
//            'name' => 'admin003',
//            'username' => 'admin003',
//            'email' => 'admin003@admin.com',
//            'password' => bcrypt(`'Az3vIwM{:pY'`),
//            'role' => 'admin',
//        ]);
        User::create([
            'name' => 'admin004',
            'username' => 'admin004',
            'email' => 'admin004@admin.com',
            'password' => bcrypt('GP<knQ0[&edq'), // Jangan lupa untuk mengganti password ini
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'admin005',
            'username' => 'admin005',
            'email' => 'admin005@admin.com',
            'password' => bcrypt('Ufr?V&\pczxF'), // Jangan lupa untuk mengganti password ini
            'role' => 'admin',
        ]);

//        $this->call(ProjectSeeder::class);
    }
}
