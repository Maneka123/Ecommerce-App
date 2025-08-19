<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Category::create(['name'=>'laptop','slug'=>'laptop','description'=>'laptop category','image'=>'files/photo1.jpg']);
       Category::create(['name'=>'mobile phone','slug'=>'mobile-phone','description'=>'mobile phone category','image'=>'files/photo1.jpg']);
       Category::create(['name'=>'books','slug'=>'books','description'=>'bookx category','image'=>'files/photo1.jpg']);

       Subcategory::create(['name'=>'dell','category_id'=>'1']);
       Subcategory::create(['name'=>'lenovo','category_id'=>'1']);
       Subcategory::create(['name'=>'hp','category_id'=>'1']);

       Product::create(['name'=>'HP Laptops Austrailia','image'=>'product/photo1.jpg','price'=>rand(700,1000),'description'=>'This is the description of a product','additional_info'=>'this is  additional info','category_id'=>1,'subcategory_id'=>1]);
       Product::create(['name'=>'DELL Laptops Austrailia','image'=>'product/photo1.jpg','price'=>rand(800,1000),'description'=>'This is the description of a product','additional_info'=>'this is  additional info','category_id'=>1,'subcategory_id'=>1]);
       Product::create(['name'=>'HP laptops','image'=>'product/photo1.jpg','price'=>rand(700,1000),'description'=>'This is the description of a product','additional_info'=>'this is  additional info','category_id'=>1,'subcategory_id'=>1]);

       User::create([
    'name' => 'LaraAdmin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('password'),
    'email_verified_at' => now(),
    'address' => 'Australia',
    'phone_number' => '0576232321',
    'is_admin' => 1
]);

    }
}
