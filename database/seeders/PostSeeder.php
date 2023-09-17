<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory()->count(1000000)->create();

        $batchSize = 10000;
        $totalData = 500000;
        $totalBatches = ceil($totalData / $batchSize);

        for ($i = 0; $i < $totalBatches; $i++) {
            Post::factory()->count($batchSize)->create();
        }
    }
}
