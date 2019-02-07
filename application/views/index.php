<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <title>Admin</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Log in</div>
                    <div class="panel-body">
                        <?php echo form_open_multipart('common/login'); ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="username" type="email" autofocus="" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me..
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <?php
                            if (isset($error_msg)) {
                                echo "<span style='color:red;'>&nbsp;&nbsp;&nbsp;&nbsp;" . $error_msg . "</span>";
                            }
                            ?>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script>
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
        <script type="text/javascript">
        $(document).ready(function(){
                // iOS web app full screen hacks.
                if(window.navigator.standalone == true) {
                        // make all link remain in web app mode.
                        $('a').click(function() {
                                window.location = $(this).attr('href');
                    return false;
                        });
                }
        });
        </script>

    </body>
</html>
