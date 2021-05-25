<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Event Mnager</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('dist/style4.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
</head>

<body>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3> <a href="">Event Manager</a> </h3>
                <strong> <a href="">EM</a> </strong>
            </div>
            <ul class="list-unstyled components demo">
                <li {{(request()->routeIs('event.index')) ? 'active' : ''}} 
                    {{-- {{(request()->routeIs('glass.subtypeindex')) ? 'active' : ''}}  --}}
                    {{-- {{(request()->routeIs('glass.materialindex')) ? 'active' : ''}}  --}}
                    {{-- {{(request()->routeIs('glass.hwindex')) ? 'active' : ''}}  --}}
                    >
                    <a href="#glassSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-window-restore"></i>
                        Events
                    </a>
                    <ul class="collapse list-unstyled 
                    {{(request()->routeIs('event.index')) ? 'show' : ''}} 
                    {{-- {{(request()->routeIs('glass.subtypeindex')) ? 'show' : ''}}  --}}
                    {{-- {{(request()->routeIs('glass.materialindex')) ? 'show' : ''}}  --}}
                    {{-- {{(request()->routeIs('glass.hwindex')) ? 'show' : ''}} --}}
                    " 
                    id="glassSubmenu">
                    <li>
                        <a href="{{route('event.index')}}">All Events</a>
                    </li>
                </ul>
            </li>
            </ul>
        </nav>


        <!-- Page Content  -->
        <div id="app2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">

                        </li>
                    </ul>
        </div>
    </div>
</nav>
<main class="py-4">
    @include('flash-message')
    @yield('content')
</main>
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
@yield('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function () {
      $("ul.demo > li").click(function (e) {
         $("ul.demo > li").removeClass("active");
         $(this).addClass("active");
     });
  });
</script>
</body>
</html>
