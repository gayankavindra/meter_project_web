@extends('layouts.masterconsumer')


@section('title')
Payment
@endsection

@section('content')

   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
                <h4 class="card-title"> Payments</h4>
              
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
                @if (session('nobill'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('nobill') }}
                        </div>
                @endif                 
              </div>
                          
              <div class="card-body"> 
              
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{$error}}</div>
              @endforeach

              
              <form method="post" action="/searchpayment">
            
              {{csrf_field()}}
              <input type="text" class="form-control" name="AccountNo" placeholder="Enter Account No to search bill history ">
             


             
              <input type="submit" class="btn btn-success float-left" value="Search">
              <a href="/payment" class="btn btn-default float-left">All Records</a> 
              <a href="/payment-add" class="btn btn-info float-right"><i class="now-ui-icons ui-1_simple-add">&nbsp Add new payment</i></a>  
               
              <br>
                   
               <br>
              </form><br>
              
              <table class="table table-dark">

               
                <th> ID</th>
                <th> Account No</th>
                <th>Bill ID</th>
                <th>Paid value</th>
                <th> Date</th>
                <!-- <th> contact</th> -->
                <th>Action</th>
                

                @foreach($payments as $bh)
                <tr>
               
                <td>{{$bh->id}}</td>
                <td>{{$bh->accountno}}</td>
                <td>{{$bh->billid}}</td>
                <td>{{$bh->payment}}</td>
                <td>{{$bh->date}}</td>
                
                <td>

                
                <form action="/payment-delete/{{$bh->id}}" method="POST">
                <a href="/payment-edit/{{$bh->id}}"  class="btn btn-warning text-center"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp Edit</a>
                <!-- <a href="/billhistory-delete/{{$bh->id}}" class="btn btn-danger text-center"><i class="now-ui-icons ui-1_simple-remove"></i></a> -->
                
                          {{csrf_field()}}
                          {{method_field('DELETE')}}                        
                         <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i> &nbsp Delete</button>         
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