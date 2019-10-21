@extends('layouts.master')


@section('title')
View Complaints
@endsection

@section('content')

   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> View Complaints</h4>
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
                @if (session('nocomplaint'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('nocomplaint') }}
                        </div>
                @endif            
              </div>
                          
              <div class="card-body"> 
              
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{$error}}</div>
              @endforeach

              <form method="post" action="/searchcomplaints">
              {{csrf_field()}}
              <input type="text" class="form-control" name="AccountNo" placeholder="Enter Account Number to search">
              <!-- <br>
              <input type="text" class="form-control" name="complaint" placeholder="Enter your complaint">
               -->
             
              <input type="submit" class="btn btn-success float-left" value="search">
              <!-- <a href="/view-complaints" class="float-right">All Records</a> -->
              <a href="/view-complaints" class="btn btn-default float-left">All Records</a> 
              
              <!-- <input type="button" class="btn btn-warning" value="Clear"> -->
              </form>
              <table class="table table-dark">

                <th> ID</th>
                <th> Account No</th>
                <th>Complaint</th>
                <th> Completed</th>
                <th> Action</th>

                @foreach($complaints as $complaint)
                <tr>
                <td>{{$complaint->id}}</td>
                <td>{{$complaint->accountNo}}</td>
                <td>{{$complaint->complaint}}</td>
                @if($complaint->iscompleted)
                <td><button class="btn btn-success">Completed</td>
                <td><a href="/markasnotcompleted/{{$complaint->id}}" class"btn btn-warning">Mark as not Completed</a></td>
                
                @else
                  <td><button class="btn btn-warning">Not Completed</td>
                  <td><a href="/markascompleted/{{$complaint->id}}" class"btn btn-primary">Mark as Completed</a></td>
                
                @endif
              
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