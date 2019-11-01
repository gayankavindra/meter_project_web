@extends('layouts.master')


@section('title')
Add new Bill
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class=="card-header ">
              <br>
                  <h3 class="text-center">Add new Bill</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form method="post" action="/billhistory-save" >
                                
                             {{csrf_field()}}
                           
                                <div class="form-group ">
                                    <label>Account No</label>
                                    <input type="text" name="accountno"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Bill value</label>
                                    <input type="text" name="billvalue"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Month</label>
                                    <input type="text" name="month"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>NIC</label>
                                    <input type="text" name="nic"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact"  class="form-control">
                                </div>

                                
                                <button type="submit" class="btn btn-success">Add</button>
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