<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-2">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo4.png" alt="">
                        </a>
                    </div><!-- End Logo -->
                    <div class="d-flex justify-content-center py-3">
                        <div href="index.html" class="logo d-flex align-items-center w-auto">
                            <span class="d-none d-lg-block text-primary">ORY-MS</span>
                        </div>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                                <p class="text-center small">Office Inventory Management System</p>
                            </div>
                            <form class="row g-3 formRegister" action="<?= BASEURL; ?>/register/tambah" method="post">
                                <div class="col-md-12">
                                    <label for="validationServer01" class="form-label">Nama Awal</label>
                                    <input type="text" class="form-control" id="validationServer01" aria-describedby="validationServer01Feedback" name="firstName" required autocomplete="off">
                                    <div id="validationServer01Feedback" class="valid-feedback">
                                        Please fill out this field!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer02" class="form-label">Nama Akhir</label>
                                    <input type="text" class="form-control" id="validationServer02" aria-describedby="validationServer02Feedback" name="lastName" required autocomplete="off">
                                    <div id="validationServer02Feedback" class="valid-feedback">
                                        Please fill out this field!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer03" class="form-label">Email</label>
                                    <input type="email" class="form-control " id="validationServer03" aria-describedby="validationServer03Feedback" name="email" required autocomplete="off">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Email sudah terdaftar!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServerUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="username" required autocomplete="off">
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Username sudah terdaftar!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer05" class="form-label">Password</label>
                                    <input type="password" class="form-control " id="validationServer05" aria-describedby="validationServer05Feedback" name="password" required autocomplete="off">
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please fill out this field!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer06" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control " id="validationServer06" aria-describedby="validationServer06Feedback" name="konfirmPassword" required autocomplete="off">
                                    <div id="validationServer06Feedback" class="invalid-feedback">
                                        Konfirmasi password tidak sesuai!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input class="btn btn-primary register" type="submit" value="Buat Akun" readonly>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Sudah punya akun? <a href="<?= BASEURL; ?>/login">Log in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>