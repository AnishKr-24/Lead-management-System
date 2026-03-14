<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Follow Ups | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header')?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold text-warning"><i class="isax isax-clock me-2"></i>Todays Follow Ups
                        </h6>
                        <p class="text-muted mb-0">List of customers to call today.</p>
                    </div>
                </div>

                <div class="card border-warning-subtle">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Lead Name</th>
                                        <th>Phone</th>
                                        <th>Scheduled Time</th>
                                        <th>Last Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($todays_leads)): ?>
                                    <?php foreach($todays_leads as $row): ?>
                                    <tr>
                                        <td>
                                            <h6 class="fw-semibold mb-0">
                                                <a href="<?= base_url('lead-detail/'.$row->lead_id); ?>">
                                                    <?= $row->first_name . ' ' . $row->last_name; ?>
                                                </a>
                                            </h6>
                                            <?php 
                                                $badgeClass = 'bg-secondary';
                                                if($row->lead_source == 'Facebook') $badgeClass = 'bg-primary';
                                                elseif($row->lead_source == 'Google') $badgeClass = 'bg-danger';
                                                elseif($row->lead_source == 'Website') $badgeClass = 'bg-info';
                                            ?>
                                            <span class="badge <?= $badgeClass; ?> bg-opacity-10 text-dark border">
                                                <?= $row->lead_source; ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="tel:<?= $row->mobile_no; ?>" class="text-dark fw-medium">
                                                +91 <?= $row->mobile_no; ?>
                                            </a>
                                        </td>

                                        <td>
                                            <span class="text-danger fw-bold">
                                                <i class="isax isax-clock me-1"></i>
                                                <?= date('h:i A', strtotime($row->call_back_type)); ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-muted text-truncate d-block" style="max-width: 250px;">
                                                "<?= $row->remarks; ?>"
                                            </span>
                                        </td>

                                        <td>
                                            <a href="tel:<?= $row->mobile_no; ?>" class="btn btn-sm btn-success-subtle">
                                                <i class="isax isax-call"></i> Call
                                            </a>

                                            <a href="<?= base_url('lead-detail/'.$row->lead_id); ?>"
                                                class="btn btn-sm btn-light" title="View & Update">
                                                <i class="isax isax-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="empty-state">
                                                <img src="assets/img/icons/no-data.svg" alt=""
                                                    style="width: 60px; opacity: 0.5;" class="mb-3">
                                                <h6 class="text-muted">No follow-ups scheduled for today!</h6>
                                                <p class="text-muted small">You are all caught up.</p>
                                            </div>
                                        </td>
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
    <?= $this->include('common/foot')?>
</body>

</html>