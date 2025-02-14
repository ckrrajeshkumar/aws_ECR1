<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'admin@integrass.com'], [
            'first_name' => 'Admin',
            'last_name' => 'Integrass',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => 'Admin2@2!'
        ]);
        $user?->roles()->sync([1]);

        $user = User::updateOrCreate(['email' => 'manager@integrass.com'], [
            'first_name' => 'Manager',
            'last_name' => 'Integrass',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => 'Manager2@2!'
        ]);
        $user?->roles()->sync([2]);
    }
}
