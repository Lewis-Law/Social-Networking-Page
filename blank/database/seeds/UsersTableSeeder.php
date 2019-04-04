<?php

use Illuminate\Database\Seeder;

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
            'name' => "John",
            'email' => 'John@a.org',
            'password' => bcrypt('1234'),
            'birthday' => '1994-01-30',
            'image'=>'posts_images/john.png'
        ]);
        DB::table('users')->insert([
            'name' => "Bob",
            'email' => 'Bob@a.org',
            'password' => bcrypt('1234'),
            'birthday' => '1992-01-30',
            'image'=>'posts_images/bob.png'
        ]);
        DB::table('users')->insert([
            'name' => "Tom",
            'email' => 'Tom@a.org',
            'password' => bcrypt('1234'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Fred",
            'email' => 'Fred@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1989-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Eric",
            'email' => 'Eric@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Sarah",
            'email' => 'Sarah@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Lily",
            'email' => 'Lily@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Maddy",
            'email' => 'Maddy@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Wendy",
            'email' => 'Wendy@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
        DB::table('users')->insert([
            'name' => "Alice",
            'email' => 'Alice@gmail.com',
            'password' => bcrypt('123456'),
            'birthday' => '1990-01-30',
            'image'=>'posts_images/default.png'
        ]);
    }
}
