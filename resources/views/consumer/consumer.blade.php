@extends('layouts.masterconsumer')


@section('title')
Registered Accounts
@endsection

@section('content')

   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registered Electricity Consumer accounts</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                @if (session('noentry'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('noentry') }}
                        </div>
                @endif
                @if (session('nouser'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('nouser') }}
                        </div>
                @endif   
                <!-- @if (session('finduser'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('finduser') }}
                        </div>
                @endif               -->
              </div>
                          
              <div class="card-body"> 
              
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{$error}}</div>
              @endforeach


              <form method="post" action="/searchconsumeraccount">
              {{csrf_field()}}
              <input type="search" class="form-control" name="q" placeholder="Enter Consumer NIC Number to search">
              
<!--                          
                  <button type="submit" class="btn btn-success" >Search
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                  <a href="/consumerdetails" class="btn btn-info float-left">All Records</a>
                
                <br>
               
               <a href="" class="btn btn-danger float-right">Delete</a>
               <a href="" class="btn btn-warning float-right">Edit</a>
               <a href="" class="btn btn-success float-right">Add</a>
              
               
               <br> -->
               <input type="submit" class="btn btn-success float-left" value="Search">
              <a href="/consumerdetails" class="btn btn-default float-left">All Records</a> 
              <a href="/consumer-add" class="btn btn-info float-right"><i class="now-ui-icons ui-1_simple-add">&nbsp Add new Consumer</i></a>  
               <br>
               <!-- <a href="" class="btn btn-danger float-right">Delete</a>
               <a href="" class="btn btn-warning float-right">Edit</a>
               <a href="" class="btn btn-info float-right">Add</a>         
               <br> -->
              </form>


              <br>
             
              <table class="table table-dark">

                <th> ID</th>
               
                <th> Consumer Name</th>
                <th> Consumer NIC</th>               
                <th> Contact No</th>
                <th>Address</th>
                <th>Email</th>
                
                <th> Total due Amount</th>
                <th>Action</th>
                
                

        
               @foreach($consumers as $ar) 
                <tr>
                <td>{{$ar->id}}</td>
               
                <td>{{$ar->consumername}}</td>
                <td>{{$ar->nic}}</td>
                <td>{{$ar->contact}}</td>
                <!-- <td>{{$ar->address}}</td> -->
                <td>{{$ar->Address}}</td>
                <td>{{$ar->email}}</td>
                
                <td>{{$ar->totaldueamount}}</td>

                <td>
                
                <form action="/consumer-delete/{{$ar->id}}" method="POST">
                <!-- <a href="" class="btn btn-info text-center"><i class="now-ui-icons ui-1_simple-add"></i></a>   -->
                <a href="/consumer-edit/{{$ar->id}}" class="btn btn-warning text-center"><i class="now-ui-icons design-2_ruler-pencil"></i>&nbsp Edit</a>
                
                {{csrf_field()}}
                {{method_field('DELETE')}}                        
                <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i>&nbsp Delete</button>         
                </form>

                </td>

               
                </tr>
                
                @endforeach 
                <!-- <span>{$consumers->links()}</span> -->
              </table>
              
              




                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection