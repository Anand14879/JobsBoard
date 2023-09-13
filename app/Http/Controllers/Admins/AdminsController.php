<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Job\Job;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Categories\categories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminsController extends Controller
{
    //
    use AuthenticatesUsers;


    // protected $redirectTo = '/admin';

    public function viewLogin(){
        if(Auth::user()){
            return redirect()->route('admins.dashboard');
        }else{
            return view("admins.view-login");
        }
    }

    public function checkLogin(Request $request)
{
    // dd("st");
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);

    $user= User::where('email',$request->email)->first();
    if($user){
        if(Hash::check($request->password , $user->password)){

            if($user->user_type == "Admin"){
                // dd("hello");
                    route('admins.dashboard');
            }
            else{
                // dd("hi");
               return redirect ('/home');
            }
        }
    }
    // dd($request->all(),$user);
   
  

    // Attempt to authenticate the user using the "admins" guard.
    if ($this->attemptLogin($request)) {

        return redirect()->route('admins.dashboard');
    }

    return redirect()->back()->with(['error' => 'Error logging in']);
}

    public function adminIndex(){

        $user = Auth::user();
        $jobs = Job::select()->count();
        $categories = categories::select()->count();
        $admins = User::where('user_type', 'Admin')->count();
        $applications = Application::select()->count();
        if ($user && $user->user_type === 'Admin') {
            return view("admins.index",  compact('jobs', 'categories', 'admins', 'applications'));
        } else {
            return redirect()->route('view.login'); // Adjust the route name accordingly
        }
        // return view("admins.index");
    }

    public function index(){
        $jobs = Job::select()->count();
        $categories = categories::select()->count();
        $admins = User::where('user_type', 'Admin')->count();
        $applications = Application::select()->count();
        return view("admins.index", compact('jobs', 'categories', 'admins', 'applications'));
    }



    public function admins(){
        $admins =  User::where('user_type', 'Admin')->get();
        // dd($admins);
        return view("admins.all-admins", compact('admins'));
    }

    public function createAdmins(){
        return view("admins.create-admins");
    }

    public function storeAdmins(Request $request){

        Request()->validate([
            "username"=>"required|max:40",
            "email"=>"required",
            "password"=>"required",
        ]);

        $createAdmin = User::create([
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=>'Admin',
        ]);
        if($createAdmin){
            return redirect('/admin/all-admins/')->with('create', 'Admin created Successfully');
        }
    }
    
    public function displayCategories(){
        $categories = categories::all();
        return view("admins.display-categories", compact('categories'));
    }


    public function createCategories(){
        return view("admins.create-categories");
    }

    public function storeCategories(Request $request){

        Request()->validate(
            [
                'name'=> "required",
            ]
            );
        
            $createCategories= categories::create([
                'name'=>$request->name,
            ]);

            if($createCategories){
                return redirect('admin/display-categories')->with('create', 'Category created successfully');
            }

    }

    public function editCategories($id){
        $category = categories::find($id);

        return view("admins.edit-categories", compact('category'));
    }

    public function updateCategories($id, Request $request){
         Request()->validate([

            'name'=>"required",
         ]);

         $categoryUpdate =categories::find($id);
         $categoryUpdate ->update([
            'name'=> $request->name,
         ]);

         if($categoryUpdate){
            return redirect("/admin/display-categories")->with('update', 'updated successfully');
         }

         
    
    
        }
        public function deleteCategories($id){
            $deleteCategory = categories::find($id);
            $deleteCategory ->delete();
        
            if($deleteCategory){
                return redirect('/admin/display-categories')->with('delete', 'Record deleted successfully');
            }
        }

        public function allJobs(){
            $jobs = Job::all();

            return view('admins.all-jobs', compact('jobs'));
        }
        public function createJobs(){

            $categories=categories::all();
            return view('admins.create-jobs', compact('categories'));
        }

        public function storeJobs(Request $request)
        {

            Request()->validate([
                'job_title' =>"required",
                'job_region' => "required",
                'company' => "required",
                'job_type' => "required",
                'vacancy' =>"required",
                'experience' =>"required",
                'salary' => "required",
                'gender' => "required",
                'application_deadline' => "required",
                'job_description' => "required",
                'responsibilities' => "required",
                'education_experience' => "required",
                'other_benefits' => "required",
                'category' => "required",
                'image' => "image",
            ]);
            $destinationPath = 'assets/images/';
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);
        
            $createJobs = Job::create([
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'company' => $request->company,
                'job_type' => $request->job_type,
                'vacancy' => $request->vacancy,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'gender' => $request->gender,
                'application_deadline' => $request->application_deadline,
                'job_description' => $request->job_description,
                'responsibilities' => $request->responsibilities,
                'education_experience' => $request->education_experience,
                'other_benefits' => $request->other_benefits,
                'category' => $request->category,
                'image' => $myimage,
            ]);
        
            if ($createJobs) {
                return redirect('admin/display-jobs/')->with('create', "Job created successfully");
            }
        }


        public function deleteJobs($id){
            $deleteJob=Job::find($id);
            if(File::exists(public_path('assets/images/' . $deleteJob->image) )){
                File::delete(public_path('assets/images/' . $deleteJob->image));
            }
            else{
                //dd("File doesn't exist")
            }   

            $deleteJob->delete();
            if($deleteJob){
                return redirect('admin/display-jobs/')->with('delete','Job deleted successfully');
            }
        }
        

        public function displayApps(){
            $apps = Application::with(['user','job'])->get();
            // dd($apps);
// dd($apps[0]->user,$apps[0]->job);
            return view('admins.all-apps',compact('apps'));

        }
        

        public function deleteApps($id){
            $deleteApp= Application::find($id);

            $deleteApp->delete();
            if($deleteApp){
                return redirect('admin/display-applications/')->with('delete','Application deleted successfully');
            }
        }




}
