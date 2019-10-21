@extends('layouts.master')


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
                  <h3 class="text-center">Edit Consumer Details</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form action="/consumer-update/{{$ar->id}}" method="POST">
                                
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group ">
                                    <label>NIC</label>
                                    <input type="text" name="nic" value="{{$ar->nic}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Consumer Name</label>
                                    <input type="text" name="consumername" value="{{$ar->consumername}}" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label>Account no</label>
                                    <input type="text" name="accountno" value="{{$ar->accountno}}" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{$ar->email}}" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact" value="{{$ar->contact}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="Address" value="{{$ar->Address}}" class="form-control">
                                </div>

                                
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/consumerdetails" class="btn btn-danger">Cancel</a>

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