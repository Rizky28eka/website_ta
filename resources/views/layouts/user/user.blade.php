<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adara - Modern & Multipurpose eCommerce Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/responsive.css') }}">
    
    <style>
        .header-style-five .menu-wrap {
            display: flex;
            justify-content: center; /* Center the logo */
            align-items: center;
        }

        .header-style-five .logo {
            display: block;
            text-align: center;
        }

        .header-style-five .navbar-wrap {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>

    @include('layouts.user.loader')
    @include('layouts.user.scroll')
    @include('layouts.user.header')
    <section class="home-five-banner">
        <div class="container custom-container-two">
                    @yield('content')
                   
        </div>
    </section>
    @include('layouts.user.footer')
   
               
  
    
    <script src="{{ asset ('assets2/js/vendor/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/jarallax.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/slick.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/wow.min.js') }}"></script>
    <script src="{{ asset ('assets2/js/nav-tool.js') }}"></script>
    <script src="{{ asset ('assets2/js/plugins.js') }}"></script>
    <script src="{{ asset ('assets2/js/main.js') }}"></script>
    <script src="https://cdn.js') }}delivr.net/npm/chart.js') }}"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Change chart type if needed (line, pie, etc.)
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3], // Data for the chart
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
