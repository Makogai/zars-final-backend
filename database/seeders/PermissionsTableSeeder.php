<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'place_access',
            ],
            [
                'id'    => 19,
                'title' => 'location_create',
            ],
            [
                'id'    => 20,
                'title' => 'location_edit',
            ],
            [
                'id'    => 21,
                'title' => 'location_show',
            ],
            [
                'id'    => 22,
                'title' => 'location_delete',
            ],
            [
                'id'    => 23,
                'title' => 'location_access',
            ],
            [
                'id'    => 24,
                'title' => 'category_create',
            ],
            [
                'id'    => 25,
                'title' => 'category_edit',
            ],
            [
                'id'    => 26,
                'title' => 'category_show',
            ],
            [
                'id'    => 27,
                'title' => 'category_delete',
            ],
            [
                'id'    => 28,
                'title' => 'category_access',
            ],
            [
                'id'    => 29,
                'title' => 'review_create',
            ],
            [
                'id'    => 30,
                'title' => 'review_edit',
            ],
            [
                'id'    => 31,
                'title' => 'review_show',
            ],
            [
                'id'    => 32,
                'title' => 'review_delete',
            ],
            [
                'id'    => 33,
                'title' => 'review_access',
            ],
            [
                'id'    => 34,
                'title' => 'blog_create',
            ],
            [
                'id'    => 35,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 36,
                'title' => 'blog_show',
            ],
            [
                'id'    => 37,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 38,
                'title' => 'blog_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
