<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles & Permissions | LMS</title>
    <?= $this->include('common/head') ?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header') ?>
        

        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold">Roles & Permissions</h6>
                        <p class="text-muted mb-0">Manage user access levels</p>
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_role_modal">
                            <i class="isax isax-add-circle me-2"></i>Add New Role
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Permissions Granted</th>
                                        <th>Active Users</th>
                                        <th>Created Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                            <h6 class="fw-bold text-primary">Super Admin</h6>
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success">All Access</span>
                                        </td>
                                        <td>1 User</td>
                                        <td>01 Jan 2025</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-light disabled"><i class="isax isax-lock"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h6 class="fw-bold text-dark">Sales Manager</h6>
                                        </td>
                                        <td>
                                            <span class="badge bg-light border text-muted">View Leads</span>
                                            <span class="badge bg-light border text-muted">Assign Agents</span>
                                            <span class="badge bg-light border text-muted">View Reports</span>
                                        </td>
                                        <td>2 Users</td>
                                        <td>10 Jan 2026</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-icon"><i class="isax isax-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger-subtle btn-icon"><i class="isax isax-trash"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h6 class="fw-bold text-dark">Sales Agent</h6>
                                        </td>
                                        <td>
                                            <span class="badge bg-light border text-muted">Add Leads</span>
                                            <span class="badge bg-light border text-muted">Own Leads View</span>
                                        </td>
                                        <td>15 Users</td>
                                        <td>12 Jan 2026</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-icon"><i class="isax isax-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger-subtle btn-icon"><i class="isax isax-trash"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <?= $this->include('common/footer') ?>
        </div>
    </div>

    <div id="add_role_modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="save_role.php" method="POST">
                    <div class="modal-body">
                        
                        <div class="mb-4">
                            <label class="form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" name="role_name" class="form-control" placeholder="Ex: Tele-Caller, Support Staff" required>
                        </div>

                        <h6 class="fw-bold mb-3">Assign Permissions</h6>
                        <div class="table-responsive border rounded">
                            <table class="table table-striped mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="fw-semibold">Module</th>
                                        <th class="text-center">Read / View</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Leads Management</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[leads][read]" checked></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[leads][create]"></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[leads][edit]"></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[leads][delete]"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="fw-medium">Team / Agents</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[users][read]"></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[users][create]"></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[users][edit]"></td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[users][delete]"></td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">Reports & Analytics</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[reports][read]"></td>
                                        <td class="text-center text-muted">-</td>
                                        <td class="text-center text-muted">-</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[reports][export]"></td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">System Settings</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[settings][read]"></td>
                                        <td class="text-center text-muted">-</td>
                                        <td class="text-center"><input type="checkbox" class="form-check-input" name="perm[settings][edit]"></td>
                                        <td class="text-center text-muted">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('common/foot') ?>
</body>
</html>