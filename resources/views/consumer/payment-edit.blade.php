@extends('layouts.masterconsumer')


@section('title')
Edit Payment
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class=="card-header ">
              <br>
                  <h3 class="text-center">Edit Meter Readings</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form action="/payment-update/{{$ar->id}}" method="POST">
                                
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group ">
                                    <label>Account No</label>
                                    <input type="text" name="accountno" value="{{$ar->accountno}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Bill ID</label>
                                    <input type="text" name="billid" value="{{$ar->billid}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Paid value</label>
                                    <input type="text" name="payment" value="{{$ar->payment}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" value="{{$ar->date}}" class="form-control">
                                </div>

                                
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/payment" class="btn btn-danger">Cancel</a>

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