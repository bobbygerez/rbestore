<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $this->call(UsersTableSeeder::class);
     //    $this->call(CategoriesTableSeeder::class);
     //    $this->call(SubCategoriesTableSeeder::class);
     //    $this->call(FurtherCategoryTableSeeder::class);
     //    $this->call(UnitsTableSeeder::class);
     //    $this->call(ItemsTableSeeder::class);
     //    $this->call(ImagesTableSeeder::class);
     //    $this->call(QuantitiesTableSeeder::class);
     //    $this->call(ColorsTableSeeder::class);
        // $this->call(SizesTableSeeder::class);
        //     $this->call(CompaniesTableSeeder::class);
        //     $this->call(BrgyCompanyTableSeeder::class);
        // $this->call(BranchesTableSeeder::class);
        // $this->call(BranchItemTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
