<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>ProUI - Responsive Bootstrap Admin Template</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->

            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
            -->
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="/home" class="sidebar-brand">
                                <i class="fa fa-futbol-o"></i><span class="sidebar-nav-mini-hide"><strong>SiS</strong>couting</span>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="page_ready_user_profile.html">
                                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name">Admin</div>
                                <div class="sidebar-user-links">
                                    <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                                    <a href="login.html" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                                </div>
                            </div>
                            <!-- END User Info -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="/home" class=" active"><i class="fa fa-home sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Home</span></a>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-street-view sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Jogadores</span></a>
                                    <ul>
                                        <li>
                                            <a href="/">Novo Jogador</a>
                                        </li>
                                        <li>
                                            <a href="/listJogador">Listar Jogadores</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                    <span class="sidebar-header-title">Equipa Tecnico</span>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-certificate sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clube</span></a>
                                    <ul>
                                        <li>
                                            <a href="/addTecnico">Novo Tecnico</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_draggable_blocks.html">Draggable Blocks</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_buttons_dropdowns.html">Buttons &amp; Dropdowns</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_navigation_more.html">Navigation &amp; More</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_horizontal_menu.html">Horizontal Menu</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_progress_loading.html">Progress &amp; Loading</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_preloader.html">Page Preloader</a>
                                        </li>
                                        <li>
                                            <a href="page_ui_color_themes.html">Color Themes</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-notes_2 sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Forms</span></a>
                                    <ul>
                                        <li>
                                            <a href="page_forms_general.html">General</a>
                                        </li>
                                        <li>
                                            <a href="page_forms_components.html">Components</a>
                                        </li>
                                        <li>
                                            <a href="page_forms_validation.html">Validation</a>
                                        </li>
                                        <li>
                                            <a href="page_forms_wizard.html">Wizard</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-table sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tables</span></a>
                                    <ul>
                                        <li>
                                            <a href="page_tables_general.html">General</a>
                                        </li>
                                        <li>
                                            <a href="page_tables_responsive.html">Responsive</a>
                                        </li>
                                        <li>
                                            <a href="page_tables_datatables.html">Datatables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-cup sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Icon Sets</span></a>
                                    <ul>
                                        <li>
                                            <a href="page_icons_fontawesome.html">Font Awesome</a>
                                        </li>
                                        <li>
                                            <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Page Layouts</span></a>
                                    <ul>
                                        <li>
                                            <a href="page_layout_static.html">Static</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_fixed_footer.html">Static + Fixed Footer</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_fixed_top.html">Fixed Top Header</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_fixed_top_footer.html">Fixed Top Header + Footer</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_fixed_bottom.html">Fixed Bottom Header</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_fixed_bottom_footer.html">Fixed Bottom Header + Footer</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_main_sidebar_mini.html">Mini Main Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_main_sidebar_partial.html">Partial Main Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_main_sidebar_visible.html">Visible Main Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_alternative_sidebar_partial.html">Partial Alternative Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_alternative_sidebar_visible.html">Visible Alternative Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_no_sidebars.html">No Sidebars</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_both_partial.html">Both Sidebars Partial</a>
                                        </li>
                                        <li>
                                            <a href="page_layout_static_animated.html">Animated Sidebar Transitions</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            <!-- END Sidebar Navigation -->

                            <!-- Sidebar Notifications -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-default">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Template Options -->
                            <!-- Change Options functionality can be found in js/app.js - templateOptions() -->

                            <!-- END Template Options -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Search Form -->
                        <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                            <div class="form-group">
                                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Pesquisa...">
                            </div>
                        </form>
                        <!-- END Search Form -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">



                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    <li class="dropdown-header text-center">Account</li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="page_ready_user_profile.html">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                        <a href="#modal-user-settings" data-toggle="modal">
                                            <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="page_ready_lock_screen.html"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a>
                                        <a href="login.html"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                    </li>

                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->

                        <!-- END Dashboard Header -->
                            @yield('home')
                            @yield('listJogador')
                            @yield('perfilJogador')
                            @yield('addClube')
                            @yield('addTecnico')
                        <!-- Mini Top Stats Row -->
                        <!-- END Widgets Row -->
                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_blank">SiScouting</a>
                        </div>

                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- END User Settings -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>

        <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
        <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->

        <script src="js/helpers/gmaps.min.js"></script>
        <script src="js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
        <!-- Load and execute javascript code used only in this page -->
        <script src="js/pages/index.js"></script>
        <script>$(function(){ Index.init(); });</script>




    </body>
</html>
