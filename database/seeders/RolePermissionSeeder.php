<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\saldo;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage user',
            'manage saldo',
            'manage riwayat penarikan',
            'manage pengiriman',
            'manage bantuan',
            'manage suplai',
            'manage penarikan'

        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $PendingCustomerRole = Role::firstOrCreate([
            'name' => 'pelanggan pending',
        ]);
        $PendingPermission = Permission::firstOrCreate([
            'name' => 'pending'
        ]);

        $PendingCustomerRole->givePermissionTo($PendingPermission);

        $approvedCustomerRole = Role::firstOrCreate([
            'name' => 'pelanggan'
        ]
        );

        $customerPermission = [
            'manage user',
            'manage suplai',
            'manage penarikan',
            'manage bantuan'
        ];

        $approvedCustomerRole->syncPermissions($customerPermission);

        $adminRole = Role::firstOrCreate(
        [
            'name' => 'admin',
           
        ]
        );

        $user = User::create([
            'name' => 'Irfan',
            'email' => 'gunawan1@gmail.com',
            'no_hp' =>'088901948831',
            'posisi' => 'admin',
            'username' => 'Irfan123',
            'password' => bcrypt('123123'),
            'gender' => 'laki - laki',
            'kota' => 'Tulungagung',
            'status' => 'terverifikasi',
            'avatar' => 'images/default-photo.png'
        ]);

        $user->assignRole($adminRole);

        $saldo = new saldo([
            'saldo' => 0,
        ]);

        $user->saldo()->save($saldo);
    }
}
