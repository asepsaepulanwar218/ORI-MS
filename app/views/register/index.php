<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

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

                            <form class="row g-2 needs-validation" novalidate action="<?= BASEURL; ?>/register/tambah" method="post">
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nama Awal</label>
                                    <input type="text" name="firstName" class="form-control" id="yourFirstName" required autocomplete="off">
                                    <div class="invalid-feedback">Nama awal harus diisi!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nama Akhir</label>
                                    <input type="text" name="lastName" class="form-control" id="yourLastName" required autocomplete="off">
                                    <div class="invalid-feedback">Nama akhir harus diisi!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required autocomplete="off">
                                    <div class="fs-6 text-danger checkEmail visually-hidden">email sudah terdaftar!</div>
                                    <div class="invalid-feedback">Email harus diisi!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" class="form-control" id="yourUsername" required autocomplete="off">
                                        <div class="invalid-feedback">Username harus diisi!</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required autocomplete="off">
                                    <div class="invalid-feedback">Password harus diisi!</div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100  register" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>