@include('layouts/header')
<div class="container-lg">
    <div class="row">
        <div class="col-3"></div>
        <form class="col-6 border rounded" method="post" action="register">
            <h2 class="text-primary">Add User</h2>
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" />
            </div>

            <div class="form-outline">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" />
            </div>

            <div class="form-outline">
                <label class="form-label">First name</label>
                <input type="text"  class="form-control" name="first_name" />
            </div>
            <div class="form-outline">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" />
            </div>
            <div class="form-outline">
                <label class="form-label">Birth day</label>
                <input type="text" class="form-control" name="birth_day" />
            </div>
            <div class="form-outline">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-outline">
                <label class="form-label">Address</label>
                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Rounded corners</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
                </div>
            </div>
            <div class="form-outline">
                <label class="form-label">Role</label>
                <div class="form-check">
                    <input class="form-check-input" name="role" type="radio" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Manager
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="role" type="radio" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="role" type="radio" id="flexRadioDefault3" checked>
                    <label class="form-check-label" for="flexRadioDefault3">
                        User
                    </label>
                </div>
            </div>
            <div class="form-outline">
                <label class="form-label" for="customFile">Avatar</label>
                <input type="file" class="form-control" id="customFile" />
                <!--img preview-->
                <img src="" alt="" id="avatar" class="img-fluid">
            </div><br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>
            <br>
            <a href="#!">List user</a>
    </div>

    </form>
</div>
</div>
@include('layouts/footer')
