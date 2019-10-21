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
                  <h3 class="text-center">Edit Role for Registered User</h3>
              </div>
                <div class="card-body text-center">

                    <div class="row text-center">
                    <div class="col-md-6">
                    <img src="{{URL::to('assets/img/logo.png')}}">
                    </div>
                        <div class="col-md-6">
                            
                             <form action="/role-register-update/{{$users->id}}" method="POST">
                                
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group ">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{$users->name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{$users->phone}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{$users->email}}" class="form-control">
                                </div>

                                 <div class="form-group">
                                    <label>Give Role</label>
                                    <select name="usertype"  class="form-control">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="super admin">Super Admin</option>
                                        <option value="consumer">Consumer</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/role-register" class="btn btn-danger">Cancel</a>

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