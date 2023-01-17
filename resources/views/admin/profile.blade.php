@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <h2 class="text-primary">Profile</h2>
                <div class="row border rounded"style="margin-top: 30px">
                    <div class="col-2 "><label class="form-label">Email</label></div>
                    <div class="col-6">
                        <span>{{ Auth::user()->email }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">First name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->first_name }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Last name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->last_name }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Gender</label>
                    </div>
                    <div class="col-6">
                        @if(Auth::user()->gender == '1')
                            <span>Nam </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Birth day</label>
                    </div>
                    <div class="col-6">
                        @if(isset(Auth::user()->birth_day))
                            <span>{{ Auth::user()->birth_day }} </span>
                            @else <span> </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Address</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->address }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Avatar</label>
                    </div>
                    <div class="col-6">
                        @if( isset(Auth::user()->avatar ))
                            <img src="{{ Auth::user()->avatar }}" >
                            @else <span> </span>
                        @endif
                    </div>
                </div>
                <br>
                <a href="{{ route('edit.form') }}" class="btn btn-dark" role="button" aria-pressed="true">Edit</a>
                <br>
            </div>
        </div>
@endsection
