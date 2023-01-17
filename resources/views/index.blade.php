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
@include('layouts/header')
@yield('main')
@include('layouts/footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    document.getElementById('customFile').addEventListener('change', (e) => {
        console.log(e.target.files[0]);
        avatar.src = URL.createObjectURL(event.target.files[0]);
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
</body>
</html>
