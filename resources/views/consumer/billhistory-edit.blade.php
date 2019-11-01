@extends('layouts.masterconsumer')


@section('title')
Edit Registered Roles
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class=="card-header ">
              <br>
                  <h3 class="text-center">Edit Bill History</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form action="/billhistory-update/{{$bhe->id}}" method="POST">
                                
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group ">
                                    <label>Account No</label>
                                    <input type="text" name="accountno" value="{{$bhe->accountno}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Month</label>
                                    <input type="text" name="month" value="{{$bhe->month}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Bill value</label>
                                    <input type="text" name="billvalue" value="{{$bhe->billvalue}}" class="form-control">
                                </div>

                                
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/BillHistory" class="btn btn-danger">Cancel</a>

                            </form> 

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <div>


</div>

@endsection

@section('scripts')
@endsection