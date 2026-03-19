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
use Database\Seeders\ChoosingCommunityProductSeeder;
use Database\Seeders\ChoosingCommunityMetaSeeder;
use Database\Seeders\SustainableSolutionsProductSeeder;
use Database\Seeders\SustainableSolutionsMetaSeeder;
use Database\Seeders\ProductImageUrlSeeder;

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
        $this->call(ChoosingCommunityProductSeeder::class);
        $this->call(ChoosingCommunityMetaSeeder::class);
        $this->call(SustainableSolutionsProductSeeder::class);
        $this->call(SustainableSolutionsMetaSeeder::class);
        $this->call(ProductImageUrlSeeder::class);
    }
}
