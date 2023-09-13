<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\categories;
use App\Models\Job\Job;
class CategoriesController extends Controller
{
    //
    public function jobApply($name){
        $jobs= Job::where('category', $name)
        ->take(5)
        ->orderby('created_at', 'desc')
        ->get();
        return view('categories.single', compact('jobs','name'));
    }

    // public function jobApply($name){
    //     $jobs= job::where('category', $name)
    //     ->take(5)
    //     ->orderby('created_at', 'desc')
    //     ->get();

    //     return redirect()->back();
    // }
}
