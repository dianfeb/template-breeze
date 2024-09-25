<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         // Buat permissions terlebih dahulu
         $permissions = [
            'manage categories',
            'manage products',
            'manage article',
        ];

         // Simpan permissions pada tabel permission bawaan spatie
         foreach ($permissions as $permission) {
            // firstOrCreate -> jika permission sudah ada, tidak akan diduplikasi
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        // Buat roles dan permission yang sesuai
        $writerRole = Role::firstOrCreate([
            'name' => 'writer',
            
        ]);

        // Permission untuk role writer
        $writerPermission = [
            'manage article'
        ];

        // Sinkronkan permissions ke role client
        $writerRole->syncPermissions($writerPermission);



        // Buat role super admin dan usernya
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
            
        ]);

        $user = User::firstOrCreate([
            'email' => 'super@admin.com'
        ], [
            'name' => 'super admin',
            'password' => bcrypt('superadmin12345'),
        ]);

        // Kaitkan role super admin ke user
        $user->assignRole($superAdminRole);

    }
}
