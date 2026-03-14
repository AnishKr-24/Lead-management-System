<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Lead | LMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <?= $this->include('common/head')?>


</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header')?>


        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-1">
                    <div>
                        <h6 class="fs-18 fw-bold">Add New Lead</h6>
                        <p class="text-muted mb-0">Enter lead details below</p>
                    </div>

                    <div>
                        <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#importModal">
                            <i class="isax isax-document-upload"></i>
                        </a>
                        <a href="<?= base_url('lead-list'); ?>" class="btn btn-light btn-sm">
                            <i class="isax isax-arrow-left-2 me-1"></i>Back to Dashboard
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" id="custom-form">
                                <form action="<?= base_url('save-lead'); ?>" method="POST" class="form_submit">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="fw-semibold border-bottom pb-1 mb-2">
                                                Basic Information
                                            </h6>

                                            <div class="row g-2">
                                                <div class="col-md-3">
                                                    <label class="form-label">
                                                        First Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="first_name" class="form-control"
                                                        placeholder="First Name">
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">
                                                        Last Name 
                                                    </label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        placeholder="Last Name">
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">
                                                        Gender
                                                    </label>
                                                    <select name="gender" class="form-select">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">
                                                        Date of Birth 
                                                    </label>
                                                    <input type="date" name="dob" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <!------------------- CONTACT INFORMATION ------------------->
                                        <div class="col-12 mt-4">
                                            <h6 class="fw-semibold border-bottom pb-1 mb-2">
                                                Contact Information
                                            </h6>

                                            <div class="row g-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Primary No.<span class="text-danger">*</span></label>
                                                    <input type="number" id="phone" name="phone" class="form-control"
                                                        placeholder="Mobile Number">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Alternate Mob No.</label>
                                                    <input type="number" name="alt_phone" class="form-control"
                                                        placeholder="Alternate Mobile">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>


                                        <!------------------- ADDRESS DETAILS ------------------->

                                        <div class="col-12 mt-4">
                                            <h6 class="fw-semibold border-bottom pb-1 mb-2">
                                                Address Details
                                            </h6>
                                            <div class="row g-2">
                                                <!-- Address -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Full Address</label>
                                                    <textarea name="address" class="form-control" rows="4"
                                                        placeholder="Full Address"></textarea>
                                                </div>
                                                <!-- State City Pin -->
                                                <div class="col-md-6">
                                                    <div class="row g-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">City</label>
                                                            <input type="text" name="city" class="form-control"
                                                                placeholder="City">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">State</label>
                                                            <input type="text" name="state" class="form-control"
                                                                placeholder="State">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">District</label>
                                                            <input type="text" name="district" class="form-control"
                                                                placeholder="District">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Pin Code</label>
                                                            <input type="number" name="pincode" class="form-control"
                                                                placeholder="Pin">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Country</label>
                                                            <select name="country" class="form-select">
                                                                <option value="India">India</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Land Mark</label>
                                                            <input type="text" name="landmark" class="form-control"
                                                                placeholder="Land Mark">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------- COMMENTS ------------------->
                                        <div class="col-12 mt-4">
                                            <h6 class="fw-semibold border-bottom pb-1 mb-2">
                                                Lead Details
                                            </h6>

                                            <div class="row g-2">

                                                <div class="col-md-2">
                                                    <label class="form-label">Lead Source</label>
                                                    <select name="source" class="form-select form-select-sm">
                                                        <option>Lead Source</option>
                                                        <option>Facebook</option>
                                                        <option>Google</option>
                                                        <option>Walk-in</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Assign Agent</label>
                                                    <select name="updated_by" class="form-select form-select-sm">
                                                        <option>Assign Agent</option>
                                                        <option>Amit</option>
                                                        <option>Priya</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Lead Status</label>
                                                    <select name="status" class="form-select form-select-sm">
                                                        <option>New</option>
                                                        <option>Contacted</option>
                                                        <option>Interested</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Type</label>
                                                    <select name="type" id="lead_type"
                                                        class="form-select form-select-sm">
                                                        <option value="Call">Call</option>
                                                        <option value="Meeting">Ringing</option>
                                                        <option value="Email">Not Ringing</option>
                                                        <option value="Connecting">Connecting</option>
                                                        <option value="Callback">Call Back</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Callback</label>
                                                    <input type="text" id="callback_datetime" name="callback_datetime"
                                                        class="form-control form-control-sm" placeholder="Date & Time">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Priority</label>
                                                    <select name="priority" id="priority"
                                                        class="form-select form-select-sm">
                                                        <option value="High" selected>High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <!------------------- ACTION BUTTONS ------------------->
                                        <div class="col-12 mt-2">
                                            <div class="action-bar d-flex justify-content-end flex-wrap gap-2">
                                                <!-- Buttons -->
                                                <div class="d-flex align-items-end gap-2">
                                                    <button type="reset" class="btn btn-light btn-sm">
                                                        Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Save Lead
                                                    </button>
                                                </div>

                                            </div>
                                        </div>


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


    <div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title">Import File</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="<?= base_url('import-leads'); ?>" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <label class="form-label">
                            Select File <span class="text-danger">*</span>
                        </label>
                        <input type="file" name="import_file" class="form-control" accept=".xls,.xlsx,.csv" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Import
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
const input = document.querySelector("#phone");

const iti = window.intlTelInput(input, {
    initialCountry: "in",
    separateDialCode: true,
    preferredCountries: ["in", "us", "gb"]
});


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