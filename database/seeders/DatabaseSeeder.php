<?php
# @Date:   2020-11-02T15:35:08+00:00
# @Last modified time: 2020-12-14T18:14:39+00:00




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
        $this->call(RoleSeeder::class);
        $this->call(InsuranceCompanySeeder::class);
        $this->call(UserSeeder::class);
    }
}
