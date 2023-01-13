@include('layouts/header')
<div class="container-lg">
    <div class="row">
    <div class="col-4"></div>
        <form class="col-4 border rounded" method="post" action="">
            <h2 class="text-primary">Change Password</h2>
            <div class="form-outline">
                <label class="form-label">New password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>
            <div class="form-outline">
                <label class="form-label">Confirm password</label>
                <input type="password" id="form2Example2" class="form-control" name="confirm_password" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Change</button>
        </form>
    </div>

    </form>
</div>
</div>
@include('layouts/footer')
