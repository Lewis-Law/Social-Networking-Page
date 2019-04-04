<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'Hi',
            'message' => 'How are you? with comments',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 2
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'ABC',
            'message' => '123456',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 3
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john private',
            'message' => 'john private post',
            'privacy' => 'private',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 4
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john friend',
            'message' => 'john friend post',
            'privacy' => 'friends',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 5
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john friend 2',
            'message' => 'john friend post 2 ',
            'privacy' => 'friends',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 6
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john private 2',
            'message' => 'john private post 2',
            'privacy' => 'private',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 7
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john public',
            'message' => 'john public post',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 8
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john public 2',
            'message' => 'john public post 2',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 9
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john public 3',
            'message' => 'john public post 3',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 10
        DB::table('posts')->insert([
            'post_user_id'=> 1,
            'title' => 'john public 4',
            'message' => 'john public post 4',
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'post_user_id'=> 2,
            'title' => "Bob's Post 1",
            'message' => "Bob's public post",
            'privacy' => 'public',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'post_user_id'=> 2,
            'title' => "Bob's Post 2",
            'message' => "Bob's friends post",
            'privacy' => 'friends',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('posts')->insert([
            'post_user_id'=> 2,
            'title' => "Bob's Post 3",
            'message' => "Bob's private post",
            'privacy' => 'private',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
