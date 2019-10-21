@extends('layouts.master')


@section('title')
Registered Accounts
@endsection

@section('content')

   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
               
               
                @if (session('noentry'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('noentry') }}
                        </div>
                @endif
                @if (session('noaccount'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('noaccount') }}
                        </div>
                @endif   
                <h4 class="card-title"> Registered Electricity accounts</h4>            
              </div>
                          
              <div class="card-body"> 
              
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{$error}}</div>
              @endforeach


              <form method="post" action="/searchaccount">
              {{csrf_field()}}
              <input type="search" class="form-control" name="searchaccount" placeholder="Enter Account Number to search">
              
                <!-- <span class="input-group-btn">            
                  <button type="submit" class="btn btn-success" >Search
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                  <a href="/AccountInformation" class="float-right">All Records</a>
                </span>

              </form>
              <br> -->
              <input type="submit" class="btn btn-success float-left" value="Search">
              <a href="/AccountInformation" class="btn btn-default float-left">All Records</a> 
               <br>
               <!-- <a href="" class="btn btn-danger float-right">Delete</a>
               <a href="" class="btn btn-warning float-right">Edit</a>
               <a href="" class="btn btn-info float-right">Add</a>         
               <br> -->
               </form>
               <br>
             
              <table class="table table-dark">

                <th> ID</th>    
                <th> Account No</th>
                <th> Total due Amount</th>           
                         
                <th> Contact No</th>
                <th>Address</th>
                <th> Consumer Name</th>
                <th> Consumer NIC</th> 
                <th>Action</th>
                    
               
                

        
               @foreach($account_information as $ar)
                <tr>
                <td>{{$ar->id}}</td>    
                <td>{{$ar->accountno}}</td>
                <td>{{$ar->totaldueamount}}</td>        
               
                <td>{{$ar->contact}}</td>
                <!-- <td>{{$ar->address}}</td> -->
                <td>{{$ar->Address}}</td>
                <td>{{$ar->consumername}}</td>
                <!-- <td>{{$ar->consumer_nic}}</td> -->
                <td>{{$ar->nic}}</td>
                
                
                <td>
                
                <form action="/account-delete/{{$ar->id}}" method="POST">
                <a href="" class="btn btn-info text-center"><i class="now-ui-icons ui-1_simple-add"></i></a>  
                <a href="/account-edit/{{$ar->id}}" class="btn btn-warning text-center"><i class="now-ui-icons design-2_ruler-pencil"></i></a>
                
                {{csrf_field()}}
                {{method_field('DELETE')}}                        
                <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i></button>         
                </form>

                </td>

                </tr>
                @endforeach 

              </table>
              





                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection