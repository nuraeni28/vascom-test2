<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/login/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-white">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-primary text-center">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <h1 class="text-gray-900 mb-4">Vascomm</h1>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-4">Selamat Datang Admin</h1>
                                        <p style="font-size: 10px">Silahkan masukkan email atau nomor telepon dan
                                            password Anda untuk mulai menggunakan aplikasi</p>
                                    </div>
                                    <form class="user" action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">Email / Nomor Telepon</label>
                                                <input class="form-control" name="email" type="text" required=""
                                                    placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input class="form-control" name="password" type="password"
                                                    required="" placeholder="Masukkan Password">
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button
                                                    class="btn btn-primary btn-block btn-square waves-effect waves-light"
                                                    type="submit">Masuk</button>
                                            </div>
                                        </div>
                                        <hr>

                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/login/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/login/js/sb-admin-2.min.js"></script>

</body>

</html>
