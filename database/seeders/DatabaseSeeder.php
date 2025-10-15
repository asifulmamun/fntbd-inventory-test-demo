<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = [
            'create billable','edit billable','delete billable','export billable','import billable',
            'create consumable','edit consumable','delete consumable','export consumable','import consumable',
        ];
        foreach ($permissions as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);

        $adminRole->syncPermissions(Permission::all());
        $managerRole->syncPermissions(Permission::whereIn('name', [
            'create billable','edit billable','delete billable','export billable','import billable',
            'create consumable','edit consumable','delete consumable','export consumable','import consumable',
        ])->get());

        $user = User::firstOrCreate(
            ['email' => 'admin@local'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        $user->assignRole($adminRole);
    }
}
