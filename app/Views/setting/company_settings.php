<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Settings | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">
        <?= $this->include('common/header')?>
       

        <div class="page-wrapper">
            <div class="content">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fs-18 fw-bold">Company Profile</h6>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('setting/save_settings') ?>" method="POST" enctype="multipart/form-data">

                                    <div class="mb-4 text-center">
                                        <div class="avatar avatar-xxl rounded-circle bg-light border mb-2">
                                            <img src="assets/img/logo-small.svg" alt="Logo" class="img-fluid p-2">
                                        </div>
                                        <div>
                                            <label class="btn btn-sm btn-primary cursor-pointer">
                                                <i class="isax isax-camera me-1"></i> Change Logo
                                                <input type="file" name="logo" class="d-none">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="company_name" class="form-control" 
                                               value="<?= $settings['company_name'] ?? 'My LMS Company' ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Company Email</label>
                                            <input type="email" name="company_email" class="form-control"
                                                value="info@lms.com">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="company_phone" class="form-control"
                                                value="+91 9876543210">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Website URL</label>
                                            <input type="text" name="website" class="form-control"
                                                value="www.mylms.com">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control"
                                                rows="3">123, Tech Park, New Delhi, India</textarea>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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