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
      DB::table('posts')->insert([
        [
          'user_id'=>'1',
          'text' => 'タイトル1'
          
        ],
        [
          'user_id'=>'1',
          'text' => 'タイトル2'
          
        ],
        [
          'user_id'=>'2',
          'text' => 'タイトル3'
          
        ],
      ]);
      $this->call(PostsTableSeeder::class);

      
    }
}
