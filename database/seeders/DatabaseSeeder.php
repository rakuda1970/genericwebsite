<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\ProductCategoryAssignmentSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductBrandAssignmentSeeder;
use Database\Seeders\CollectionSeeder;
use Database\Seeders\ProductCollectionAssignmentSeeder;
use Database\Seeders\ProductMetaSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ProductSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductCategoryAssignmentSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductBrandAssignmentSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(ProductCollectionAssignmentSeeder::class);
        $this->call(ProductMetaSeeder::class);
    }
}
