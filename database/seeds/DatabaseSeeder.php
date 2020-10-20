<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('departments')->truncate();
        DB::table('cities')->truncate();
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(DepartmentSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

    }
}
