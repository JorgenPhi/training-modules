<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create admin user
        factory(ModuleBasedTraining\User::class)->create(['email' => 'admin@localhost.net', 'admin' => 1, 'active' => 1]);
        // Create unactivated user
        //factory(ModuleBasedTraining\User::class)->create(['email' => 'unactivated@localhost.net']);
        // Create 10 activated users
        //factory(ModuleBasedTraining\User::class,10)->create(['active' => 1]);
        // Create 10 Moudles
    	//factory(ModuleBasedTraining\Module::class,10)->create();
        // Create 100 questions randomly
    	//factory(ModuleBasedTraining\Question::class,100)->create();
    }
}
