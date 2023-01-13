@include('layouts/header')
<div class="container-lg">
    <div class="row">
    <div class="col-4"></div>
        <form class="col-4 border rounded" method="post" action="register">
            <h2 class="text-primary">Register</h2>
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <div class="form-outline">
                <label class="form-label">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>

            <div class="form-outline">
                <label class="form-label">First name</label>
                <input type="text" id="form2Example1" class="form-control" name="first_name" />
            </div>
            <div class="form-outline">
                <label class="form-label">Last name</label>
                <input type="text" id="form2Example1" class="form-control" name="last_name" />
            </div>
            <div class="form-outline">
                <label class="form-label">Birth day</label>
                <input type="text" id="form2Example1" class="form-control" name="birth_day" />
            </div>
            <div class="form-outline">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-outline">
                <label class="form-label">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button><br>
            <a href="#!">Login</a>
    </div>

    </form>
</div>
</div>
@include('layouts/footer')
