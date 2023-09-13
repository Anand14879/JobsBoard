<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job\job;
use App\Models\Job\Search;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // The BELOW code is requiring authentication for us to access the index page
     // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user_id=null)
    {

        $duplicates = DB::table('searches')
        ->select('keyword', DB::raw('COUNT(*) as "count" '))
        ->groupBy('keyword')
        ->havingRaw('COUNT(*) > 1')
        ->take(3)
        ->orderBy('count', 'asc')
        ->get();




        $jobs = job::select() -> take(5) -> orderby('id','desc') -> get();
        $totalJobs = job::all()->count();
        if($user_id){
            $user = User::findOrFail($user_id);
            $username = $user->name;
        }else{
            $username = null;
        }

        $data = [
            'jobs' =>$jobs,
            'totalJobs' =>$totalJobs,
            'duplicates' =>$duplicates,
            'username' =>$username,
        ];
        return view('home',$data);
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
