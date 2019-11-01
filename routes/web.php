<?php
use App\Consumer;
use App\complaint;
use App\BillHistory;
use App\AccountInformation;
use App\meter;
use App\Payment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});














Route::group(['middleware'=>['auth','admin']],function(){
//Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'],function(){
  
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/area', function () {
        return view('admin.area');
    });

    
    Route::get('/role-register','Admin\DashboardController@registered');

    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');

    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    

    // Route::get('/consumer-details','Admin\DashboardController@consumer');


















    Route::get('/view-complaints',function () {
        $data=App\complaint::all();
        return view('admin.complaint')->with ('complaints',$data);
    });
    
    Route::post('/savecomplaints','Admin\DashboardController@storecomplaint');

    Route::post('/searchcomplaints', function () {
        $q=Request::get('AccountNo');
       //  dd($q);
       if($q != ""){
            $selectedcomplaint=complaint::where('accountNo','LIKE','%'.$q.'%')->get();
                if(count($selectedcomplaint)>0){
                return view('admin.complaint')->with('complaints',$selectedcomplaint);
        
               }
               else
               return redirect('/view-complaints')->with('nocomplaint','Can not find any complaint for that account number');

       }
       return redirect('/view-complaints')->with('noentry','Please enter Account Number to search');
    });
   
    Route::get('/markascompleted/{id}','Admin\DashboardController@updatecomplaintascomplete');
    Route::get('/markasnotcompleted/{id}','Admin\DashboardController@updatecomplaintasnotcomplete');



    Route::post('/completed', function () {
      
            $selectedcomplaint=complaint::where('iscompleted','LIKE','1')->get();
                // dd($selectedcomplaint);
                return view('admin.complaint')->with('complaints',$selectedcomplaint);
                
    });     
    Route::post('/notcompleted', function () {
      
        $selectedcomplaint=complaint::where('iscompleted','LIKE','0')->get();
            // dd($selectedcomplaint);
            return view('admin.complaint')->with('complaints',$selectedcomplaint);
            
});     
















    Route::get('/AccountInformation',function () {
         $data=App\AccountInformation::all()
        //  ->join('consumers','consumers.nic','=','consumer_nic')
        // ->select
         ;
        //dd($data);
       return view('admin.accountregistered')->with('account_information',$data);
        
    });


   // Route::get('/searchaccount','Admin\DashboardController@searchaccount');
    Route::post('/searchaccount', function () {
        $q=Request::get('searchaccount');
       //  dd($q);
       if($q != ""){
            $selectedaccounts=AccountInformation::where('accountno','LIKE','%'.$q.'%')->get();
                if(count($selectedaccounts)>0){
                return view('admin.accountregistered')->with('account_information',$selectedaccounts);
        
               }
               else
               return redirect('/AccountInformation')->with('noaccount','Can not find any Electricity Account for the entered number');

       }
       return redirect('/AccountInformation')->with('noentry','Please enter Account number to search');
    });


    



















    Route::get('/consumerdetails', function () {
        $data=App\Consumer::all();

        // $data=App\Consumer::paginate(1);
       
        return view('admin.consumer')->with ('consumers',$data);
    });

    Route::post('/searchconsumeraccount', function () {
         $q=Request::get('q');
        //  dd($q);
        if($q != ""){
             $selectedconsumer=Consumer::where('nic','LIKE','%'.$q.'%')->get();
                 if(count($selectedconsumer)>0){
                 return view('admin.consumer')->with('consumers',$selectedconsumer)->with('finduser','Consumers related to entered NIC number');
         
                }
                else
                return redirect('/consumerdetails')->with('nouser','Can not find any consumer to that NIC number');

        }
        return redirect('/consumerdetails')->with('noentry','Please enter NIC number to search');
    });















    
        Route::get('/BillHistory',function () {
            $data=App\BillHistory::all();
            return view('admin.billhistory')->with ('bill_Histories',$data);
        });

       Route::post('/searchbill', function () {
         $q=Request::get('AccountNo');
        //  dd($q);
        if($q != ""){
             $selectedbill=BillHistory::where('accountno','LIKE','%'.$q.'%')->get();
                 if(count($selectedbill)>0){
                 return view('admin.billhistory')->with('bill_Histories',$selectedbill);
         
                }
                else
                return redirect('/BillHistory')->with('nobill','Can not find any bill to that Account Number');

        }
        return redirect('/BillHistory')->with('noentry','Please enter Account number to search');
       });


     Route::get('/bill-edit/{id}','Admin\DashboardController@billedit');

     Route::put('/billhistory-update/{id}','Admin\DashboardController@billhistoryupdate');
 
     Route::delete('/billhistory-delete/{id}','Admin\DashboardController@billhistorydelete');
 








     Route::get('/account-edit/{id}','Admin\DashboardController@accountedit');

     Route::put('/account-update/{id}','Admin\DashboardController@accountupdate');
 
     Route::delete('/account-delete/{id}','Admin\DashboardController@accountdelete');
 





     Route::get('/consumer-edit/{id}','Admin\DashboardController@consumeredit');

     Route::put('/consumer-update/{id}','Admin\DashboardController@consumerupdate');
 
     Route::delete('/consumer-delete/{id}','Admin\DashboardController@consumerdelete');
 

    Route::get('/meterreading',function () {
        $data=App\meter::all();
        return view('admin.meter')->with ('meters',$data);
    });
    Route::get('/meter-edit/{id}','Admin\DashboardController@meteredit');

    Route::put('/meter-update/{id}','Admin\DashboardController@meterupdate');

    Route::delete('/meter-delete/{id}','Admin\DashboardController@meterdelete');

   Route::post('/searchmeter', function () {
    $q=Request::get('AccountNo');
   //  dd($q);
   if($q != ""){
        $meteraccount=meter::where('accountno','LIKE','%'.$q.'%')->get();
            if(count($meteraccount)>0){
            return view('admin.meter')->with('meters',$meteraccount);
    
           }
           else
           return redirect('/meterreading')->with('nobill','Can not find any bill to that Account Number');

   }
   return redirect('/meterreading')->with('noentry','Please enter Account number to search');
  });
















  Route::get('/payment',function () {
    $data=App\Payment::all();
    return view('admin.payment')->with ('payments',$data);
});
Route::get('/payment-edit/{id}','Admin\DashboardController@paymentedit');

Route::put('/payment-update/{id}','Admin\DashboardController@paymentupdate');

Route::delete('/payment-delete/{id}','Admin\DashboardController@paymentdelete');

Route::post('/searchpayment', function () {
$q=Request::get('AccountNo');
//  dd($q);
if($q != ""){
    $meteraccount=Payment::where('accountno','LIKE','%'.$q.'%')->get();
        if(count($meteraccount)>0){
        return view('admin.payment')->with('payments',$meteraccount);

       }
       else
       return redirect('/payment')->with('nobill','Can not find any bill to that Account Number');

}
return redirect('/payment')->with('noentry','Please enter Account number to search');
});











// add
    Route::get('/payment-add',function () {
    return view('admin.payment-add');
});
Route::post('/payment-save','Admin\DashboardController@paymentsave');

Route::get('/account-add',function () {
    return view('admin.account-add');
});
Route::post('/account-save','Admin\DashboardController@accountsave');
Route::get('/consumer-add',function () {
    return view('admin.consumer-add');
});
Route::get('/Billhistory-add',function () { 
    return view('admin.Billhistory-add');
});
Route::get('/meter-add',function () { 
    return view('admin.meter-add');
});






























});

































//Route::group(['middleware'=>['auth','consumer']],function(){
Route::group(['middleware'=>'App\Http\Middleware\ConsumerMiddleware'],function(){
    







      Route::get('/dashboard', function () {
         return view('consumer.dashboard');
      });
    

 // Route::get('/consumerdashboard', function () {
 //     return view('consumer.dashboard');
 // });

     Route::get('/viw-complaint',function () {
         $data=App\complaint::all();
         return view('consumer.complaint')->with ('complaints',$data);
     });
    
     Route::post('/savecomplaints','Consumeracc\DashboardController@storecomplaint');

      Route::get('/area', function () {
         return view('consumer.area');
     });

  
     Route::get('/AccountInformation',function () {
          $data=App\AccountInformation::all()
         //  ->join('consumers','consumers.nic','=','consumer_nic')
         // ->select
          ;
         //dd($data);
        return view('consumer.accountregistered')->with('account_information',$data);
        
     });


    // Route::get('/searchaccount','Admin\DashboardController@searchaccount');
     Route::post('/searchaccount', function () {
         $q=Request::get('searchaccount');
        //  dd($q);
        if($q != ""){
             $selectedaccounts=AccountInformation::where('accountno','LIKE','%'.$q.'%')->get();
                 if(count($selectedaccounts)>0){
                 return view('consumer.accountregistered')->with('account_information',$selectedaccounts);
        
                }
                else
                return redirect('/AccountInformation')->with('noaccount','Can not find any Electricity Account for the entered number');

        }
        return redirect('/AccountInformation')->with('noentry','Please enter Account number to search');
     });





     Route::get('/consumerdetails', function () {
         $data=App\Consumer::all();

         // $data=App\Consumer::paginate(1);
       
         return view('consumer.consumer')->with ('consumers',$data);
     });

     Route::post('/searchconsumeraccount', function () {
          $q=Request::get('q');
         //  dd($q);
         if($q != ""){
              $selectedconsumer=Consumer::where('nic','LIKE','%'.$q.'%')->get();
                  if(count($selectedconsumer)>0){
                  return view('consumer.consumer')->with('consumers',$selectedconsumer)->with('finduser','Consumers related to entered NIC number');
         
                 }
                 else
                 return redirect('/consumerdetails')->with('nouser','Can not find any consumer to that NIC number');

         }
         return redirect('/consumerdetails')->with('noentry','Please enter NIC number to search');
     });

         Route::get('/BillHistory',function () {
             $data=App\BillHistory::all();
             return view('consumer.billhistory')->with ('bill_Histories',$data);
         });

        Route::post('/searchbill', function () {
          $q=Request::get('AccountNo');
         //  dd($q);
         if($q != ""){
              $selectedbill=BillHistory::where('accountno','LIKE','%'.$q.'%')->get();
                  if(count($selectedbill)>0){
                  return view('consumer.billhistory')->with('bill_Histories',$selectedbill);
         
                 }
                 else
                 return redirect('/BillHistory')->with('nobill','Can not find any bill to that Account Number');

         }
         return redirect('/BillHistory')->with('noentry','Please enter Account number to search');
        });


      Route::get('/bill-edit/{id}','Admin\DashboardController@billedit');

      Route::put('/billhistory-update/{id}','Admin\DashboardController@billhistoryupdate');
 
      Route::delete('/billhistory-delete/{id}','Admin\DashboardController@billhistorydelete');
 








      Route::get('/account-edit/{id}','Admin\DashboardController@accountedit');

      Route::put('/account-update/{id}','Admin\DashboardController@accountupdate');
 
      Route::delete('/account-delete/{id}','Admin\DashboardController@accountdelete');
 





      Route::get('/consumer-edit/{id}','Admin\DashboardController@consumeredit');

      Route::put('/consumer-update/{id}','Admin\DashboardController@consumerupdate');
 
      Route::delete('/consumer-delete/{id}','Admin\DashboardController@consumerdelete');
 

     Route::get('/meterreading',function () {
         $data=App\meter::all();
         return view('consumer.meter')->with ('meters',$data);
     });
     Route::get('/meter-edit/{id}','Admin\DashboardController@meteredit');

     Route::put('/meter-update/{id}','Admin\DashboardController@meterupdate');

     Route::delete('/meter-delete/{id}','Admin\DashboardController@meterdelete');

    Route::post('/searchmeter', function () {
     $q=Request::get('AccountNo');
    //  dd($q);
    if($q != ""){
         $meteraccount=meter::where('accountno','LIKE','%'.$q.'%')->get();
             if(count($meteraccount)>0){
             return view('consumer.meter')->with('meters',$meteraccount);
    
            }
            else
            return redirect('/meterreading')->with('nobill','Can not find any bill to that Account Number');

    }
    return redirect('/meterreading')->with('noentry','Please enter Account number to search');
   });
















   Route::get('/payment',function () {
     $data=App\Payment::all();
     return view('consumer.payment')->with ('payments',$data);
 });
 Route::get('/payment-edit/{id}','Admin\DashboardController@paymentedit');

 Route::put('/payment-update/{id}','Admin\DashboardController@paymentupdate');

 Route::delete('/payment-delete/{id}','Admin\DashboardController@paymentdelete');

 Route::post('/searchpayment', function () {
 $q=Request::get('AccountNo');
 //  dd($q);
 if($q != ""){
     $meteraccount=Payment::where('accountno','LIKE','%'.$q.'%')->get();
         if(count($meteraccount)>0){
         return view('consumer.payment')->with('payments',$meteraccount);

        }
        else
        return redirect('/payment')->with('nobill','Can not find any bill to that Account Number');

 }
 return redirect('/payment')->with('noentry','Please enter Account number to search');
 });



 







 // add
     Route::get('/payment-add',function () {
     return view('consumer.payment-add');
 });
 Route::post('/payment-save','Admin\DashboardController@paymentsave');

 Route::get('/account-add',function () {
     return view('consumer.account-add');
 });
 Route::post('/account-save','Admin\DashboardController@accountsave');

 Route::get('/consumer-add',function () {
     return view('consumer.consumer-add');
 });
 Route::post('/consumer-save','Admin\DashboardController@consumersave');

 Route::get('/Billhistory-add',function () { 
     return view('consumer.Billhistory-add');
 });
 Route::post('/billhistory-save','Admin\DashboardController@billhistorysave');

 Route::get('/meter-add',function () { 
     return view('consumer.meter-add');
 });
 Route::post('/meter-save','Admin\DashboardController@metersave');






































});

Route::post('/accountnocatch', function () {
    $acc=Request::get('q');
    dd($acc);
    // return view('consumer.dashbaord')->with($acc);
 });





































Route::get('/websiteindex', function () {
    return view('website');
});







Route::get('/phpfirebase_sdk','FirebaseController@index');
Auth::routes();
// Route::get('/admindashboard', function () {
//     return view('admin.dashboard');
// });



Route::get('/home', 'HomeController@index')->name('home');






































