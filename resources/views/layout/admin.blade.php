<html>
  <head>
    <link rel="shortcut icon" href="{{ URL::to('favicon.png') }}">
    <title>Printerous Code Challenge - Organization</title>

    <script src="{{ URL::to('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}" />
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.min.js') }}"></script>
   <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet/less" href="{{ URL::to('assets/less/style.less') }}" />
    <script src="{{ URL::to('assets/js/less.min.js') }}"></script>

    <script charset="utf-8">
        $(document).ready(function() {


            $('.menu > .item').click(function() {
                $('.menu > .item').removeClass('active');
                $(this).addClass('active');

                $.get('admin/page_' + location, function(data) {
                    $('#dashboard-wrapper').html(data);
                });

                $('.content').load($(this).data('target'));
            });

            $('.menu > .item.parent').click(function() {

                if($('.sidebar-menu').hasClass('mini')) {
                    $('.sidebar-menu').removeClass('mini');
                    $('.profile').removeClass('mini');
                    $('.sidebar-menu .menu').removeClass('mini');
                    $('.body').addClass('push-right');
                }

                $($(this).data('toggle')).toggle();
                if($('.arrow').hasClass('fa-chevron-circle-down')) {
                    $('.arrow').removeClass('fa-chevron-circle-down');
                    $('.arrow').addClass('fa-chevron-circle-up');
                }
                else {
                    $('.arrow').removeClass('fa-chevron-circle-up');
                    $('.arrow').addClass('fa-chevron-circle-down');

                }
            });
        })

        $.fn.peity.defaults.line = {
            delimiter: ",",
            fill: "#DD0035",
            max: 10,
            min: 0,
            stroke: "#DD0035",
            strokeWidth: 1,

        }

        function taggle_sidebar() {
            if($('.sidebar-menu').hasClass('mini')) {
                $('.sidebar-menu').removeClass('mini');
                $('.profile').removeClass('mini');
                $('.sidebar-menu .menu').removeClass('mini');
                $('.skp-wrapper').addClass('push-right');
            }
            else {
                $('.sidebar-menu').addClass('mini');
                $('.profile').addClass('mini');
                $('.sidebar-menu .menu').addClass('mini');
                $('.skp-wrapper').removeClass('push-right');
                $('.child').hide();
            }
        }

    </script>


  </head>
  <body>

      @yield('modal')

    <!-- ini navbar -->

    <div class="navbar-custom">
        <div class="navbar-navigation">
            <a onclick="taggle_sidebar()"><li class="menu-item"><i class="ion-navicon-round"></i></li></a>
        </div>
    </div>

    <div class="sidebar-menu left">
        <div class="profile">
            <div class="pict">

                <!-- foto user di sidebar -->
                <img src="{{ URL::to('assets/image/admin.png') }}">

            </div>
            <div class="name">
                <h3>
                    {{ $sesinfo['username'] }}
                </h3>
            </div>
            <div class="status">
                <p>
                    Admin
                </p>
            </div>
        </div>
        <ul class="menu">
            <a class="item @if($status_halaman == 1) active @endif" href="{{ URL::to('admin/view') }}">
                <li>
                    <i class="ion-ios-people"></i>
                    <p>Organization</p>
                </li>
            </a>

            <a class="item @if($status_halaman == 2) active @endif " href="{{ URL::to('person') }}">
                <li>
                    <i class="ion-clipboard"></i>
                    <p>PIC</p>
                </li>
            </a>


            <a class="item-a" href="{{ URL::to('/logout') }}">
                <li>
                    <i class="ion-log-out"></i>
                    <p>Log Out</p>
                </li>
            </a>
        </ul>
    </div>

    <div class="skp-wrapper push-right">
        @yield('content')
    </div>


  </body>
</html>
