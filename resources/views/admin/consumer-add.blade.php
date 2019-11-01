@extends('layouts.master')


@section('title')
Add new Consumer
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class=="card-header ">
              <br>
                  <h3 class="text-center">Add new Consumer</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form method="post" action="/consumer-save" >
                                
                             {{csrf_field()}}
                           
                                <div class="form-group ">
                                    <label>Consumer Name</label>
                                    <input type="text" name="consumername"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>NIC</label>
                                    <input type="text" name="nic"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>E mail</label>
                                    <input type="text" name="email"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="Address"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Total due amount</label>
                                    <input type="text" name="totaldueamount"  class="form-control">
                                </div>

                                
                                <button type="submit" class="btn btn-success">Add</button>
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