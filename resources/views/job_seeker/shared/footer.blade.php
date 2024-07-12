<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg ">
        <div class="container">
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="#"><img height="40px" src="{{asset('logo.png')}}" alt=""></a></div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>100+</span>
                        <p>Jobs</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>451</span>
                        <p>Job Seekers</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>100</span>
                        <p>Company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                All rights reserved | This template is made with JIC Team
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<form id="logout-form" action="{{ route('job_seeker.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/price_rangs.js') }}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
{{--<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
{{--<script src="{{ asset('assets/js/contact.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.form.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/mail-script.js') }}"></script>--}}
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('admin/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $('#datatables').DataTable();
    $('.select2').select2();
    document.getElementById('logout-link').addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Are you sure you want to log out?')) {
            document.getElementById('logout-form').submit();
        }
    });
    document.getElementById('logout-link2').addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Are you sure you want to log out?')) {
            document.getElementById('logout-form').submit();
        }
    });

    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this item?")) {
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", url);
            var csrfToken = document.createElement("input");
            csrfToken.setAttribute("type", "hidden");
            csrfToken.setAttribute("name", "_token");
            csrfToken.setAttribute("value", "{{ csrf_token() }}");
            var methodInput = document.createElement("input");
            methodInput.setAttribute("type", "hidden");
            methodInput.setAttribute("name", "_method");
            methodInput.setAttribute("value", "DELETE");
            form.appendChild(csrfToken);
            form.appendChild(methodInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@stack('js')
