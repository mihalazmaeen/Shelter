<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function DonateWithStripe(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51K411CAS0IFiYWoIHSmERtAF6cUOXiYexOYnFjqwYoPEoKyGMGzUF5A49wHTGW61lF64BBxXrqFlwNVRx7t2ghX600WX748aip');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $amount=$request->amount;
        if ($amount <=0){
            $notification=array(
                'message'=>'Please enter valid amount',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $charge = \Stripe\Charge::create([
                'amount' => ($amount)*100,
                'currency' => 'BDT',
                'description' => 'Shelter',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            Donation::insert([
                'foundation_id'=>$request->foundation_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'amount'=>$amount,
                'card_transaction'=>'Shelter'.mt_rand(1000000000,9999999999),
                'card'=>1,
                'created_at'=>Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Donation Successful',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function DonateWithBkash(Request $request){
        $amount=$request->amount;
        if ($amount <=0){
            $notification=array(
                'message'=>'Please enter valid amount',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }else{
            Donation::insert([
                'foundation_id'=>$request->foundation_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'amount'=>$amount,
                'bkash_transaction'=>$request->bkash_transaction,
                'bkash'=>1,
                'created_at'=>Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Donation Successful',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
