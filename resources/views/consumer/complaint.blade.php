@extends('layouts.masterforconsumer')


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
              </div>
                          
              <div class="card-body"> 
              
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{$error}}</div>
              @endforeach

              <form method="post" action="/savecomplaints">
              {{csrf_field()}}
              <input type="text" class="form-control" name="AccountNo" placeholder="Enter your Account Number">
              <br>
              <input type="text" class="form-control" name="complaint" placeholder="Enter your complaint">
              
              <br>
              <input type="submit" class="btn btn-success" value="Add">
              <input type="button" class="btn btn-warning" value="Clear">
              </form>
              <table class="table table-dark">

                <th> ID</th>
                <th> Account No</th>
                <th>Complaint</th>
                <th> Completed</th>

                @foreach($complaints as $complaint)
                <tr>
                <td>{{$complaint->id}}</td>
                <td>{{$complaint->accountNo}}</td>
                <td>{{$complaint->complaint}}</td>
                @if($complaint->iscompleted){
                <td><button class="btn btn-success">Completed</td>
                }
                @else{
                  <td><button class="btn btn-warning">Not Completed</td>
                }
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