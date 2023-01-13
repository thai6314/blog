@include('layouts/header')
<div class="container-lg">
    <div class="row">
        <div class="col-4"></div>
        <form class="col-4 border rounded" method="post" action="">
            <h2 class="text-primary">Login</h2>
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <div class="form-outline">
                <label class="form-label">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>
            <div class="form-outline">
                <a href="#!">Forgot password?</a>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
            <br>
            <a href="#!">Register</a>
    </div>

    </form>
</div>
</div>
@include('layouts/footer')
