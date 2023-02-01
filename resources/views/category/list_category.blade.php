<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="{{ asset('css/admin/profile.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<div class="menu">
    <ul class="menu-items">
        <li class="menu-item"><a href="{{ route('profile.admin') }}">Profile</a></li>
        <li class="menu-item"><a href="{{ route('list.category') }}">Categories</a></li>
        <li class="menu-item"><a href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item"><a href="#">Comment</a></li>
        <li class="menu-item"><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
<div class="nav-content">
    <div class="nav">
        <ul class="nav-items">
            <li class="nav-item">
                <img
                    @if(Auth::user() !== null)
                        src="{{ Auth::user()->avatar }}"
                    @endif
                    class="rounded-circle"
                    height="30"
                    loading="lazy"
                />
            </li>
            <li class="nav-item">
                @if(Auth::user() !== null)
                    <span style="font-size: 20px">{{ Auth::user()->first_name . '.' . Auth::user()->last_name }}</span>
                @endif
            </li>
        </ul>
    </div>
    <div class="content" style="margin-left: 100px">
        <table class="table" >
            <h2>List Category</h2>
            <thead class="thead-dark">
            <tr class="row">
                <th class="col-3">ID</th>
                <th class="col-3">Name</th>
                <th class="col-2"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr class="row">
                <td class="col-3">{{ $category->category_id }}</td>
                <td class="col-3">{{ $category->name }}</td>
                <td class="col-2">
                    <a href="{{ route('update.category.form', ['id'=>$category->category_id]) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Update</a>
                    <a href="{{ route('delete.category', ['id'=>$category->category_id]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <a href="{{ route('add.category.form') }}" class="btn btn-secondary btn-lg col-3" role="button" aria-pressed="true">New Category</a>
        </div>
    </div>
</div>
</body>
</html>

