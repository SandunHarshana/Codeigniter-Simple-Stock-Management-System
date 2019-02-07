<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Danaro Distributors</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">

        <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1, user-scalable = no" />
        <meta name="apple-mobile-web-app-title" content="Silvans Portal" />

        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <!-- shortcut icon -->
        <link rel="apple-touch-icon" href="https://lh3.googleusercontent.com/-EUxM3m26k6U/WoEQNiHLnuI/AAAAAAAADRs/ovEAGlIIJ9EzdYCXrG1-IumIiyWL5wi9ACL0BGAYYCw/h500/2018-02-11.jpg">

        <link rel="apple-touch-icon" sizes="76x76" href="https://lh3.googleusercontent.com/-EUxM3m26k6U/WoEQNiHLnuI/AAAAAAAADRs/ovEAGlIIJ9EzdYCXrG1-IumIiyWL5wi9ACL0BGAYYCw/h500/2018-02-11.jpg">

        <link rel="apple-touch-icon" sizes="120x120" href="https://lh3.googleusercontent.com/-EUxM3m26k6U/WoEQNiHLnuI/AAAAAAAADRs/ovEAGlIIJ9EzdYCXrG1-IumIiyWL5wi9ACL0BGAYYCw/h500/2018-02-11.jpg">

        <link rel="apple-touch-icon" sizes="152x152" href="https://lh3.googleusercontent.com/-EUxM3m26k6U/WoEQNiHLnuI/AAAAAAAADRs/ovEAGlIIJ9EzdYCXrG1-IumIiyWL5wi9ACL0BGAYYCw/h500/2018-02-11.jpg">
        <!-- launch image -->
        <link rel="apple-touch-startup-image" href="http://www.onlywebpro.com/wp-content/themes/yellowblack-mobile/images/iphone-startup.png">

        <link rel="apple-touch-startup-image" href="http://www.onlywebpro.com/wp-content/themes/yellowblack-mobile/images/iphone-startup.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />

        <link rel="apple-touch-startup-image" href="http://www.onlywebpro.com/wp-content/themes/yellowblack-mobile/images/iphone-startup.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />

        <!-- date picker -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <!--#-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!--Icons-->
        <script src="<?php echo base_url(); ?>assets/js/lumino.glyphs.js"></script>
        <!--Comment js-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/home.js" ></script>
        <script>            
            function hide(){
                document.getElementById("error").style.display = 'none'; 
            }
            function hideredeemerror(){
                document.getElementById("redeemerror").style.display = 'none'; 
            }
            
            $('#calendar').datepicker({
            });

            !function($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function() {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function() {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>
        <!--/#-->
        
        <script>
            $(function() {
              $( "#datepicker" ).datepicker();
            });
        </script>          
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Danaro</span> Distributors</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url(); ?>index.php/common/logout"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Stock Search">
                </div>
            </form>
            <ul class="nav menu">
                <li><a href="<?php echo base_url(); ?>index.php/Home"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-dashboard-dial"></use></svg>Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Invoice/add_invoice"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Add Invoice</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Invoice/view_all_invoice"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>All Invoice</a></li>	
                <li><a href="<?php echo base_url(); ?>index.php/Invoice/view_monthly_invoice"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Monthly Invoice</a></li>  
                <li><a href="<?php echo base_url(); ?>index.php/Invoice/view_daily_invoice"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Daily Invoice</a></li>	
                <li><a href="<?php echo base_url(); ?>index.php/Stock"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>View Stock</a></li>	
                <li><a href="<?php echo base_url(); ?>index.php/Stock/add_stock"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>Add Stock</a></li>	                	
                <li><a href="<?php echo base_url(); ?>index.php/Home/manage_salesman"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Salesman Manage</a></li>	                	
                <li><a href="<?php echo base_url(); ?>index.php/Home/history_salesman"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Salesman History</a></li>	                	
            </ul>		
        </div><!--/.sidebar-->
