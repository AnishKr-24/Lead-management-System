<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | LMS Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->include('common/head')?>

    <style>
        span.vError {
            float: right;
            position: absolute;
            right: 0;
            top: -19px;
            font-size: 9px;
        }
    </style>

</head>

<body class="bg-white">

    <div class="main-wrapper auth-bg w-100">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-lg-4 mx-auto">

                    <form action="<?= base_url('auth-user'); ?>" method="POST" class="form_submit">

                        <div class="d-flex flex-column justify-content-center p-4">

                            <div class="card border-0 card-animated p-4 shadow-lg" >
                                <div class="card-body">

                                    <div class="text-center mb-3">
                                        <h5 class="mb-2 fw-bold">Sign In</h5>
                                        <p class="text-muted mb-0">Access to dashboard</p>
                                    </div>

                                    <?php if(session()->getFlashdata('msg')): ?>
                                    <div class="alert alert-danger text-center p-2">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0 bg-light"><i
                                                    class="isax isax-sms-notification"></i></span>
                                            <input type="text" name="loginid" class="form-control border-start-0 ps-0 bg-light"
                                                placeholder="admin@example.com">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0 bg-light"><i
                                                    class="isax isax-lock"></i></span>
                                            <input type="password" name="password"
                                                class="form-control border-start-0 ps-0 bg-light" placeholder="******"
                                                >
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" id="remember_me" type="checkbox">
                                            <label for="remember_me" class="form-check-label small">Remember Me</label>
                                        </div>
                                        <a href="javascript:void(0);" class="small text-primary fw-bold">Forgot
                                            Password?</a>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Sign
                                            In</button>
                                    </div>

                                    <div class="text-center">
                                        <p class="small text-muted mb-0">Don't have an account?
                                            <a href="<?= base_url('register'); ?>"
                                                class="text-primary fw-bold">Register</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?= $this->include('common/foot')?>

</body>

</html>