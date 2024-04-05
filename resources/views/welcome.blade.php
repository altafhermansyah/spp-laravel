<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP - KU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3 shadow-sm" style="background-color: #E7DAD1">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SPP-KU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-medium" aria-current="page" href="#">NEWS</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class="btn btn-outline-primary fw-medium" href="{{ route('login') }}">Login</a>
                </form>
            </div>
        </div>
    </nav>

    {{-- <div class="tes">
        <img src="/img/s1.jpg" alt="sekolah" width="70%">
        <div class="text">tes</div>
    </div> --}}
    <div class="d-flex justify-content-center position-relative">
        <div class="content text-center mt-5 p-5">
            <div class="title position-absolute top-50 start-50 translate-middle bg-dark rounded p-4 bg-opacity-75 z-1">
                <h2 class="fw-bold">Yuk Bayar SPP Kamu Sekarang Juga</h2>
                <p class="fw-light fs-4">Kini bayar SPP dengan mudah, cepat, dan aman</p>
            </div>
            <div class="col opacity-75">
                <img src="/img/s1.jpg" class="img-fluid me-1 opacity-75 rounded" alt="sekolah" width="500px">
                <img src="/img/s2.jpg" class="img-fluid me-1 opacity-75 rounded" alt="sekolah" width="500px">
            </div>
            <div class="col opacity-75">
                <img src="/img/s3.jpg" class="img-fluid me-1 opacity-75 rounded" alt="sekolah" width="500px">
                <img src="/img/s1.jpg" class="img-fluid me-1 opacity-75 rounded" alt="sekolah" width="500px">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
