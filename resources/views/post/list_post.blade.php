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
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
                        height="35"
                        alt="MDB Logo"
                        loading="lazy"
                    />
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list.category') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list.post') }}">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list.user') }}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.admin') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
    
            <div class="d-flex align-items-center">
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
        </div>
    </nav>
    <div class="container d-flex flex-column" style="margin-top: 5%">
        <h2>List Post</h2><a href="{{ route('add.post') }}" class="btn btn-primary" style="width: 20%">New Post</a><br><br>
        @foreach($posts as $post)
            <div class="card-sm d-flex mt-2 border rounded">
                <img src="{{ $post->photo }}" class="card-img-top" style="width: 30%; height: 10%"/>
                <div class="card-body">
                    <a href="{{ route('detail.post', ['id'=>$post->post_id]) }}"> <h5 class="cart-title">{{ $post->title }}</h5></a>
                    <p class="card-text txt-content">{{ $post->content }}</p>
                    <a href="{{ route('update.post.form', ['id'=>$post->post_id]) }}" class="btn btn-primary">Update</a>
                    <a href="{{ route('delete.post', ['id'=>$post->post_id]) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
    <footer class="text-center d-flex flex-column" >
        <section class=" border-bottom" >
            <div>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Company
                        </h6>
                        <p>
                            VTI
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Technology
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">PHP Language</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel Framework</a>
                        </p>
                    </div>
    
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Address
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Floor 3A, 3A Building</a>
                        </p>
                    </div>
    
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            thai.daovan@vti.com.vn
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                    </div>
                </div>
            </div>
        </section>
    
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="#">Dao Van Thai</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>
</html>
