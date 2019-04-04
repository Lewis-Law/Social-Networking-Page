<?php

use Illuminate\Database\Seeder;

class FriendshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendships')->insert([
            'auth_user_id'=> 1,
            'other_user_id'=> 2,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 2,
            'other_user_id'=> 1,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 5,
            'other_user_id'=> 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 4,
            'other_user_id'=> 5,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 4,
            'other_user_id'=> 6,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 6,
            'other_user_id'=> 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 4,
            'other_user_id'=> 7,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('friendships')->insert([
            'auth_user_id'=> 7,
            'other_user_id'=> 4,
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
