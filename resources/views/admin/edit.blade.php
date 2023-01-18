@extends('index')
@section('main')
<div class="container-lg" style="margin-top: 30px">
    <div class="row">
        <div class="col-3"></div>
        <form class="col-6 border rounded" method="post" action="{{ route('edit.profile') }}">
            @csrf
            <h2 class="text-primary">Edit profile</h2>
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="form-outline">
                <label class="form-label">First name</label>
                <input type="text"  class="form-control" name="first_name" value="{{ Auth::user()->first_name }}"/>
                @if ($errors->has('first_name'))
                <p class="text-danger">{{ $errors->first('first_name') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}"/>
                @if ($errors->has('last_name'))
                <p class="text-danger">{{ $errors->first('last_name') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Birth day</label>
                <input type="date" class="form-control" name="birth_day" placeholder="dd-mm-yyyy"  min="1930-01-01" value="{{ Auth::user()->birth_day }}">
                 @if ($errors->has('birth_day'))
                <p class="text-danger">{{ $errors->first('birth_day') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    @if (Auth::user()->gender == '1')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1" value ="1"checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    @if (Auth::user()->gender == '2')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" value="2" checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    @if (Auth::user()->gender == '3')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3" value="3" checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault2">
                        Other
                    </label>
                </div>
            </div>
            <div class="form-outline">
                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"name="address">{{ Auth::user()->address }}</textarea>
                </div>
            </div>

            <div class="form-outline">
                <label class="form-label" for="customFile">Avatar</label>
                <br>
                <img src="{{ Auth::user()->avatar }}" alt="" id="avatar" class="img-fluid">
                <br><br>
                <input type="file" class="form-control" id="customFile" name="avatar"/>

            </div><br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
            <br>
            <a href="#!">List user</a>
        </form>
    </div>
</div>
@endsection
