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
                    <div class="d-flex justify-content-center py-4">
                        <div href="index.html" class="logo d-flex align-items-center w-auto">
                            <span class="d-none d-lg-block text-primary">ORY-MS</span>
                        </div>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                <p class="text-center small">Office Inventory Management System</p>
                            </div>
                            <form class="row g-3 formLogin">
                                <div class="col-md-12">
                                    <label for="validationServerUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="username" required autocomplete="off">
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Username belum terdaftar!
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

                                <div class="col-12">
                                    <input class="btn btn-primary login" type="button" value="Login" readonly>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Belum punya akun? <a href="<?= BASEURL; ?>/register">Buat Akun</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>