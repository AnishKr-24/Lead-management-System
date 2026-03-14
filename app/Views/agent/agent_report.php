<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Performance Report | LMS</title>
    <?= $this->include('common/head') ?>
</head>

<body>
    <div class="main-wrapper">

        <?= $this->include('common/header') ?>
     

        <div class="page-wrapper">
            <div class="content">

                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="fs-18 fw-bold">Agent Performance Report</h6>
                        <p class="text-muted mb-0">Track individual sales team performance</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon"><i class="isax isax-calendar-1"></i></span>
                            <input type="text" class="form-control" placeholder="Select Date Range"
                                value="01 Jan 2026 - 31 Jan 2026">
                        </div>
                        <button class="btn btn-primary"><i class="isax isax-filter me-1"></i> Filter</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Top Performer</p>
                                        <h5 class="fw-bold mb-0 text-primary">Amit Kumar</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-primary-subtle text-primary rounded-circle">
                                        <i class="isax isax-cup"></i>
                                    </span>
                                </div>
                                <span class="badge bg-soft-success mt-2">15 Deals Closed</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Total Sales Revenue</p>
                                        <h5 class="fw-bold mb-0 text-success">₹ 4,50,000</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-success-subtle text-success rounded-circle">
                                        <i class="isax isax-money-recive"></i>
                                    </span>
                                </div>
                                <span class="text-muted fs-12 mt-2">This Month</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Avg Conversion Rate</p>
                                        <h5 class="fw-bold mb-0 text-warning">18.5%</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-warning-subtle text-warning rounded-circle">
                                        <i class="isax isax-chart-1"></i>
                                    </span>
                                </div>
                                <span class="text-muted fs-12 mt-2">Calls to Sale Ratio</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-muted">Active Agents</p>
                                        <h5 class="fw-bold mb-0 text-info">5 Agents</h5>
                                    </div>
                                    <span class="avatar avatar-md bg-info-subtle text-info rounded-circle">
                                        <i class="isax isax-profile-2user"></i>
                                    </span>
                                </div>
                                <span class="text-muted fs-12 mt-2">Currently Working</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Leads vs Conversions (Agent Wise)</h6>
                            </div>
                            <div class="card-body">
                                <div id="agent_performance_chart" style="height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Detailed Agent Metrics</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap border mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Total Leads Assigned</th>
                                        <th>Calls Made</th>
                                        <th>Won (Sales)</th>
                                        <th>Lost</th>
                                        <th>Conversion Rate</th>
                                        <th>Revenue Generated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-primary text-white me-2">AK</span>
                                                <h6 class="fs-14 fw-medium mb-0">Amit Kumar</h6>
                                            </div>
                                        </td>
                                        <td>150</td>
                                        <td>120</td>
                                        <td><span class="text-success fw-bold">15</span></td>
                                        <td>40</td>
                                        <td>10%</td>
                                        <td class="fw-bold">₹ 2,50,000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-info text-white me-2">PS</span>
                                                <h6 class="fs-14 fw-medium mb-0">Priya Singh</h6>
                                            </div>
                                        </td>
                                        <td>120</td>
                                        <td>90</td>
                                        <td><span class="text-success fw-bold">12</span></td>
                                        <td>30</td>
                                        <td>10%</td>
                                        <td class="fw-bold">₹ 1,80,000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-warning text-white me-2">RD</span>
                                                <h6 class="fs-14 fw-medium mb-0">Rohan Das</h6>
                                            </div>
                                        </td>
                                        <td>80</td>
                                        <td>60</td>
                                        <td><span class="text-success fw-bold">2</span></td>
                                        <td>10</td>
                                        <td>2.5%</td>
                                        <td class="fw-bold">₹ 20,000</td>
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
    <?= $this->include('common/foot') ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            series: [{
                name: 'Leads Assigned',
                data: [150, 120, 80]
            }, {
                name: 'Leads Converted',
                data: [15, 12, 2]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Amit Kumar', 'Priya Singh', 'Rohan Das'],
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " Leads"
                    }
                }
            },
            colors: ['#0d6efd', '#198754'] // Blue for Leads, Green for Sales
        };

        var chart = new ApexCharts(document.querySelector("#agent_performance_chart"), options);
        chart.render();
    });
    </script>
    <script src="assets/plugins/apexchart/apexcharts.min.js" type="0c434ad8607ce9fa29b1b8f4-text/javascript"></script>
</body>

</html>