@extends('index')
@section('main')
<div class="container" style="margin-top: 5rem">
    <table class="table">
        <h2>List Category</h2>
        <thead class="thead-dark">
        <tr class="row">
            <th class="col-4">ID</th>
            <th class="col-4">Name</th>
            <th class="col-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr class="row">
            <td class="col-4">{{ $category->category_id }}</td>
            <td class="col-4">{{ $category->name }}</td>
            <td class="col-2">
                <a href="{{ route('update.category.form', ['id'=>$category->category_id]) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Update</a>
                <a href="{{ route('delete.category', ['id'=>$category->category_id]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <a href="{{ route('add.category.form') }}" class="btn btn-secondary btn-sm col-3" role="button" aria-pressed="true">New Category</a>
    </div>
</div>
@endsection
