<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lead Management Dashboard | LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lead Management System Dashboard">

    <?php include('common/head.php')?>
</head>

<body>
    <div class="main-wrapper">
        
        <?php include('common/header.php')?>
        

        <div class="page-wrapper">

            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold">Lead Management Dashboard</h6>
                        <p class="text-muted mb-0">Welcome back! Here is your lead summary.</p>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i>
                            <span class="reportrange-picker-field"><?= date('d M Y'); ?></span>
                        </div>
                        <a href="<?= base_url('new-lead'); ?>"
                            class="btn btn-primary d-flex align-items-center justify-content-center">
                            <i class="isax isax-add-circle me-2"></i>Add New Lead
                        </a>

                    </div>
                </div>
                <div class="bg-primary rounded welcome-wrap position-relative mb-3">
                    <div class="row">
                        <div class="col-lg-8 col-md-9 col-sm-7">
                            <div>
                                <h5 class="text-white mb-1">Hello, Admin 👋</h5>
                                <p class="text-white mb-2">You have <strong>5 Pending Follow-ups</strong> for today.</p>
                                <p class="text-white mb-3">Stay focused and prioritize high-intent leads to improve your
                                    conversion rate.</p>
                                <div class="d-flex align-items-center flex-wrap gap-3">
                                    <p class="d-flex align-items-center fs-13 text-white mb-0">
                                        <i class="isax isax-calendar5 me-1"></i><?= date('l, d M Y'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute end-0 top-50 translate-middle-y p-2 d-none d-sm-block">
                        <img src="assets/img/icons/dashboard.svg" alt="img">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Total Leads</p>
                                        <h4 class="fs-20 fw-bold mb-0">1,250</h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary">
                                        <i class="isax isax-people fs-24"></i>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span
                                        class="badge badge-soft-success border border-success-subtle text-success-emphasis">
                                        <i class="fa-solid fa-arrow-up me-1"></i>12% Increase
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">New Leads (Today)</p>
                                        <h4 class="fs-20 fw-bold mb-0">24</h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-info-subtle text-info">
                                        <i class="isax isax-user-add fs-24"></i>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span class="text-muted fs-13">Updated 5 min ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Pending Follow-ups</p>
                                        <h4 class="fs-20 fw-bold mb-0">8</h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning">
                                        <i class="isax isax-clock fs-24"></i>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span
                                        class="badge badge-soft-danger border border-danger-subtle text-danger-emphasis">
                                        Action Required
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Total Converted</p>
                                        <h4 class="fs-20 fw-bold mb-0">340</h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-success-subtle text-success">
                                        <i class="isax isax-verify fs-24"></i>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span
                                        class="badge badge-soft-success border border-success-subtle text-success-emphasis">
                                        <i class="fa-solid fa-check me-1"></i>High Performance
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Lead Growth Statistics</h6>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown">This Year</a>
                                    </div>
                                </div>
                                <div id="revenue_chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="mb-1">Top Lead Sources</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-borderless custom-table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-primary-subtle text-primary me-2">
                                                            <i class="fa-brands fa-facebook-f"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">Facebook Ads</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <h6 class="fs-14 fw-semibold">45 Leads</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-danger-subtle text-danger me-2">
                                                            <i class="fa-brands fa-google"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">Google Ads</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <h6 class="fs-14 fw-semibold">32 Leads</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-info-subtle text-info me-2">
                                                            <i class="fa-solid fa-globe"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">Website Organic</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <h6 class="fs-14 fw-semibold">20 Leads</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-warning-subtle text-warning me-2">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">Cold Calling</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <h6 class="fs-14 fw-semibold">15 Leads</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                    <h6 class="mb-1">Recent Leads</h6>
                                    <a href="<?= base_url('lead-list'); ?>" class="btn btn-primary btn-sm">
                                        View all Leads
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap border mb-0">
                                        <thead class="thead-light">
                                            <tr>
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
                                            <?php if(!empty($recent_leads)): ?>
                                            <?php $count = 0; ?>
                                            <?php foreach($recent_leads as $lead): ?>
                                            <?php if($count >= 5) break; ?>

                                            <tr>
                                                <!-- Lead Name -->
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="avatar avatar-sm rounded-circle bg-primary-subtle text-primary fw-bold me-2">
                                                            <?= strtoupper(
                                                                substr($lead->first_name,0,1) .
                                                                substr($lead->last_name,0,1)
                                                            ); ?>
                                                        </span>
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-0">
                                                                <a href="<?= base_url('lead-detail/'.$lead->id); ?>">
                                                                    <?= $lead->first_name.' '.$lead->last_name; ?>
                                                                </a>
                                                            </h6>
                                                            <span class="fs-12 text-muted">
                                                                <?= $lead->city ?? 'N/A'; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <!-- Contact -->
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-13">
                                                            <i class="isax isax-call me-1"></i> +91
                                                            <?= $lead->mobile_no; ?>
                                                        </span>
                                                        <span class="fs-12 text-muted">
                                                            <i class="isax isax-message me-1"></i>
                                                            <?= $lead->email_address; ?>
                                                        </span>
                                                    </div>
                                                </td>

                                                <!-- Source -->
                                                <td>
                                                    <?php
                                                        $source_badge = 'bg-secondary';
                                                        if($lead->lead_source == 'Facebook') $source_badge = 'bg-primary';
                                                        elseif($lead->lead_source == 'Google') $source_badge = 'bg-danger';
                                                        elseif($lead->lead_source == 'Website') $source_badge = 'bg-info';
                                                    ?>
                                                    <span class="badge <?= $source_badge; ?> text-white">
                                                        <?= $lead->lead_source ?? 'Website'; ?>
                                                    </span>
                                                </td>

                                                <!-- Assigned -->
                                                <td><?= $lead->updated_by ?? 'Admin'; ?></td>

                                                <!-- Status -->
                                                <td>
                                                    <?php
                                                        $status_badge = 'bg-secondary';
                                                        if($lead->lead_status == 'New') $status_badge = 'bg-info';
                                                        elseif($lead->lead_status == 'Won') $status_badge = 'bg-success';
                                                        elseif($lead->lead_status == 'Lost') $status_badge = 'bg-danger';
                                                        elseif($lead->lead_status == 'Contacted') $status_badge = 'bg-warning';
                                                    ?>
                                                    <span class="badge <?= $status_badge; ?> text-white">
                                                        <?= $lead->lead_status ?? 'New'; ?>
                                                    </span>
                                                </td>

                                                <!-- Created On -->
                                                
                                                <td>
                                                    <?php if(!empty($lead->created_at)): ?>
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

                                                <!-- Action -->
                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="<?= base_url('lead-detail/'.$lead->id); ?>"
                                                            class="btn btn-sm btn-info-subtle btn-icon"
                                                            title="View Lead">
                                                            <i class="isax isax-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php $count++; ?>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center py-3">
                                                    No recent leads found.
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <?php include('common/footer.php')?>

        </div>
    </div>
    <?php include('common/foot.php')?>



    <!-- Daterangepikcer JS -->
    <script src="assets/js/moment.min.js" type="0c434ad8607ce9fa29b1b8f4-text/javascript"></script>

</body>

</html>