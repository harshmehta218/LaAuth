@extends('layouts.default')
@section('content')
    <h2>Customer Register Form</h2>
    <h6><a href="{{route('home')}}" class="underline text-gray-900 dark:text-white">Home</a></h6>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ route('user.postRegister') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
            @if ($errors->has('firstname'))
                <span class="invalid feedback" style='color: red' role="alert">{{ $errors->first('firstname') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="text">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
            @if ($errors->has('lastname'))
                <span class="invalid feedback" style='color: red' role="alert">{{ $errors->first('lastname') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            @if ($errors->has('email'))
                <span class="invalid feedback" style='color: red' role="alert">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            @if ($errors->has('password'))
                <span class="invalid feedback" style='color: red' role="alert">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmpwd" placeholder="Enter Confirm Password"
                name="confirmpassword">
            @if ($errors->has('confirmpassword'))
                <span class="invalid feedback" style='color: red'
                    role="alert">{{ $errors->first('confirmpassword') }}</span>
            @endif
        </div>
        <div class="form-group">
            <a href="{{ route('user.login') }}">Already have register, please login here</a>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
