<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="{{ asset('css/post/list_post.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<div class="menu">
    <ul class="menu-items">
        <li class="menu-item"><a class="menu-item-link" href="{{ route('profile.admin') }}">Profile</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.category') }}">Categories</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item" style="background-color: darksalmon"><a class="menu-item-link" href="{{ route('list.user') }}">Users</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.comment.admin') }}">Comment</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('logout') }}">Logout</a></li>
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
    <div class="content" >
        <table class="table">
            <h2>List User</h2>
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Birth day</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">
                    <a href="{{ route('add.user.form') }}" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">New</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td><img src="{{ $user->avatar }} "
                             class="rounded-circle"
                             height="60"
                             loading="lazy"/>
                    </td>
                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td>{{ $user->birth_day }}</td>
                    @if($user->gender == '1')
                        <td>Male</td>
                    @elseif($user->gender == '2')
                        <td>Female</td>
                    @else
                        <td>Other</td>
                    @endif
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href="{{ route('update.user.form', ['id'=>$user->user_id]) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Update</a>
                        <a href="{{ route('delete.user', ['id'=>$user->user_id]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
