<?php

namespace Database\Seeders;

use App\Models\MemberType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = ['Individual', 'Team'];
        foreach ($list as $item) {
            MemberType::updateOrCreate(['name' => $item]);
        }
    }
}
