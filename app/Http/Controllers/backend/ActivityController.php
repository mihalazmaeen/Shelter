<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Comment;
use App\Models\Foundation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ActivityController extends Controller
{
     public function CreateActivity(){
         $foundations=Foundation::where('user_id',Auth::user()->id)->get();
         return view('backend.activity.create',compact('foundations'));

     }
    public function StoreActivity(Request $request){
        $user_id =Auth::user()->id;
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(920,1000)->save('upload/activity/'.$name_gen);
        $save_url='upload/activity/'.$name_gen;
        if($request->file('image')){
            Activity::insert([
                'user_id'=>$user_id,
                'foundation_id'=>$request->foundation_id,
                'title'=>($request->title) ,
                'link'=>$request->link,
                'description'=>$request->description,
                'created_at'=>Carbon::now(),
                'image'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Activity Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            Activity::insert([
                'user_id'=>$user_id,
                'foundation_id'=>$request->foundation_id,
                'title'=>($request->title) ,
                'link'=>$request->link,
                'description'=>$request->description,
                'created_at'=>Carbon::now(),


            ]);
            $notification=array(
                'message'=>'Activity Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }


    }
    public function ShowActivity(){
        $user_id =Auth::user()->id;
        $activities=Activity::where('user_id',$user_id)->get();
        return view('backend.activity.index',compact('activities'));
    }
    public function EditActivity($id){
        $activities=Activity::findOrFail($id);
        $foundations=Foundation::where('user_id',Auth::user()->id)->get();
        return view('backend.activity.edit',compact('activities','foundations'));
    }
    public function UpdateActivity(Request $request){
        $activity_id=$request->id;
        $old_img=$request->old_img;
        if($request->file('image')){
            unlink($old_img);
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(920,1000)->save('upload/activity/'.$name_gen);
            $save_url='upload/activity/'.$name_gen;

            Activity::findOrFail($activity_id)->update([
                'foundation_id'=>$request->foundation_id,
                'title'=>($request->title) ,
                'link'=>$request->link,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),
                'image'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Activity Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('view.activity')->with($notification);
        }else{
            Activity::findOrFail($activity_id)->update([
                'foundation_id'=>$request->foundation_id,
                'title'=>($request->title) ,
                'link'=>$request->link,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),


            ]);
            $notification=array(
                'message'=>'Activity Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('view.activity')->with($notification);

        }
    }
    public function DeleteActivity($id){
        Activity::find($id)->delete();
        $notification=array(
            'message'=>'Activity Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('view.activity')->with($notification);

    }
    public function StoreActivityComment(Request $request){
        $activity_id=$request->activity_id;
        Comment::insert([
            'activity_id' => $activity_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'title'=>$request->title,
            'comment'=>$request->comment
        ]);
        $notification=array(
            'message'=>'Comment Submitted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
