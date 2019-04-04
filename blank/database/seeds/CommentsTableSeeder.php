<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 2,
            'post_id'=> 1,
            'message' => 'test',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 2,
            'message' => 'test comment 2',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 3,
            'message' => 'test comment 3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('comments')->insert([
            'user_id'=> 1,
            'post_id'=> 1,
            'message' => 'test comment 1',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
