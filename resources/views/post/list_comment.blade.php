<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="{{ asset('css/post/list_post.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/comment/active_comment.js') }}"></script>
    <title>Blog</title>
</head>
<body>
<div class="menu fixed">
    <ul class="menu-items">
        <li class="menu-item"><a class="menu-item-link" href="{{ route('profile.admin') }}">Profile</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.category') }}">Categories</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.user') }}">Users</a></li>
        <li class="menu-item"  style="background-color: darksalmon"><a class="menu-item-link" href="{{ route('list.comment.admin') }}">Comment</a></li>
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
                <th scope="col">User</th>
                <th scope="col">Post title</th>
                <th scope="col">Comment</th>
                <th scope="col">Comment time</th>
                <th scope="col">Status</th>
                <th scope="col">Detail</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment['comment_id'] }}</th>
                    <td>{{ $comment['user']['first_name'] . $comment['user']['last_name'] }}</td>
                    <td>{{ $comment['post']['title'] }}</td>
                    <td> <div class="txt-content">{{ $comment['comment'] }}</div></td>
                    <td>{{ $comment['comment_time'] }}</td>
                    @if( $comment['status'] == '1')
                        <td>
                            <a class="btn btn-secondary btn-sm"  role="button" aria-pressed="false">Actived</a>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-info btn-sm active btn_active" data-comment_id="{{ $comment['comment_id'] }}" role="button" aria-pressed="true">Active</a>
                        </td>
                    @endif
                    <td>
                        <a href="#">Link</a>
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
