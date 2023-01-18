@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('update.category') }}">
                @csrf
                <h2 class="text-primary">Update Category</h2>
                <div class="form-outline">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" name="category_id" value="{{ $category->category_id }}" readonly/>
                </div>
                <div class="form-outline">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"/>
                </div>
               <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>

            </form>
        </div>
    </div>
@endsection
