@extends('layouts.default')
@section('content')
    <h2>Customer Login Form</h2>
    <h6><a href="{{route('user.register')}}" class="underline text-gray-900 dark:text-white">Register</a></h6>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ route('user.postLogin') }}" method="post">
        @csrf
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
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
