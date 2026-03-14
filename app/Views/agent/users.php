<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header')?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <div>
                        <h6 class="fs-18 fw-bold">User Management</h6>
                        <p class="text-muted mb-0">Manage your team members (Agents & Admins)</p>
                    </div>

                    <div class="d-flex align-items-center gap-2 user-filter-box">
                        <input type="date" class="form-control form-control-sm filter-input">

                        <input type="date" class="form-control form-control-sm filter-input">

                        <select class="form-select form-select-sm filter-input">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                        <button class="btn btn-success btn-sm px-3">GET DATE</button>
                        <button class="btn btn-danger btn-sm px-3">RESET</button>


                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <p class="text-muted mb-0">Control system access by managing user profiles and
                                    permissions.</p>
                            </div>
                            <button class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal"
                                data-bs-target="#add_user_modal">
                                <i class="isax isax-add-circle me-1"></i> Add User
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email / Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($users)): ?>
                                    <?php foreach($users as $user): ?>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-primary-subtle text-primary fw-bold me-2">

                                                    <?php if(!empty($user->profile_image) && file_exists('uploads/users/'.$user->profile_image)): ?>
                                                    <img src="<?= base_url('uploads/users/'.$user->profile_image); ?>"
                                                        alt="Img" class="rounded-circle"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                    <?php else: ?>
                                                    <?= strtoupper(substr($user->user_name, 0, 1)); ?>
                                                    <?php endif; ?>

                                                </span>
                                                <h6 class="fs-14 fw-medium mb-0"><?= $user->user_name; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-13"><?= $user->email_address; ?></span>
                                                <span class="fs-12 text-muted"><?= $user->phone; ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($user->role == 'Admin'): ?>
                                            <span class="badge bg-soft-danger text-danger">Admin</span>
                                            <?php else: ?>
                                            <span class="badge bg-soft-info text-info">Agent</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success text-white"><?= $user->status; ?></span>
                                        </td>
                                        <td class="text-end">
                                            

                                            <a href="<?= base_url('user-profile/'.$user->id); ?>"
                                                class="btn btn-sm btn-info-subtle btn-icon" title="View Details">
                                                <i class="isax isax-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No users found.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <?= $this->include('common/footer')?>
        </div>
    </div>

    <div id="add_user_modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('save-user'); ?>" method="POST" class="form_submit"
                    enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row align-items-center mb-1">

                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" >
                            </div>
                            <div class="col-md-6 text-center">
                                <label for="upload_image" class="profile-upload-container">
                                    <img src="assets/img/profiles/avatar-01.jpg" id="preview_img" class="rounded-circle"
                                        alt="Profile">

                                    <div class="image-overlay image-overlay-visible">
                                        <i class="isax isax-camera fs-18"></i>
                                    </div>
                                </label>
                                <input type="file" name="profile_image" id="upload_image" class="d-none"
                                    accept="image/*" onchange="loadFile(event)">
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Mobile" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="******"
                                    >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Type <span class="text-danger">*</span></label>
                                <select name="role" class="form-select">
                                    <option value="Agent">Agent</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    

    <?= $this->include('common/foot')?>
</body>


<script>
function loadUserData(id, name, email, phone, role) {
    document.getElementById('edit_user_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_phone').value = phone;
    document.getElementById('edit_role').value = role;
}

var loadFile = function(event) {
    var output = document.getElementById('preview_img');
    if (event.target.files.length > 0) {
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) 
        }
    }
};
</script>

</html>