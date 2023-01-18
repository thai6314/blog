@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('add.category') }}">
                @csrf
                <h2 class="text-primary">Add Category</h2>
                <div class="form-outline">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>

            </form>
        </div>
    </div>
@endsection
