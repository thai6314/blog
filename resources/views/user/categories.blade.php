@extends('user.home')
@section('categories')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                    src="https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg"
                    height="15"
                    alt="MDB Logo"
                    loading="lazy"
                />
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list.posts', ['category_id'=> $category->category_id]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center">
            <!-- Avatar -->
            <div>
                <img
                    @if(Auth::user() !== null)
                        src="{{ Auth::user()->avatar }}"
                    @endif
                    class="rounded-circle"
                    height="40"
                    loading="lazy"
                />
                </a>
            </div>
        </div>
        <div class="d-flex ">
            @if(Auth::user() !== null)
                <span style="font-size: 24px">{{ Auth::user()->first_name . '.' . Auth::user()->last_name }}</span>
            @endif

        </div>
</nav>
<div class="container" style="margin-top: 30px">
    @foreach($categories as $category)
        @if($category->category_id == $posts[0]->category_id)
            <h2>{{ $category->name }}</h2>
        @endif
    @endforeach
    @foreach($posts as $post)
        <div class="border rounded">
            <div class="row">
                <div class="col-4"style="width: 30%; height: 10%;">
                    <img src="{{ $post->photo }}" class="card-img-top" />
                </div>
                <div class="col-4">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div><br>
            <div class="row">
                @if($comment !== null)
                    <p class="fs-3">{{ $comment }}</p>
                @endif
            </div>
            <div class="row-sm">
                <form method="post" action="{{ route('comment.user',) }}">
                    <div class="col">
                        <input type="text" id="form2Example1" class="form-control" name="comment" placeholder="Enter comment..."/>
                        @if ($errors->has('comment'))
                            <p class="text-danger">{{ $errors->first('comment') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-secondary">Comment</button>
                </form>
            </div>
        </div><br><br>
    @endforeach
</div>
@endsection

<!-- Navbar https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg -->
