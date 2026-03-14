<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url(); ?>/">
    <title>Lead Details | LMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
    span.vError {
        float: right;
        position: absolute;
        right: 0;
        top: -19px;
        font-size: 9px;
    }
    </style>


    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header')?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold">Lead Profile</h6>
                        <p class="text-muted mb-0">View and manage lead interactions</p>
                    </div>
                    <div>
                        <a href="<?= base_url('lead-list'); ?>" class="btn btn-light btn-sm">
                            <i class="isax isax-arrow-left-2 me-1"></i>Back to List
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="mb-3">
                                    <span
                                        class="avatar avatar-xxl rounded-circle bg-primary-subtle text-primary fs-24 fw-bold">
                                        <?= strtoupper(substr($lead->first_name, 0, 1) . substr($lead->last_name, 0, 1)); ?>
                                    </span>
                                </div>

                                <h5 class="fw-bold mb-1"><?= $lead->first_name . ' ' . $lead->last_name; ?></h5>
                                <p class="text-muted mb-3">Lead ID:-<?= $lead->id; ?></p>

                                <span class="badge bg-soft-info text-info mb-3"><?= $lead->lead_status; ?></span>

                                <div class="d-flex justify-content-center gap-2 mb-4 align-items-center">

                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle d-flex align-items-center"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status
                                        </button>
                                    </div>

                                    <a href="https://wa.me/91<?= $lead->mobile_no; ?>" target="_blank"
                                        class="btn btn-success btn-sm d-flex align-items-center">
                                        <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp
                                    </a>

                                    <a href="mailto:<?= $lead->email_address; ?>"
                                        class="btn btn-light btn-sm d-flex align-items-center">
                                        <i class="isax isax-message me-1"></i> Email
                                    </a>
                                </div>

                                <div class="text-start border-top pt-3">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="fw-semibold mb-0">Contact Information</h6>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light btn-icon"
                                            data-bs-toggle="modal" data-bs-target="#edit_lead_modal" onclick="loadLeadData(
                                                '<?= $lead->id; ?>', 
                                                '<?= $lead->first_name . ' ' . $lead->last_name; ?>', 
                                                '<?= $lead->mobile_no; ?>', 
                                                '<?= $lead->email_address; ?>', 
                                                '<?= $lead->lead_status; ?>', 
                                                '<?= $lead->lead_source; ?>',
                                                '<?= $lead->city ?? ''; ?>',
                                                '<?= $lead->assigned_to ?? ''; ?>' 
                                            )">
                                            <i class="isax isax-edit"></i>
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs bg-light text-muted rounded-circle me-2">
                                                <i class="isax isax-call"></i>
                                            </span>
                                            <span class="text-muted">+91 <?= $lead->mobile_no; ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs bg-light text-muted rounded-circle me-2">
                                                <i class="isax isax-message"></i>
                                            </span>
                                            <span class="text-muted"><?= $lead->email_address; ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs bg-light text-muted rounded-circle me-2">
                                                <i class="isax isax-location"></i>
                                            </span>
                                            <span class="text-muted">
                                                <?= $lead->city . ', ' . $lead->state; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs bg-light text-muted rounded-circle me-2">
                                                <i class="isax isax-global"></i>
                                            </span>
                                            <span class="text-muted">Source: <?= $lead->lead_source; ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs bg-light text-muted rounded-circle me-2">
                                                <i class="isax isax-profile-2user"></i>
                                            </span>

                                            <span class="text-muted">Assign To:
                                                <?= $lead->updated_by ?? 'Admin'; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7">

                        <div class="card">
                            <div class="card-body p-0">


                                <ul class="nav nav-tabs nav-tabs-solid nav-justified bg-light">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#activity" data-bs-toggle="tab">Activity &
                                            Notes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#schedule" data-bs-toggle="tab">Lead History</a>
                                    </li>
                                </ul>
                                <div class="tab-content p-3">
                                    <div class="tab-pane show active" id="activity">
                                        <div class="mb-4 rounded">
                                            <form action="<?= base_url('save-note'); ?>" method="POST">
                                                <input type="hidden" name="lead_id" value="<?= $lead->id; ?>">
                                                <div
                                                    class="d-flex justify-content-between align-items-center gap-2 flex-wrap mb-3">
                                                    <div class="mb-2">
                                                        <label for="lead_type" class="form-label mb-1">
                                                            Type
                                                        </label>
                                                        <select name="type" id="lead_type"
                                                            class="form-select form-select-sm w-auto">
                                                            <option value="Call">Call</option>
                                                            <option value="Meeting">Ringing</option>
                                                            <option value="Email">Not Ringing</option>
                                                            <option value="Connecting">Connecting</option>
                                                            <option value="Callback">Call Back</option>
                                                        </select>
                                                    </div>


                                                    <div class="mb-2">
                                                        <label for="callback_datetime"
                                                            class="form-label small fw-semibold">
                                                            Callback Date & Time
                                                        </label>

                                                        <div class="d-flex align-items-center gap-1">
                                                            <input type="text" id="callback_datetime"
                                                                name="callback_datetime"
                                                                class="form-control form-control-sm"
                                                                placeholder="Select date & time"
                                                                style="max-width:190px; background:#fff;">
                                                        </div>
                                                    </div>


                                                    <div class="mb-2">
                                                        <label for="priority" class="form-label small fw-semibold">
                                                            Priority
                                                        </label>

                                                        <div class="d-flex align-items-center">
                                                            <select name="priority" id="priority"
                                                                class="form-select form-select-sm w-auto">
                                                                <option value="High" selected>High</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Low">Low</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea name="note" class="form-control mb-2 h-50" rows="2"
                                                    placeholder="What happened in this call? (e.g., Customer asked for discount)"
                                                    required></textarea>

                                                <div class="d-flex justify-content-end align-items-center">
                                                    <button type="submit" class="btn btn-primary btn-sm">Add
                                                        Note</button>
                                                </div>

                                            </form>
                                        </div>

                                        <h6 class="fw-semibold mb-3">Interaction History</h6>
                                        <ul class="activity-feed">
                                            <?php foreach($lead_activity as $act): ?>
                                            <li class="feed-item">
                                                <div class="feed-date">
                                                    <?= date('d M Y, h:i A', strtotime($act->date)); ?>
                                                </div>
                                                <span class="feed-text">
                                                    <strong><?= $act->activity_type; ?>:</strong> <?= $act->remarks; ?>
                                                </span>
                                                <span class="badge bg-light text-muted mt-1">Priority:
                                                    <?= $act->priority; ?></span>
                                            </li>
                                            <?php endforeach; ?>

                                            <?php if(!$lead_activity){?>
                                            <li class="feed-item">
                                                <span class="feed-text text-muted">No activity notes added yet.</span>
                                            </li>
                                            <?php }; ?>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="schedule">
                                        <div class="border rounded p-3">
                                            <h6 class="fw-semibold mb-3">Assignment History & Timeline</h6>

                                            <?php if(!empty($assign_history)): ?>
                                            <?php foreach($assign_history as $history): ?>
                                            <div class="d-flex align-items-start mb-4">
                                                <span
                                                    class="avatar avatar-sm bg-info-subtle text-info rounded-circle me-3">
                                                    <i class="isax isax-arrange-circle-2"></i>
                                                </span>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Lead Assigned</h6>
                                                        <small class="text-muted">
                                                            <?= date('d M Y · h:i A', strtotime($history->date_time)); ?>
                                                        </small>
                                                    </div>
                                                    <p class="text-muted mb-1">
                                                        Assigned to <span
                                                            class="fw-bold text-dark"><?= $history->to_name ?? 'Unknown'; ?></span>
                                                        <?php if(!empty($history->from_name)): ?>
                                                        from <span class="fw-medium"><?= $history->from_name; ?></span>
                                                        <?php else: ?>
                                                        <span class="fw-medium">(New Assignment)</span>
                                                        <?php endif; ?>
                                                    </p>
                                                    <div class="small text-muted">
                                                        <i class="isax isax-user-tick me-1"></i> Action by User ID:
                                                        <?= $history->user_id; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php endif; ?>

                                            <?php if(!empty($activities)): ?>
                                            <?php foreach($activities as $act): ?>
                                            <?php 
                                                        $icon = 'isax-activity'; $color = 'text-primary'; $bg = 'bg-primary-subtle';
                                                        if($act->activity_type == 'Call') { $icon = 'isax-call'; } 
                                                        elseif($act->activity_type == 'Meeting') { $icon = 'isax-calendar'; $color = 'text-warning'; $bg = 'bg-warning-subtle'; }
                                                    ?>
                                            <div class="d-flex align-items-start mb-4">
                                                <span
                                                    class="avatar avatar-sm <?= $bg; ?> <?= $color; ?> rounded-circle me-3">
                                                    <i class="isax <?= $icon; ?>"></i>
                                                </span>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1"><?= $act->activity_type; ?></h6>
                                                        <small
                                                            class="text-muted"><?= date('d M Y · h:i A', strtotime($act->created_at)); ?></small>
                                                    </div>
                                                    <p class="text-muted mb-1"><?= $act->remarks; ?></p>
                                                    <div class="small text-muted">Priority: <?= $act->priority; ?></div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php endif; ?>

                                            <div class="d-flex align-items-start">
                                                <span
                                                    class="avatar avatar-sm bg-light text-secondary rounded-circle me-3">
                                                    <i class="isax isax-flag"></i>
                                                </span>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-1">Lead Created</h6>
                                                        <small
                                                            class="text-muted"><?= date('d M Y', strtotime($lead->created_at)); ?></small>
                                                    </div>
                                                    <p class="text-muted mb-0">Lead created via
                                                        <?= $lead->lead_source; ?>.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <?= $this->include('common/footer')?>
        </div>
    </div>
    <?= $this->include('common/foot')?>




    <div id="edit_lead_modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold">Edit Lead Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('update-lead'); ?>" method="POST" class="form_submit">
                    <div class="modal-body">
                        <input type="hidden" name="lead_id" id="edit_lead_id">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="name" id="edit_name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="phone" id="edit_phone" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <input type="email" name="email" id="edit_email" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <div class="input-group">
                                    <input type="text" name="city" id="edit_city" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Status</label>
                                <select name="status" id="edit_status" class="form-select">
                                    <option value="New">New</option>
                                    <option value="Contacted">Contacted</option>
                                    <option value="Interested">Interested</option>
                                    <option value="Follow Up">Follow Up</option>
                                    <option value="Won">Won (Converted)</option>
                                    <option value="Lost">Lost</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Source</label>
                                <select name="source" id="edit_source" class="form-select">
                                    <option value="Facebook">Facebook Ads</option>
                                    <option value="Google">Google Ads</option>
                                    <option value="Website">Website</option>
                                    <option value="Referral">Referral</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Update Remark</label>
                                <textarea name="comments" id="edit_comments" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
$(function() {
    flatpickr("#callback_datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minDate: "today",
        allowInput: false
    });
});
</script>


</html>