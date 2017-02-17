<?php

use Illuminate\Database\Seeder;
use App\Social;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SocialsTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'brent.jlinville@gmail.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
      ]);
    }
}

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->delete();

        $socials = [
            ['title' => 'facebook'],
            ['title' => 'twitter'],
            ['title' => 'instagram'],
            ['title' => 'googleplus'],
            ['title' => 'linkedin']
        ];

        foreach($socials as $social){
            Social::create($social);
        }
    }
}
