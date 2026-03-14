<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Leads | LMS</title>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <?= $this->include('common/head') ?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header') ?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <div>
                        <h6 class="fs-18 fw-bold">All Leads List</h6>
                        <p class="text-muted mb-0">Manage and track your customer leads</p>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">



                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="text-muted mb-0">Track and manage your potential business leads.</p>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm d-flex align-items-center"
                                        onclick="window.location.href='<?= base_url('new-lead'); ?>'">
                                        <i class="isax isax-add-circle me-2"></i> Add New Lead
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover border mb-0" id="leadsTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width:40px;">
                                                    <input type="checkbox" id="selectAll">
                                                </th>
                                                <th>Lead Name</th>
                                                <th>Contact Info</th>
                                                <th>Source</th>
                                                <th>Assigned To</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (!empty($leads)): ?>
                                            <?php foreach ($leads as $lead): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="lead-checkbox"
                                                        value="<?= $lead->id; ?>">
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-primary-subtle text-primary fw-bold me-2">
                                                            <?= strtoupper(substr($lead->first_name, 0, 1) . substr($lead->last_name, 0, 1)); ?>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">
                                                                <a href="<?= base_url('lead-detail/' . $lead->id); ?>">
                                                                    <?= $lead->first_name . ' ' . $lead->last_name; ?>
                                                                </a>
                                                            </h6>
                                                            <span
                                                                class="fs-12 text-muted"><?= $lead->city ?? 'N/A'; ?></span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-13">
                                                            <i class="isax isax-call me-1"></i>+91
                                                            <?= $lead->mobile_no; ?>
                                                        </span>
                                                        <span class="fs-12 text-muted">
                                                            <i
                                                                class="isax isax-message me-1"></i><?= $lead->email_address; ?>
                                                        </span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <?php
                                                    $source_badge = 'bg-secondary';
                                                    if ($lead->lead_source == 'Facebook')
                                                        $source_badge = 'bg-primary';
                                                    elseif ($lead->lead_source == 'Google')
                                                        $source_badge = 'bg-danger';
                                                    elseif ($lead->lead_source == 'Website')
                                                        $source_badge = 'bg-info';
                                                    ?>
                                                    <span
                                                        class="badge <?= $source_badge; ?> text-white"><?= $lead->lead_source; ?></span>
                                                </td>

                                                <td><?= $lead->updated_by; ?></td>

                                                <td>
                                                    <?php
                                                    $status_badge = 'bg-secondary';
                                                    if ($lead->lead_status == 'New')
                                                        $status_badge = 'bg-info';
                                                    elseif ($lead->lead_status == 'Won')
                                                        $status_badge = 'bg-success';
                                                    elseif ($lead->lead_status == 'Lost')
                                                        $status_badge = 'bg-danger';
                                                    elseif ($lead->lead_status == 'Contacted')
                                                        $status_badge = 'bg-warning';
                                                    ?>
                                                    <span
                                                        class="badge <?= $status_badge; ?> text-white"><?= $lead->lead_status; ?></span>
                                                </td>

                                                <td>
                                                    <?php if (!empty($lead->created_at)): ?>
                                                    <div class="d-flex flex-column">
                                                        <span><?= date('d M Y', strtotime($lead->created_at)); ?></span>
                                                        <small class="text-muted">
                                                            <?= date('h:i A', strtotime($lead->created_at)); ?>
                                                        </small>
                                                    </div>
                                                    <?php else: ?>
                                                    —
                                                    <?php endif; ?>
                                                </td>


                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="<?= base_url('lead-detail/' . $lead->id); ?>"
                                                            class="btn btn-sm btn-info-subtle btn-icon"
                                                            title="View Lead">
                                                            <i class="isax isax-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center py-4">
                                                    <img src="assets/img/icons/no-data.svg" alt="No Data"
                                                        style="width: 50px; opacity: 0.5;">
                                                    <p class="text-muted mt-2">No Leads Found. Add a new lead to get
                                                        started.</p>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <p class="text-muted mb-0">Showing 1 to 3 of 50 entries</p>
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
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
</body>






<script>
function loadLeadData(id, name, phone, email, status, source, city) {
    document.getElementById('edit_lead_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_phone').value = phone;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_source').value = source;
    document.getElementById('edit_city').value = city;
}
</script>

</html>