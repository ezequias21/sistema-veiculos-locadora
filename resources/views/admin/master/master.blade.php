<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <script src="https://kit.fontawesome.com/d0a459ca31.js" crossorigin="anonymous"></script>
    <title> System Car</title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('backend/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('backend/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/build/css/custom.min.css') }}" rel="stylesheet">

    <style>
        .app_collapse {
            width: 100%;
            cursor: pointer;
        }

        .app_collapse .app_collapse_header span {
            display: block;
            width: 100%;
            padding: 0;
            margin-bottom: 20px;
            font-size: 21px;
            line-height: inherit;
            color: #333;
            border: 1px solid #fff;
            border-bottom: 1px solid #e5e5e5;
        }

        .app_collapse .app_collapse_header span:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-right: 5px;
        }

        .app_collapse.active .app_collapse_header span:after {
            content: "\2212";
        }

        .app_collapse .app_collapse_content {
            max-height: auto;
            overflow: hidden;
            transition: max-height 0.2s linear;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            grid-gap: 10px;
        }

        .card-car {
            display: flex;
            align-items: center;
            height: 40px;
            background: #F5F7FA;
            padding: 0 10px;
            border: 1px solid #E6E9ED;
            border-radius: 3px;
        }

        .card-car-icon {
            padding-right: 10px;
        }

        .property_image,
        .content_image {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            flex-basis: 100%;
            width: 100%;
        }

        .image_item {
            flex-basis: calc(25% - 15px) !important;
            position: relative;
            margin-right: 20px;
            margin-bottom: 25px;
        }

        .property_image .image_item:nth-child(4n),
        .content_image .image_item:nth-child(4n) {
            margin-right: 0px !important;
        }

        .embed {
            position: relative;
            max-width: 100%;
            height: auto;
            padding-bottom: 56.25%;
            border-radius: 5px;
        }

        .form-control {
            border-radius: 3px;
        }

    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-car"></i><span>System
                                Car</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bem vindo</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Dashboard <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Clientes <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="form.html">Ver todos</a></li>
                                        <li><a href="form_advanced.html">Empresas</a></li>
                                        <li><a href="form_wizards.html">Time</a></li>
                                        <li><a href="{{ route('admin.users.create') }}">Criar Novo</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Veículos <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="general_elements.html">Ver todos</a></li>
                                        <li><a href="media_gallery.html">Criar Novo</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Contratos <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Ver todos</a></li>
                                        <li><a href="tables_dynamic.html">Criar Novo</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">John Doe
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->







            <!-- page content -->
            <div class="right_col" role="main">

                @yield('content')

            </div>
            <!-- /page content -->
















            <!-- footer content -->
            <footer>
                <div class="pull-left">
                    <a href="https://colorlib.com">Gentelella</a>
                </div>
                <div class="pull-right">
                    Desenvolvido por <a href="https://colorlib.com">Ezequias Antunes</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('backend/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('backend/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('backend/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('backend/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('backend/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend./vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('backend/build/js/custom.min.js') }}"></script>

    <!--Libs only javascripts-->
    <script src="{{ asset('backend/assets/js/libs.js') }}"></script>

    <script>
        $('.app_collapse:not(.active)').filter(function(index, element) {
            $(element).find('.app_collapse_content').css('max-height', '0')
        })
        $('.app_collapse_header').click(function() {

            $APP_COLLAPSE_CONTENT = $(this).parent().find('.app_collapse_content')
            $APP_CONTENT = $(this).parent().find('.content')

            if (!$(this).parent().hasClass('active')) {
                $APP_COLLAPSE_CONTENT.css('max-height', $APP_CONTENT.css('height'))
            } else {
                $APP_COLLAPSE_CONTENT.css('max-height', '0px')
            }
            $(this).parent().toggleClass('active')

        })


        //Masks
        function maskPhoneBehavior(val) {
            return val.replace(/\D/g, "").length === 11 ?
                "(00) 00000-0000" :
                "(00) 0000-00009";
        }
        var maskPhoneOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(mask_telefone_behavior.apply({}, arguments), options);
            },
        };

        $(".mask-cell").mask(
            maskPhoneBehavior,
            maskPhoneOptions
        );
        $('.mask-renavam').mask('XXXXXXXXXXX', {
            translation: {
                'X': {
                    pattern: /[0-9]/,
                }
            },
            placeholder: 'XXXXXXXXXXX'

        });
        $('.mask-license-plate').mask('XXXXXXX', {
            translation: {
                'X': {
                    pattern: /[A-Z0-9]/,
                }
            },
            placeholder: 'XXXXXXX'

        });
        $('.mask-phone').mask('(00) 0000-0000');
        $('.mask-driver-license').mask('0000000000-0', {reverse: true});
        $('.mask-date').mask('00/00/0000');
        $('.mask-datetime').mask('00/00/0000 00:00');
        $('.mask-month').mask('00/0000', {
            reverse: true
        });
        $(".mask-doc").mask('000.000.000-00');
        $(".mask-cnpj").mask('00.000.000/0000-00', {
            reverse: true
        });
        $(".mask-zipcode").mask('00000-000', {
            reverse: true
        });
        $(".mask-money").mask('R$ 000.000.000.000.000,00', {
            reverse: true,
            placeholder: "R$ 0,00"
        });
    </script>

    @hasSection('js')
        @yield('js')
    @endif
</body>

</html>
