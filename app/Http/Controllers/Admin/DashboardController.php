<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\complaint;
use App\AccountInformation;
use App\Consumer;
use App\BillHistory;
use App\meter;
use App\Payment;
use DB;

class DashboardController extends Controller
{
    public function registered(){
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request,$id){
        $users = User::findOrFail($id);
        // dd($users);
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request,$id){
        $users = User::find($id);
        $users->name=$request->input('username');
        $users->phone=$request->input('phone');
        $users->email=$request->input('email');
        $users->usertype=$request->input('usertype');
        $users->update();
        
        return redirect('/role-register')->with('status','Your data is updated');
    }

    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        
        return redirect('/role-register')->with('status','Data is deleted');
    }

   
    // public function consumer(){
    //     $consumers = Consumer::all();
    //     return view('admin.consmer')->with('consumers',$consumers);
    // }

   
    public function storecomplaint(Request $request){
        
        $complaint=new complaint;

        $this->validate($request,[
            'AccountNo'=>'required|min:5',
            'complaint'=>'required'
        ]);

        $complaint->complaint=$request->complaint;
        $complaint->accountNo=$request->AccountNo;
        
        $complaint->save();

        $data=complaint::all();
        //dd($data);
         return view('admin.complaint')->with('complaints',$data);

       // return redirect()->back();
       
        // dd($request->all());
    }

    
    public function updatecomplaintascomplete($id){
       $complaint=complaint::find($id);
       $complaint->iscompleted=1; 
       $complaint->save();
       return redirect()->back();
    }
    public function updatecomplaintasnotcomplete($id){
        $complaint=complaint::find($id);
        $complaint->iscompleted=0; 
        $complaint->save();
        return redirect()->back();
     }







     public function searchaccount(Request $request){
          // dd($request);
        $searchaccount=$request->get('searchaccount');
        // dd($searchaccount);
         $data=DB::table('account_information')->where('accountno','like'.$searchaccount);
        // dd($data);

         return view('admin.accountregistered', ['account_information'=>$data]);
        //  ->with('account_information',$data);
        
        // ['posts'=>$posts]);
     }        














     public function searchbillacc(Request $request,$accountno){
        $bill_histories = BillHistory::findOrFail($accountno);
        
        return view('admin.billhistoryedit')->with('bill_histories',$searchbillacc);
    }



     


    




    public function billedit(Request $request,$id){
        $billhistory = BillHistory::findOrFail($id);
        // dd($users);
        return view('admin.billhistory-edit')->with('bhe',$billhistory);
    }

     public function billhistoryupdate(Request $request,$id){
         $billhistory = BillHistory::find($id);
       
         $billhistory->accountno=$request->input('accountno');
         $billhistory->month=$request->input('month');
         $billhistory->billvalue=$request->input('billvalue');
        //  $users->usertype=$request->input('usertype');
        $billhistory->update();
        
         return redirect('/BillHistory')->with('status','Your data is updated');
     }

     public function billhistorydelete($id){
         $bill = BillHistory::findOrFail($id);
         $bill->delete();
        
         return redirect('/BillHistory')->with('status','Data is deleted');
     }

















     public function accountedit(Request $request,$id){
        $account = AccountInformation::findOrFail($id);
        // dd($users);
        return view('admin.account-edit')->with('ar',$account);
    }

     public function accountupdate(Request $request,$id){
         $account = AccountInformation::find($id);
       
         $account->accountno=$request->input('accountno');
         $account->consumername=$request->input('consumername');
         $account->contact=$request->input('contact');
         $account->Address=$request->input('Address');
        //  $users->usertype=$request->input('usertype');
        $account->update();
        
         return redirect('/AccountInformation')->with('status','Your data is updated');
     }

     public function accountdelete($id){
         $bill = AccountInformation::findOrFail($id);
         $bill->delete();
        
         return redirect('/AccountInformation')->with('status','Data is deleted');
     }









     public function meteredit(Request $request,$id){
        $account = meter::findOrFail($id);
        // dd($users);
        return view('admin.meter-edit')->with('ar',$account);
    }

     public function meterupdate(Request $request,$id){
         $account = meter::find($id);
       
         $account->accountno=$request->input('accountno');
         $account->month=$request->input('month');
         $account->Current_reading=$request->input('meterreading');
         $account->date=$request->input('date');
        //  $users->usertype=$request->input('usertype');
        $account->update();
        
         return redirect('/meterreading')->with('status','Your data is updated');
     }

     public function meterdelete($id){
         $bill = meter::findOrFail($id);
         $bill->delete();
        
         return redirect('/meterreading')->with('status','Data is deleted');
     }












     public function paymentedit(Request $request,$id){
        $account = Payment::findOrFail($id);
        // dd($users);
        return view('admin.payment-edit')->with('ar',$account);
    }

     public function paymentupdate(Request $request,$id){
         $account = Payment::find($id);
       
         $account->accountno=$request->input('accountno');
         $account->billid=$request->input('bill id');
         $account->payment=$request->input('meterreading');
         $account->date=$request->input('date');
        //  $users->usertype=$request->input('usertype');
        $account->update();
        
         return redirect('/meterreading')->with('status','Your data is updated');
     }

     public function paymentdelete($id){
         $bill = Payment::findOrFail($id);
         $bill->delete();
        
         return redirect('/meterreading')->with('status','Data is deleted');
     }








































     public function consumeredit(Request $request,$id){
       
        $consumer = Consumer::findOrFail($id);
       // dd($consumer);
        return view('admin.consumer-edit')->with('ar',$consumer);
    }

     public function consumerupdate(Request $request,$id){
         $consumer =Consumer::find($id);
       
         $consumer->accountno=$request->input('accountno');
         $consumer->consumername=$request->input('consumername');
         $consumer->contact=$request->input('contact');
         $consumer->Address=$request->input('Address');
         $consumer->nic=$request->input('nic');
         $consumer->email=$request->input('email');
        //  $users->usertype=$request->input('usertype');
        $consumer->update();
        
         return redirect('/consumerdetails')->with('status','Your data is updated');
     }

     public function consumerdelete($id){
         $consumer =Consumer::findOrFail($id);
         $consumer->delete();
        
         return redirect('/consumerdetails')->with('status','Data is deleted');
     }
     





}
