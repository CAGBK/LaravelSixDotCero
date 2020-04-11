<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(RouletteTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(LinesTableSeeder::class);
        $this->call(ChallengeTableSeeder::class);
        Model::reguard();
    }
}
