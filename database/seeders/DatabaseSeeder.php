<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Jobs insertion below
        // DB::table('jobs')->insert([
        //     ['id' =>2,'job_title' => 'Project Manager','job_region' => 'New Jersey', 'company' => 'Amazon','job_type'=> "Full Time",'vacancy'=>'25','experience'=>'4 years or more','salary'=>'60000','gender'=>'Any','application_deadline'=>"August 20, 2023",'job_description'=>'Anything you can imagine, we want you to do','responsibilities'=>'Not too many responsibiities','education_experience'=>'4 years of education needed','other_benefits'=>'Health Benefits','image'=>'hero_2.jpg','category'=> "Programming",'created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        //     ['id' =>3,'job_title' => 'Project Manager','job_region' => 'New Jersey', 'company' => 'Amazon','job_type'=> "Full Time",'vacancy'=>'25','experience'=>'4 years or more','salary'=>'60000','gender'=>'Any','application_deadline'=>"August 20, 2023",'job_description'=>'Anything you can imagine, we want you to do','responsibilities'=>'Not too many responsibiities','education_experience'=>'4 years of education needed','other_benefits'=>'Health Benefits','image'=>'hero_2.jpg','category'=> "Programming",'created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        //     ['id' =>1,'job_title' => 'Project Manager','job_region' => 'New Jersey', 'company' => 'Amazon','job_type'=> "Full Time",'vacancy'=>'25','experience'=>'4 years or more','salary'=>'60000','gender'=>'Any','application_deadline'=>"August 20, 2023",'job_description'=>'Anything you can imagine, we want you to do','responsibilities'=>'Not too many responsibiities','education_experience'=>'4 years of education needed','other_benefits'=>'Health Benefits','image'=>'hero_2.jpg','category'=> "Programming",'created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        //     ['id' =>4,'job_title' => 'Project Manager','job_region' => 'New Jersey', 'company' => 'Amazon','job_type'=> "Full Time",'vacancy'=>'25','experience'=>'4 years or more','salary'=>'60000','gender'=>'Any','application_deadline'=>"August 20, 2023",'job_description'=>'Anything you can imagine, we want you to do','responsibilities'=>'Not too many responsibiities','education_experience'=>'4 years of education needed','other_benefits'=>'Health Benefits','image'=>'hero_2.jpg','category'=> "Programming",'created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],

        // ]); 

        //categories insertion below
        // DB::table('categories')->insert([
        //     // ['id' =>1,'name' => 'Anurag Anand','created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        //     // ['id' =>2,'name' => 'Abhishek Anand','created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        //     ['id' =>3,'name' => 'Nepali Sah','created_at'=>Carbon::now()->toDateTimeString(),'updated_at'=>Carbon::now()->toDateTimeString()],
        
        // ]); 


        // DB::table('jobsaved')->insert([
        //     ['id'=>]
        // ]);

    }
}




