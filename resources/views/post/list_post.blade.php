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
        <li class="menu-item" style="background-color: darksalmon"><a class="menu-item-link" href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item"><a class="menu-item-link" href="#">Comment</a></li>
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
    <div class="content">
        <div class="search-box border rounded">
            <div class="search-box_title">
                <label>Title</label>
                <input type="text" placeholder="Enter title..." name="txt_title">
            </div>
            <div class="search-box_author">
                <label>Auth</label>
                <input type="text" placeholder="Enter author..." name="txt_author">
            </div>
            <div class="search-box_btn_search">
                <a class="btn btn-info btn-sm"> Search</a>
            </div>
        </div>

        <table class="table" >
            <h2>List of Posts</h2>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Content</th>
                <th scope="col">Post time</th>
                <th scope="col"><a href="{{ route('add.post') }}">New</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post['post_id'] }}</th>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['category']['name'] }}</td>
                    <td>{{ $post['user']['first_name'] . $post['user']['last_name'] }}</td>
                    <td><div class="txt-content">{{ $post['content'] }}</div></td>
                    <td>{{ $post['post_time'] }}</td>
                    <td>
                        <a href="{{ route('update.post.form', ['id'=>$post['post_id']]) }}" class="btn btn-info btn-sm active"  role="button" aria-pressed="true">Update</a>
                        <a href="{{ route('delete.post', ['id'=>$post['post_id']]) }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>
</html>
