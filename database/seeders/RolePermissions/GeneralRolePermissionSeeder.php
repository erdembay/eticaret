<?php

namespace Database\Seeders\RolePermissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class GeneralRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
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
        // DB::table('permissions')->insert($permissions);
        Permission::insert($permissions);

        $superAdmin = Role::create([
            'name' => 'super-admin'
        ]);
        $member = Role::create([
            'name' => 'member',
        ]);
        $categoryManager = Role::create([
            'name' => 'category-manager',
        ]);
        $orderManager = Role::create([
            'name' => 'order-manager',
        ]);
        $userManager = Role::create([
            'name' => 'user-manager',
        ]);
        $productManager = Role::create([
            'name' => 'product-manager',
        ]);

        $categoryManagerPermissions = Permission::query()
            ->where('name', 'LIKE', 'category.%')
            ->orWhere('name', 'LIKE', 'personal.%')
            ->get();
        $categoryManager->givePermissionTo($categoryManagerPermissions);

        $orderManagerPermissions = Permission::query()
            ->where('name', 'LIKE', 'order.%')
            ->orWhere('name', 'LIKE', 'personal.%')
            ->get();
        $orderManager->givePermissionTo($orderManagerPermissions);

        $userManagerPermissions = Permission::query()
            ->where('name', 'LIKE', 'user.%')
            ->orWhere('name', 'LIKE', 'personal.%')
            ->get();
        $userManager->givePermissionTo($userManagerPermissions);

        $productManagerPermissions = Permission::query()
            ->where('name', 'LIKE', 'product.%')
            ->orWhere('name', 'LIKE', 'personal.%')
            ->get();
        $productManager->givePermissionTo($productManagerPermissions);

        $memberPermissions = Permission::query()
            ->where('name', 'LIKE', 'personal.%')
            ->get();
        $member->givePermissionTo($memberPermissions);

        $superAdminPermissions = Permission::all();
        $superAdmin->givePermissionTo($superAdminPermissions);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
