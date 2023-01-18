@extends('index')
@section('main')
<div class="container" style="margin-top: 30px">
    <table class="table">
        <h2>List Category</h2>
        <thead class="thead-dark">
        <tr class="col">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr class="col">
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('update.category.form', ['id'=>$category->category_id]) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Update</a>
                <a href="{{ route('delete.category', ['id'=>$category->category_id]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('add.category.form') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">New Category</a>
</div>
@endsection
