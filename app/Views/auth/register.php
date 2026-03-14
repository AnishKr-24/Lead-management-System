<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | LMS</title>

    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper auth-bg">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto">
                <div class="col-lg-4 mx-auto">

                    <form action="<?= base_url('register'); ?>" method="POST" class="form_submit">
                        <div class="d-flex flex-column justify-content-center p-4">

                            <div class="card border-0 card-animated p-4 shadow-lg" >
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Sign Up</h5>
                                        <p class="mb-0">Create your new account</p>
                                    </div>

                                    <?php if(session()->getFlashdata('msg')): ?>
                                    <div class="alert alert-danger text-center">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0"><i
                                                    class="isax isax-user"></i></span>
                                            <input type="text" name="name" class="form-control border-start-0 ps-0"
                                                placeholder="Enter Full Name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0"><i
                                                    class="isax isax-sms-notification"></i></span>
                                            <input type="email" name="email" class="form-control border-start-0 ps-0"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0"><i
                                                    class="isax isax-lock"></i></span>
                                            <input type="password" name="password"
                                                class="form-control border-start-0 ps-0" placeholder="******" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0"><i
                                                    class="isax isax-lock"></i></span>
                                            <input type="password" name="conf_password"
                                                class="form-control border-start-0 ps-0" placeholder="******" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-2" id="remember_me" type="checkbox">
                                            <label for="remember_me" class="form-check-label mb-0">
                                                I agree to the
                                                <a href="#" class="text-decoration-underline ms-1">Terms of Service</a>
                                                and
                                                <a href="#" class="text-decoration-underline ms-1">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100 fw-bold">Sign Up</button>
                                    </div>

                                    <div class="text-center">
                                        <h6 class="fw-normal fs-14 text-dark mb-0">Already have an account?
                                            <a href="<?= base_url('login'); ?>"
                                                class="text-primary fw-bold text-decoration-none">Login</a>
                                        </h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>