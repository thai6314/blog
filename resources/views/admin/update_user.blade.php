@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('update.user') }}">
                @csrf
                <h2 class="text-primary">Update User</h2>
                <div class="form-outline">
                    <label class="form-label">ID</label>
                    <input type="email" class="form-control" name="user_id" value="{{ $user->user_id }}" readonly/>
                </div>
                <div class="form-outline">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-outline">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"/>
                    @if ($errors->has('first_name'))
                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"/>
                    @if ($errors->has('last_name'))
                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Birth day</label>
                    <input type="text" class="form-control" name="birth_day" placeholder="yyyy-mm-dd" min="1930-01-01"
                           value="{{ $user->birth_day }}"/>
                    @if ($errors->has('birth_day'))
                        <p class="text-danger">{{ $errors->first('birth_day') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        @if ($user->gender == '1')
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1" value="1"
                                   checked>
                        @else
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($user->gender == '2')
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" value="2"
                                   checked>
                        @else
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($user->gender == '3')
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3" value="3"
                                   checked>
                        @else
                            <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault2">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-outline">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"
                                  name="address">{{ $user->address }}</textarea>
                    </div>
                </div>
                <div class="form-outline">
                    <label class="form-label">Role</label>
                    <div class="form-check">
                        @if($user->role == '3')
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault1" value="3"
                                   checked>
                        @else
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault1" value="3">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault1">
                            Manager
                        </label>
                    </div>
                    <div class="form-check">
                        @if($user->role == '1')
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault2" value="1"
                                   checked>
                        @else
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault1" value="1">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault2">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        @if($user->role == '2')
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault2" value="2"
                                   checked>
                        @else
                            <input class="form-check-input" name="role" type="radio" id="flexRadioDefault1" value="2">
                        @endif
                        <label class="form-check-label" for="flexRadioDefault3">
                            User
                        </label>
                    </div>
                </div>
                <div class="form-outline">
                    <label class="form-label" for="customFile">Avatar</label>
                    <input type="file" class="form-control" id="customFile" name="avatar"/><br>
                    <img src="{{ $user->avatar }}" alt="" id="avatar" class="img-fluid"
                         style="width: 300px; height: 180px">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>

            </form>
        </div>
    </div>
@endsection
