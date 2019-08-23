@extends('layouts.master')

@section('title')
    WELCOME
@endsection

@section('content')
@include('includes.massage-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-group">
                    <lable for="email">Your Email</lable>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <lable for="first_name">First Name</lable>
                    <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <lable for="password">Password</lable>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary"> Submit</button>
                {{ @csrf_field() }}
                <input type="hidden" name="_token" value="{{Session::token()}}" >
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sign IN</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group">
                    <lable for="email">Your Email</lable>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <lable for="password">Password</lable>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary"> Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}" >
            </form>
        </div>
    </div>
@endsection

