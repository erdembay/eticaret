<?php

namespace Database\Seeders\RolePermissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            //personel
            [
                'name' => 'personal.profile.view',
                'description' => 'Kullanıcı Profili Görüntüleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'personal.profile.edit',
                'description' => 'Kullanıcı Profili Güncelleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'personal.password.change',
                'description' => 'Kullanıcı Profili Silme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //order
            [
                'name' => 'order.create',
                'description' => 'Sipariş Oluşturma Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order.list',
                'description' => 'Sipariş Listeleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order.cancel',
                'description' => 'Sipariş İptali Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //user
            [
                'name' => 'user.create',
                'description' => 'Kullanıcı Oluşturma Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user.edit',
                'description' => 'Kullanıcı Güncelleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user.delete',
                'description' => 'Kullanıcı Silme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user.view',
                'description' => 'Kullanıcı Görüntüleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //category
            [
                'name' => 'category.create',
                'description' => 'Kategori Oluşturma Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'category.view',
                'description' => 'Kategori Görüntüleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'category.edit',
                'description' => 'Kategori Güncelleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'category.delete',
                'description' => 'Kategori Silme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //product
            [
                'name' => 'product.create',
                'description' => 'Ürün Oluşturma Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'product.view',
                'description' => 'Ürün Görüntüleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'product.edit',
                'description' => 'Ürün Güncelleme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'product.delete',
                'description' => 'Ürün Silme Yetkisi',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        DB::table('permissions')->insert($permissions);
    }
}
