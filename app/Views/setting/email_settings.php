<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Settings | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">
        <?= $this->include('common/header')?>
       

        <div class="page-wrapper">
            <div class="content">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fs-18 fw-bold">Email Configuration (SMTP)</h6>
                </div>

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form action="save_email.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Mail Driver</label>
                                            <select class="form-select">
                                                <option value="smtp" selected>SMTP</option>
                                                <option value="phpmail">PHP Mail</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">SMTP Host</label>
                                            <input type="text" name="smtp_host" class="form-control"
                                                placeholder="smtp.gmail.com">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">SMTP Port</label>
                                            <input type="text" name="smtp_port" class="form-control" placeholder="587">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">SMTP Username (Email)</label>
                                            <input type="email" name="smtp_user" class="form-control"
                                                placeholder="your-email@gmail.com">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">SMTP Password</label>
                                            <input type="password" name="smtp_pass" class="form-control"
                                                placeholder="App Password">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">From Name</label>
                                            <input type="text" name="from_name" class="form-control"
                                                placeholder="LMS Admin">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Encryption</label>
                                            <select name="encryption" class="form-select">
                                                <option value="tls">TLS</option>
                                                <option value="ssl">SSL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-outline-info">Test Connection</button>
                                        <button type="submit" class="btn btn-primary">Save Configuration</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?= $this->include('common/footer')?>
        </div>
    </div>
    <?= $this->include('common/foot')?>
</body>

</html>