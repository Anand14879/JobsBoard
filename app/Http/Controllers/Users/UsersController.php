<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use Auth;

class UsersController extends Controller
{
    public function profile(){
        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));
    }

    public function applications(){
        $applications = Application::where('user_id', '=',Auth::user()->id)
        ->get();

        return view('users.applications', compact('applications'));
    }

    public function savedJobs(){
        $savedJobs = JobSaved::where('user_id', '=',Auth::user()->id)
        ->get();

        return view('users.savedjobs', compact('savedJobs'));
    }

    public function editDetails(){
        $userDetails = User::find(Auth::user()->id);

        return view('users.editdetails', compact('userDetails'));
    }

    public function updateDetails(Request $request){

        Request()->validate([
            "name"=>"required|max:40",
            "job_title"=>"required|max:40",
            "bio"=>"required",
            "facebook"=>"required|max:40",
            "twitter"=>"required|max:40",
            "linkedin"=>"required|max:40", 
        ]
        );

        $userDetailsUpdate = User::find(Auth::user()->id);
        $userDetailsUpdate->update([
            "name"=>$request->name,
            "job_title"=>$request->job_title,
            "bio"=>$request->bio,
            "twitter"=>$request->twitter,
            "facebook"=>$request->facebook,
            "linkedin" =>$request -> linkedin,
          ]);
        if($userDetailsUpdate){
            return redirect('/users/edit-details/') -> with('update','User details updated successfully');
        }
    }

    public function editCV(){

        return view('users.editcv');
    }

    public function updateCV(Request $request){

        $oldCV= User::find(Auth::user()->id);
        $file_path = public_path('/assets/cvs/'.$oldCV->cv);
        if (file_exists($file_path))
        {
            unlink($file_path);
        }

        $destinationPath = 'assets/cvs/';
        $mycv = $request->cv->getClientOriginalName();
        $request->cv->move(public_path($destinationPath), $mycv);

        $oldCV->cv =$mycv;
        $oldCV->save();
        $profile = $oldCV;

        return redirect('/users/profile')->with('update',"CV updated Successfully");
        // return view('users.profile', compact('profile'))->with('success',"CV updated Successfully");
    }
}
