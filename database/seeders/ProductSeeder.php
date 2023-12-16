<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = [
            ['name' => 'React Native, Redux & Express - Full Stack React Native', 'image' => 'https://img-b.udemycdn.com/course/240x135/5136972_dbb6.jpg'],
            ['name' => 'React Native: Mobile App Development (CLI) [Created in 2023]', 'image' => 'https://img-b.udemycdn.com/course/240x135/5103912_ce44_3.jpg'],
            ['name' => 'React Native Complete Guide 2023: Zero to Mastery', 'image' => 'https://img-b.udemycdn.com/course/240x135/4924754_684d_6.jpg'],
            ['name' => 'The Complete 2023 Web Development Bootcamp', 'image' => 'https://img-b.udemycdn.com/course/240x135/1565838_e54e_18.jpg'],
            ['name' => 'PMP Certification Exam Prep Course 35 PDU Contact Hours/PDU', 'image' => 'https://img-b.udemycdn.com/course/240x135/1759114_873a_13.jpg'],
            ['name' => 'CompTIA A+ Core 1 (220-1101) Complete Course & Practice Exam', 'image' => 'https://img-b.udemycdn.com/course/240x135/4802926_c68f_5.jpg'],
            ['name' => '100 Days of Code: The Complete Python Pro Bootcamp for 2023', 'image' => 'https://img-b.udemycdn.com/course/240x135/2776760_f176_10.jpg'],
            ['name' => '[NEW] Ultimate AWS Certified Cloud Practitioner CLF-C02', 'image' => 'https://img-b.udemycdn.com/course/240x135/3142166_a637_3.jpg'],
            ['name' => 'CSS - The Complete Guide 2023 (incl. Flexbox, Grid & Sass)', 'image' => 'https://img-b.udemycdn.com/course/240x135/1561458_7f3b_2.jpg'],
            ['name' => 'Docker Mastery: with Kubernetes +Swarm from a Docker Captain', 'image' => 'https://img-b.udemycdn.com/course/240x135/1035000_c1aa_6.jpg'],
            ['name' => 'Learn JMETER from Scratch on Live Apps -Performance Testing', 'image' => 'https://img-b.udemycdn.com/course/240x135/380872_c6cc_5.jpg'],
            ['name' => 'SQL Server Essentials, from Scratch', 'image' => 'https://img-b.udemycdn.com/course/240x135/31592_2106_3.jpg'],
            ['name' => 'The Ultimate Excel Programmer Course', 'image' => 'https://img-b.udemycdn.com/course/240x135/164058_e914_2.jpg'],
            ['name' => 'Photoshop 2022 MasterClass', 'image' => 'https://img-b.udemycdn.com/course/240x135/850426_5596_4.jpg'],
        ];


        $products = Product::factory(14)->create();

        foreach($products as $key => $product) {
            
            $product->name = $course[$key]['name'];
            $product->image = $course[$key]['image'];
            $product->save();

        }
    }
}
