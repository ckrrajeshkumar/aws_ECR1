<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::all()->first();
        Membership::updateOrCreate(
            ['name' => 'Athlete'],
            [
                'member_type_id' => 1,
                'price' => 50,
                'status' => 1,
                'tenant_id' => Arr::get($tenant, 'id')
            ]
        );
        Membership::updateOrCreate(
            ['name' => 'Coach'],
            [
                'member_type_id' => 1,
                'price' => 50,
                'status' => 1,
                'tenant_id' => Arr::get($tenant, 'id')
            ]
        );
    }
}
