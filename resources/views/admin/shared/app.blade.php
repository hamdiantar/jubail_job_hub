<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Jubail Job HUB | Admin</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('admin/img/icon.ico')}}" type="image/x-icon"/>
    <script src="{{asset('admin/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset('admin/css/fonts.css')}}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/azzara.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

</head>
<body>
<div class="wrapper">
    <div class="main-header" data-background-color="purple">
      @include('admin.shared.main_header')
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('admin.shared.sidebar')
    </div>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
<!-- Core JS Files -->
<script src="{{ asset('admin/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('admin/js/plugin/gmaps/gmaps.js') }}"></script>
<script src="{{ asset('admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/ready.min.js') }}"></script>
<script src="{{ asset('admin/js/setting-demo.js') }}"></script>
<script src="{{ asset('admin/js/demo.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        @if(session('success'))
        $.notify({
            message: '{{ session('success') }}',
            title: 'Success',
            icon: 'fa fa-check',
            url: '',
            target: '_self'
        },{
            type: 'success',
            placement: {
                from: 'top',
                align: 'center'
            },
            time: 1000,
            delay: 5000,
        });
        @endif
        @if(session('error'))
        $.notify({
            message: '{{ session('error') }}',
            title: 'Error',
            icon: 'fa fa-exclamation-triangle',
            url: '',
            target: '_self'
        },{
            type: 'danger',
            placement: {
                from: 'top',
                align: 'center'
            },
            time: 1000,
            delay: 5000,
        });
        @endif


    var table = $('#datatables').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                className: 'btn btn-primary text-white',
                text: '<i class="fas fa-file-excel"></i> Excel',
                exportOptions: {
                    columns: ':visible:not(.no-export)'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-primary text-white',
                text: '<i class="fas fa-print"></i> Print',
                exportOptions: {
                    columns: ':visible:not(.no-export)'
                }
            },

        ],

        "columnDefs": [
            { "orderable": true, "targets": '_all' }, // Enable sorting for all columns
            { "orderable": false, "targets": -1 } // Disable sorting for the last column
        ],

    });
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


    CKEDITOR.replace('description');

</script>
</body>
</html>
