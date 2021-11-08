<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
        
      
      
          User::create([
            'name' => 'sintya tri wahyu adityawati',
            'username'=>'sintya2704',
            'email' => 'sintya.tia2704@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(3)->create();

      //  User::create([
       //     'name' => 'Teguh Setyo Hermawan',
         //   'email' => 'TeguhBaik.com',
           // 'password' => bcrypt('123456789')

        //]);

        Category::create([
            'name' => 'MAD',
            'slug' => 'mad',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::create([
          'name' => 'Game',
          'slug' => 'game',
      ]);

       // Post::create([
        //    'title' => 'Judul Pertama',
         //   'slug' => 'judul',
           // 'excerpt'=>'bismillahh bisa jadi yang lebih baik',
          //  'body'=>'bismillahh bisa jadi yang lebih baik, bikan karena kita bisa tapi karena Allah yang memampukan',
          //  'category_id'=>1,
          //  'user_id'=>1
       // ]);

       // Post::create([
         //   'title' => 'Judul kedua',
           // 'slug' => 'judul-kedua',
           // 'excerpt'=>'bismillahh bisa jadi yang lebih baik',
            //'body'=>'bismillahh bisa jadi yang lebih baik, bikan karena kita bisa tapi karena Allah yang memampukan',
            //'category_id'=>1,
            //'user_id'=>1
        //]);

        //Post::create([
          //  'title' => 'Judul ketiga',
            //'slug' => 'judul-ketiga',
            //'excerpt'=>'bismillahh bisa jadi yang lebih baik',
            //'body'=>'bismillahh bisa jadi yang lebih baik, bikan karena kita bisa tapi karena Allah yang memampukan',
            //'category_id'=>2,
            //'user_id'=>1
        //]);

        //Post::create([
          //  'title' => 'Judul keempat',
            //'slug' => 'judul-keempat',
            //'excerpt'=>'bismillahh Teguh bisa jadi yang lebih baik',
            //'body'=>'bismillahh Teguh bisa jadi yang lebih baik, bikan karena kita bisa tapi karena Allah yang memampukan',
            //'category_id'=>2,
            //'user_id'=>2
      //  ]);
      Post::factory(20)->create();
    }
}
