<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converted Leads & Sales | LMS</title>
    <?= $this->include('common/head') ?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header') ?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold text-success">
                            <i class="isax isax-verify me-2"></i>Converted Leads (Sales)
                        </h6>
                        <p class="text-muted mb-0">List of customers who purchased your product/service.</p>
                    </div>
                    <div>
                        <button class="btn btn-outline-success d-flex align-items-center">
                            <i class="isax isax-document-download me-2"></i>Export Excel
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill border-success-subtle">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Total Deals Closed</p>
                                        
                                        <h4 class="fs-24 fw-bold mb-0"><?= $total_deals ?? 0; ?></h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-success-subtle text-success">
                                        <i class="isax isax-cup fs-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill border-primary-subtle">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Total Revenue</p>
                                        <h4 class="fs-24 fw-bold mb-0">₹ <?= number_format($total_revenue ?? 0); ?></h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary">
                                        <i class="isax isax-money-recive fs-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">This Month</p>
                                        <h4 class="fs-24 fw-bold mb-0"><?= $this_month_deals ?? 0; ?> Deals</h4>
                                    </div>
                                    <span class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning">
                                        <i class="isax isax-calendar fs-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="card-title mb-0">Sales History</h6>
                        <div class="input-icon-end position-relative w-25">
                            <input type="text" class="form-control form-control-sm" placeholder="Search Customer...">
                            <span class="input-icon-addon"><i class="isax isax-search-normal"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Deal Value</th>
                                        <th>Closed Date</th>
                                        <th>Closed By (Agent)</th>
                                        <th>Source</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($won_leads)): ?>
                                    <?php foreach($won_leads as $lead): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-success text-white fw-bold me-2">
                                                    <?= strtoupper(substr($lead->first_name, 0, 1) . substr($lead->last_name, 0, 1)); ?>
                                                </span>
                                                <div>
                                                    <h6 class="fs-14 fw-medium mb-0">
                                                        <?= $lead->first_name . ' ' . $lead->last_name; ?>
                                                    </h6>
                                                    <span class="fs-12 text-muted"><?= $lead->email_address; ?></span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="fw-bold text-dark">
                                            ₹ <?= number_format($lead->deal_value); ?>
                                        </td>

                                        <td>
                                            <?= date('d M Y', strtotime($lead->updated_at)); ?>
                                        </td>

                                        <td>
                                            <i class="isax isax-user me-1 text-muted"></i>
                                            <?= $lead->agent_name ?? 'Admin'; ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                <?= $lead->lead_source; ?>
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-primary-subtle" title="Download Invoice">
                                                <i class="isax isax-document-download"></i> Invoice
                                            </a>
                                            <a href="<?= base_url('lead-detail/'.$lead->id); ?>"
                                                class="btn btn-sm btn-info-subtle btn-icon" title="View Lead">
                                                <i class="isax isax-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="isax isax-box-remove fs-40 text-muted mb-2"></i>
                                                <p class="text-muted">No converted deals found yet.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <ul class="pagination pagination-sm">
                                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <?= $this->include('common/footer') ?>
        </div>
    </div>
    <?= $this->include('common/foot') ?>
</body>

</html>