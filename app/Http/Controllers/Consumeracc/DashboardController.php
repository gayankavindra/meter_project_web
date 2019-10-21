<?php

namespace App\Http\Controllers\Consumeracc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\complaint;

class DashboardController extends Controller
{ 
   
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
         return view('consumer.complaint')->with('complaints',$data);

       // return redirect()->back();
       
        // dd($request->all());
    }


    
}
