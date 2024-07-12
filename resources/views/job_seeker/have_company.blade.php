@extends('job_seeker.shared.app')

@section('content')
    <div class="support-company-area fix section-padding2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <div class="section-tittle section-tittle2">
                            <span>Have A Company?</span>
                            <h2>Join With US Now</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="whole-wrap" id="haveCompany">
                        <div class="container box_1170">
                            <div class="section-top-border haveCompany">
                                <h3 class="mb-30">Join Us and Find the Best Candidates for Your Company</h3>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('assets/img/Join-us.png') }}" alt="Hiring" class="img-fluid">
                                    </div>
                                    <div class="col-md-9 mt-sm-20 text-white">
                                        <ul>
                                            <li><strong>Are you looking to hire top talent for your company? Join us and take advantage
                                                    of our platform to post job ads and connect with the best candidates. Our
                                                    user-friendly interface makes it easy for you to manage your job postings and
                                                    applications.</strong><br>
                                            </li>
                                            <li><strong>By registering with us, you'll gain access to a wide pool of job seekers who are
                                                    actively looking for opportunities. Whether you're looking for experienced
                                                    professionals or fresh graduates, our platform has the right candidates for your
                                                    needs.</strong><br>
                                            </li>
                                            <li><strong>Don't miss out on the opportunity to streamline your hiring process and find the
                                                    perfect fit for your company. Click the link below to get started with your
                                                    registration.</strong>
                                            </li>
                                        </ul>
                                        <div class="mt-2 text-center">
                                            <a href="{{ route('company.register') }}" class="btn head-btn1">Register
                                                Your Company</a>
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
@endsection
