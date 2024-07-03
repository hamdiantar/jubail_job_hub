@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="    background: #112546;"
                                     class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jobs Advertisements</p>
                                    <h4 class="card-title">1,294</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="    background: #112546;"
                                     class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="far fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Applications</p>
                                    <h4 class="card-title">1303</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div style="    background: #112546;"
                                     class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Reviews</p>
                                    <h4 class="card-title"> 1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <h4 class="card-title">Today Applications</h4>
                    </div>
                    <p class="card-category">10 job seekers apply to day</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-info bg-info-gradient" style="background: #112546 !important;">
                                <div class="card-body">
                                    <h4 class="mb-1 fw-bold">Free Subscription Plan</h4>
                                    <div id="freePlan" class="chart-circle mt-4 mb-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Job Seeker Name</th>
                                        <th>Job Advertisement</th>
                                        <th>Phone Number</th>
                                        <th>Experience Level</th>
                                        <th>CV</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Abdullah Al-Harbi</td>
                                        <td>Software Engineer</td>
                                        <td>+966501234567</td>
                                        <td>Senior</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fatimah Al-Saud</td>
                                        <td>Marketing Manager</td>
                                        <td>+966502345678</td>
                                        <td>Mid</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ahmed Al-Ghamdi</td>
                                        <td>Data Analyst</td>
                                        <td>+966503456789</td>
                                        <td>Junior</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Layla Al-Faisal</td>
                                        <td>HR Specialist</td>
                                        <td>+966504567890</td>
                                        <td>Senior</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mohammed Al-Omari</td>
                                        <td>Project Manager</td>
                                        <td>+966505678901</td>
                                        <td>Mid</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Haya Al-Rashid</td>
                                        <td>UI/UX Designer</td>
                                        <td>+966506789012</td>
                                        <td>Junior</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Saud Al-Mutairi</td>
                                        <td>Business Analyst</td>
                                        <td>+966507890123</td>
                                        <td>Senior</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rania Al-Qahtani</td>
                                        <td>Software Developer</td>
                                        <td>+966508901234</td>
                                        <td>Mid</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Companies Statistics</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
