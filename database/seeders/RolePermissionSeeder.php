<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-absensi']);
        Permission::create(['name' => 'edit-absensi']);
        Permission::create(['name' => 'hapus-absensi']);
        Permission::create(['name' => 'lihat-absensi']);
        Permission::create(['name' => 'buka-absensi']);
        Permission::create(['name' => 'cetak-absensi']);

        Permission::create(['name' => 'tambah-suratizin']);
        Permission::create(['name' => 'edit-suratizin']);
        Permission::create(['name' => 'hapus-suratizin']);
        Permission::create(['name' => 'lihat-suratizin']);
        Permission::create(['name' => 'cetak-suratizin']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'murid']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'gurupiket']);
        Role::create(['name' => 'tu']);
        Role::create(['name' => 'kepsek']);
        Role::create(['name' => 'kurikulum']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->assignPermissions(Permission::all());

        $roleMurid = Role::findByName('murid');
        $roleMurid->givePermissionTo('tambah-absensi');
        $roleMurid->givePermissionTo('lihat-absensi');

        $roleGuru = Role::findByName('guru');
        $roleGuru->givePermissionTo('tambah-absensi');
        $roleGuru->givePermissionTo('lihat-absensi');
        $roleGuru->givePermissionTo('buka-absensi');

        $roleGuruPiket = Role::findByName('gurupiket');
        $roleGuruPiket->assignPermissions(Permission::all());

        $roleTU = Role::findByName('tu');
        $roleTU->assignPermissions(Permission::all());

        $roleKepsek = Role::findByName('kepsek');
        $roleKepsek->givePermissionTo('lihat-absensi');
        $roleKepsek->givePermissionTo('cetak-absensi');
        $roleKepsek->givePermissionTo('lihat-suratizin');
        $roleKepsek->givePermissionTo('cetak-suratizin');

        $roleKurikulum = Role::findByName('kurikulum');
        $roleKurikulum->givePermissionTo('lihat-absensi');
        $roleKurikulum->givePermissionTo('cetak-absensi');
        $roleKurikulum->givePermissionTo('lihat-suratizin');
        $roleKurikulum->givePermissionTo('cetak-suratizin');


    }
}
