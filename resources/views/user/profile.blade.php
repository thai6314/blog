<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
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
                <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home.user') }}">
                    <img
                        src="https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg"
                        height="35"
                        alt="MDB Logo"
                        loading="lazy"
                    />
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </li>
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
        </div>
    </nav>
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <h2 class="text-primary">Profile</h2>
                <div class="row border rounded"style="margin-top: 30px">
                    <div class="col-2 "><label class="form-label">Email</label></div>
                    <div class="col-6">
                        <span>{{ Auth::user()->email }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">First name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->first_name }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Last name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->last_name }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Gender</label>
                    </div>
                    <div class="col-6">
                        @if(Auth::user()->gender == '1')
                            <span>Male </span>
                        @elseif(Auth::user()->gender == '2')
                            <span>Female </span>
                        @else <span>Other </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Birth day</label>
                    </div>
                    <div class="col-6">
                        @if(isset(Auth::user()->birth_day))
                            <span>{{ Auth::user()->birth_day }} </span>
                        @else <span> </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Address</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->address }} </span>
                    </div>
                </div>
                <br>
                <div class="row border rounded">
                    <div class="col-2 border-right">
                        <label class="form-label">Avatar</label>
                    </div>
                    <div class="col-6">
                        @if( isset(Auth::user()->avatar ))
                            <img class="img-fluid" src="{{ Auth::user()->avatar }}" >
                        @else <span> </span>
                        @endif
                    </div>
                </div>
                <br>
                <a href="{{ route('edit.form.user') }}" class="btn btn-dark" role="button" aria-pressed="true">Edit</a>
                <br>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            document.getElementById('customFile').addEventListener('change', (e) => {
                console.log(e.target.files[0]);
                avatar.src = URL.createObjectURL(e.target.files[0]);
            })

            function preview() {
                console.log(event.target.files[0]);
                avatar.src = URL.createObjectURL(event.target.files[0]);
            }

            function clearImage() {
                document.getElementById('customFile').value = null;
                avatar.src = "";
            }
        </script>
    </div>
</body>
</html>
