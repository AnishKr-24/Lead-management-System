<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Source Report | LMS</title>
    <?= $this->include('common/head')?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header')?>
        

        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold">Lead Source Analysis</h6>
                        <p class="text-muted mb-0">Where are your customers coming from?</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon"><i class="isax isax-calendar-1"></i></span>
                            <input type="text" class="form-control" placeholder="Select Date Range" value="This Month">
                        </div>
                        <button class="btn btn-white border"><i class="isax isax-export me-1"></i> Export</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Top Lead Source</p>
                                        <h5 class="fw-bold mb-0 text-primary">Facebook Ads</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-primary-subtle text-primary rounded-circle">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </span>
                                </div>
                                <span class="badge bg-soft-success mt-2">45% of total leads</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Best Conversion Rate</p>
                                        <h5 class="fw-bold mb-0 text-success">Website / Organic</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-success-subtle text-success rounded-circle">
                                        <i class="isax isax-global"></i>
                                    </span>
                                </div>
                                <span class="text-muted fs-12 mt-2">High Quality Leads</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Highest Revenue</p>
                                        <h5 class="fw-bold mb-0 text-warning">Google Ads</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-warning-subtle text-warning rounded-circle">
                                        <i class="fa-brands fa-google"></i>
                                    </span>
                                </div>
                                <span class="text-muted fs-12 mt-2">₹ 12.5 Lakhs generated</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Leads Distribution (By Source)</h6>
                            </div>
                            <div class="card-body">
                                <div id="source_pie_chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Conversion vs Lost (By Source)</h6>
                            </div>
                            <div class="card-body">
                                <div id="source_bar_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Source Performance Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Source Name</th>
                                        <th>Total Leads</th>
                                        <th>Converted</th>
                                        <th>Lost</th>
                                        <th>Conversion Rate</th>
                                        <th>Revenue Generated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fa-brands fa-facebook text-primary me-2"></i> Facebook Ads</td>
                                        <td>500</td>
                                        <td>50</td>
                                        <td>450</td>
                                        <td><span class="badge bg-soft-warning">10%</span></td>
                                        <td class="fw-bold">₹ 5,00,000</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-brands fa-google text-danger me-2"></i> Google Ads</td>
                                        <td>300</td>
                                        <td>80</td>
                                        <td>220</td>
                                        <td><span class="badge bg-soft-success">26%</span></td>
                                        <td class="fw-bold">₹ 12,50,000</td>
                                    </tr>
                                    <tr>
                                        <td><i class="isax isax-global text-info me-2"></i> Website / Organic</td>
                                        <td>150</td>
                                        <td>40</td>
                                        <td>110</td>
                                        <td><span class="badge bg-soft-success">26%</span></td>
                                        <td class="fw-bold">₹ 3,00,000</td>
                                    </tr>
                                    <tr>
                                        <td><i class="isax isax-call text-secondary me-2"></i> Cold Calling</td>
                                        <td>1000</td>
                                        <td>10</td>
                                        <td>990</td>
                                        <td><span class="badge bg-soft-danger">1%</span></td>
                                        <td class="fw-bold">₹ 50,000</td>
                                    </tr>
                                    <tr>
                                        <td><i class="isax isax-profile-2user text-warning me-2"></i> Referral</td>
                                        <td>50</td>
                                        <td>25</td>
                                        <td>25</td>
                                        <td><span class="badge bg-soft-success">50%</span></td>
                                        <td class="fw-bold">₹ 2,00,000</td>
                                    </tr>
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {

        // 1. PIE CHART (Source Distribution)
        var pieOptions = {
            series: [45, 30, 15, 5, 5], // Percentages
            chart: {
                type: 'donut',
                height: 350
            },
            labels: ['Facebook', 'Google', 'Website', 'Cold Call', 'Referral'],
            colors: ['#3b5998', '#db4a39', '#0dcaf0', '#6c757d', '#ffc107'],
            legend: {
                position: 'bottom'
            },
            dataLabels: {
                enabled: true
            }
        };
        var pieChart = new ApexCharts(document.querySelector("#source_pie_chart"), pieOptions);
        pieChart.render();

        // 2. BAR CHART (Converted vs Lost)
        var barOptions = {
            series: [{
                name: 'Converted',
                data: [50, 80, 40, 10, 25]
            }, {
                name: 'Lost',
                data: [450, 220, 110, 990, 25]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true
            },
            xaxis: {
                categories: ['Facebook', 'Google', 'Website', 'Cold Call', 'Referral'],
            },
            colors: ['#198754', '#dc3545'], // Green for Converted, Red for Lost
            fill: {
                opacity: 1
            },
            legend: {
                position: 'bottom'
            }
        };
        var barChart = new ApexCharts(document.querySelector("#source_bar_chart"), barOptions);
        barChart.render();
    });
    </script>
    <script src="assets/plugins/apexchart/apexcharts.min.js" type="0c434ad8607ce9fa29b1b8f4-text/javascript"></script>
</body>

</html>