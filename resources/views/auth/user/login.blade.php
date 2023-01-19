@extends('index')
@section('main')
<div class="container-lg" style="margin-top: 30px">
    <div class="row">
        <div class="col-4"></div>
        <form class="col-4 border rounded" method="post" action="{{ route('login.user') }}">
            @csrf
            <h2 class="text-primary">Login</h2>
            @if (Session::has('message'))
                <div class="alert alert-success">
                        <h4>{{ Session::get('message') }}</h4>
                </div>
            @endif
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <div class="form-outline">
                <label class="form-label">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>
            <br>
            <div class="form-outline">
                <a href="#!">Forgot password?</a>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
            <br>
            <a href="{{ route('register.user.form') }}">Register</a>
        </form>
    </div>
</div>
@endsection
