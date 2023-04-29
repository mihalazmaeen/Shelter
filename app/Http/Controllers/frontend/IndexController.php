<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Donation;
use App\Models\Foundation;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){

        return view('frontend.index');
    }
    public function UserProfile(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }
    public function UserProfileEdit(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('frontend.profile.user_profile_edit',compact('editData'));
    }
    public function UserProfileUpdate(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
//            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
        }
        $data->save();
        $notification=array(
            'message'=>'Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.profile')->with($notification);
    }
    public function UserChangePassword(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }
    public function UserUpdatePassword(Request $request){
        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function ActivityDetails($activity_id){
        $activity=Activity::where('id',$activity_id)->with('user','foundation')->first();
        $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
        return view('frontend.details.activity_details',compact('activity','activities'));
    }
    public function FoundationDetails($foundation_id){
        $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
        $rating=Review::where('foundation_id',$foundation_id)->avg('rating');
        $foundation=Foundation::where('id',$foundation_id)->with('user')->first();

        return view('frontend.details.foundation_details',compact('foundation','activities','rating'));
    }


}
