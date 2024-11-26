<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grow Rich Journey</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('theme/template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('theme/template/assets/vendors/jquery-bar-rating/css-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/template/assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->

    <link rel="stylesheet" href="{{auth()->user()->hasRole('admin') ? asset('theme/template/assets/css/demo_1/style.css') : asset('theme/template/assets/css/demo_2/style.css')}}" />

    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/template/assets/css/timeline.css')}}">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('theme/template/assets/images/favicon.png')}}" />
    @stack('css')
</head>
<body class="{{ auth()->user()->sidebar_skin }}">
    @role('admin')
        @include('layouts.admin')
    @else
        @include('layouts.users')
    @endrole
    <!-- container-scroller -->
    <!-- plugins:js -->
<script src="{{asset('theme/template/assets/vendors/js/vendor.bundle.base.js')}}"></script>

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('theme/template/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/flot/jquery.flot.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('theme/template/assets/vendors/flot/jquery.flot.stack.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('theme/template/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('theme/template/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('theme/template/assets/js/misc.js')}}"></script>
<script src="{{asset('theme/template/assets/js/settings.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('js/vue.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>
<script>
    function changeTheme(which, value) {
        const attributes = {
            [which]: value
        };

        axios.post('/theme-settings', attributes).then().catch(function(error) {
            console.error('Error:', error);
        })
    }

    function copyToClipboard() {
        const tempInput = document.createElement('input');
        tempInput.value = 'file:///C:/laragon/www/PlusAdmin-Free-Bootstrap-Admin-Template/template/demo_1/pages/forms/basic_elements.html';
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        alert('Text Copied!');
    }
</script>
<!-- End custom js for this page -->
@stack('scripts')
</body>
</html>
