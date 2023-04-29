<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Foundation;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class FoundationController extends Controller
{
    public function CreateFoundation(){
        return view('backend.foundation.create');
    }
    public function ShowFoundation(){
        $user_id =Auth::user()->id;
        $foundations=Foundation::where('user_id',$user_id)->get();
        return view('backend.foundation.index',compact('foundations'));
    }
    public function StoreFoundation(Request $request){
        $user_id =Auth::user()->id;
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'video_link'=>'required',
            'motto'=>'required',
            'description'=>'required',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(920,1000)->save('upload/foundations/'.$name_gen);
        $save_url='upload/foundations/'.$name_gen;
        Foundation::insert([
            'user_id'=>$user_id,
            'name'=>($request->name) ,
            'video_link'=>$request->video_link,
            'motto'=>$request->motto,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
            'image'=>$save_url,

        ]);
        $notification=array(
            'message'=>'Foundation Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function EditFoundation($id) {
        $foundations=Foundation::findOrFail($id);
        return view('backend.foundation.edit',compact('foundations'));
    }
    public function UpdateFoundation(Request $request){
        $foundation_id=$request->id;
        $old_img=$request->old_img;
        if($request->file('image')){
            unlink($old_img);
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(920,1000)->save('upload/foundations/'.$name_gen);
            $save_url='upload/foundations/'.$name_gen;

            Foundation::findOrFail($foundation_id)->update([
                'name'=>($request->name) ,
                'video_link'=>$request->video_link,
                'motto'=>$request->motto,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),
                'image'=>$save_url,

            ]);
            $notification=array(
                'message'=>'Foundation Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('view.foundation')->with($notification);
        }else{
            Foundation::findOrFail($foundation_id)->update([
                'name'=>($request->name) ,
                'video_link'=>$request->video_link,
                'motto'=>$request->motto,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),


            ]);
            $notification=array(
                'message'=>'Foundation Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('view.foundation')->with($notification);

        }
    }
    public function DeleteFoundation($id){
        Foundation::find($id)->delete();
        $notification=array(
            'message'=>'Foundation Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('view.foundation')->with($notification);

    }
    public function FoundationReview(Request $request){
        Review::insert([
            'foundation_id'=>$request->foundation_id,
            'user_id'=>$request->user_id,
            'rating'=>$request->star,
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Review Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    public function FoundationDonation(){
        $foundations=Foundation::where('user_id',Auth::user()->id)->get('id');
        $donations=Donation::whereIn('foundation_id',$foundations)->with('foundation')->get();
        return view('backend.foundation.donation_details',compact('donations'));
    }
}
