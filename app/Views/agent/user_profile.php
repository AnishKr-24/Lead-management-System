<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?= base_url(); ?>/">
    <title>User Profile | LMS</title>
    <?= $this->include('common/head') ?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header') ?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h6 class="fs-18 fw-bold">User Profile</h6>
                        <p class="text-muted mb-0">View full details of team member</p>
                    </div>
                    <a href="<?= base_url('user'); ?>" class="btn btn-light btn-sm">
                        <i class="isax isax-arrow-left-2 me-1"></i>Back to List
                    </a>
                </div>

                <div class="row">

                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="mb-3">
                                    <span
                                        class="avatar avatar-xxl rounded-circle bg-primary-subtle text-primary fw-bold">
                                        <?php if (!empty($user->profile_image) && file_exists('uploads/users/' . $user->profile_image)): ?>
                                        <img src="<?= base_url('uploads/users/' . $user->profile_image); ?>"
                                            alt="Profile" class="rounded-circle"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                        <?php else: ?>
                                        <span class="fs-24"><?= strtoupper(substr($user->user_name, 0, 2)); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </div>

                                <h5 class="mb-1"><?= $user->user_name; ?></h5>
                                <p class="text-muted mb-2"><?= $user->role; ?></p>

                                <div class="badge bg-soft-success text-success mb-3">
                                    <?= $user->status; ?>
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="mailto:<?= $user->email_address; ?>" class="btn btn-primary btn-sm">
                                        <i class="isax isax-message me-1"></i>Email
                                    </a>
                                    <a href="tel:<?= $user->phone; ?>" class="btn btn-success btn-sm">
                                        <i class="isax isax-call me-1"></i>Call
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Personal Details</h6>

                                <a href="javascript:void(0);" class="btn btn-sm btn-light btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#edit_user_modal" onclick="loadUserData(
                                            '<?= $user->id; ?>', 
                                            '<?= $user->user_name; ?>', 
                                            '<?= $user->email_address; ?>', 
                                            '<?= $user->phone; ?>', 
                                            '<?= $user->role; ?>'
                                    )">
                                    <i class="isax isax-edit"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Full Name</label>
                                        <p class="fw-medium text-dark fs-15"><?= $user->user_name; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Email Address</label>
                                        <p class="fw-medium text-dark fs-15"><?= $user->email_address; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Phone Number</label>
                                        <p class="fw-medium text-dark fs-15">+91 <?= $user->phone; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Role / Position</label>
                                        <p class="fw-medium text-dark fs-15"><?= $user->role; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Account Status</label>
                                        <p class="fw-medium text-dark fs-15"><?= $user->status; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Joining Date</label>
                                        <p class="fw-medium text-dark fs-15">
                                            12 Jan 2026, 10:00 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?= $this->include('common/footer') ?>
        </div>
    </div>
    <?= $this->include('common/foot') ?>



    <div id="edit_user_modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="<?= base_url('update-user'); ?>" method="POST" class="form_submit"
                    enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="user_id" id="edit_user_id">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" id="edit_phone" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" id="edit_role" class="form-select">
                                <option value="Agent">Agent</option>
                                <option value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>