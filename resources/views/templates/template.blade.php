<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Index</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

    <!-- Custom CSS Dropdown -->
    <link rel="stylesheet" href="{{asset('css/dropdown.css')}}" />
    @yield('css-list')
    <style>
      .modal-backdrop {
        /* bug fix - no overlay */
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar" data-color="purple">
        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

        <div class="sidebar-wrapper">
          <div class="logo">
            <a href="#" class="simple-text"> Company Name </a>
          </div>

          <ul class="nav">
            <li class="active">
              <a href="#">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="dropdown-btn">
              <a href="#">
                <i class="pe-7s-angle-down-circle"></i>
                <p>Master</p>
              </a>
            </li>
            <div class="dropdown-container">
              <li class="">
                <a href="/biodata" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Biodata</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Kamar</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Kategori</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Gabungan</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">User</p>
                </a>
              </li>
            </div>

            <li class="dropdown-btn">
              <a href="#">
                <i class="pe-7s-angle-down-circle"></i>
                <p>Transaksi</p>
              </a>
            </li>
            <div class="dropdown-container">
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Keberangkatan</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Kepulangan</p>
                </a>
              </li>
              <li class="">
                <a href="#" class="dropdown-text">
                  <i class="pe-7s-less"></i>
                  <p class="">Pembayaran</p>
                </a>
              </li>
            </div>
          </ul>
        </div>
      </div>

      <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Table List</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-left">
                <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-dashboard"></i>
                    <p class="hidden-lg hidden-md">Dashboard</p>
                  </a>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="">
                    <p>Account</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <p>Log out</p>
                  </a>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
              </ul>
            </div>
          </div>
        </nav>

        @yield('content')
        <footer class="footer">
          <div class="container-fluid">
            <nav class="pull-left">
              <ul>
                <li>
                  <a href="#"> Home </a>
                </li>
                <li>
                  <a href="#"> Company </a>
                </li>
                <li>
                  <a href="#"> Portfolio </a>
                </li>
                <li>
                  <a href="#"> Blog </a>
                </li>
              </ul>
            </nav>
            <p class="copyright pull-right">
              &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
          </div>
        </footer>
      </div>
    </div>
  </body>

  <!--   Core JS Files   -->
  <script src="{{asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="{{asset('js/chartist.min.js')}}"></script>

  <!--  Notifications Plugin    -->
  <script src="{{asset('js/bootstrap-notify.js')}}"></script>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="{{asset('js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="{{asset('js/demo.js')}}"></script>

  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName('dropdown-btn');

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener('click', function () {
        this.classList.toggle('active');
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === 'block') {
          dropdownContent.style.display = 'none';
        } else {
          dropdownContent.style.display = 'block';
        }
      });
    }
  </script>
</html>
