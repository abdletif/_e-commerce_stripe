<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $refresh=$this->command->confirm("Do You want to refresh all migration ?");
        if ($refresh) {
            $this->command->call("migrate:refresh");
            $this->command->info("All migrations are refreshed");
        }
        $this->call([
            ProductsTableSeeder::class
        ]);
    }
}
