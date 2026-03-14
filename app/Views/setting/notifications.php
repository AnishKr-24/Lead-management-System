<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Settings | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">
        <?= $this->include('common/header')?>
       

        <div class="page-wrapper">
            <div class="content">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fs-18 fw-bold">Notification Preferences</h6>
                </div>

                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Email Alerts</h6>
                            </div>
                            <div class="card-body">
                                <form action="save_notifications.php" method="POST">
                                    <ul class="list-group list-group-flush">

                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <div>
                                                <h6 class="mb-1 fw-semibold">New Lead Assigned</h6>
                                                <p class="text-muted fs-13 mb-0">Notify agent when a new lead is
                                                    assigned to them.</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </li>

                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <div>
                                                <h6 class="mb-1 fw-semibold">Daily Performance Report</h6>
                                                <p class="text-muted fs-13 mb-0">Send daily summary to Admin via email.
                                                </p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </li>

                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <div>
                                                <h6 class="mb-1 fw-semibold">Lead Conversion Alert</h6>
                                                <p class="text-muted fs-13 mb-0">Notify Admin when a lead is marked as
                                                    Won.</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </li>

                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <div>
                                                <h6 class="mb-1 fw-semibold">System Maintenance</h6>
                                                <p class="text-muted fs-13 mb-0">Notify all users about system downtime.
                                                </p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Update Preferences</button>
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