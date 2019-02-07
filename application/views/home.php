
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <?php
                            if(FALSE){
                                echo '<div class="alert bg-danger" id="error" role="alert">
                                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'.$error.' <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove" onclick="hide();"></span></a>
                                </div>'; 
                            }
                        ?>                               
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="panel panel-blue panel-widget ">
                                    <div class="row no-padding">
                                        <div class="col-sm-3 col-lg-5 widget-left">
                                            <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                                        </div>
                                        <div class="col-sm-9 col-lg-7 widget-right">
                                            <div class="large"><?php echo $scount; ?></div>
                                            <div class="text-muted">Total Goods</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="panel panel-orange panel-widget">
                                    <div class="row no-padding">
                                        <div class="col-sm-3 col-lg-5 widget-left">
                                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                                        </div>
                                        <div class="col-sm-9 col-lg-7 widget-right">
                                            <div class="large"><?php echo $totalinvoices; ?></div>
                                            <div class="text-muted">Total Invoices</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="panel panel-teal panel-widget">
                                    <div class="row no-padding">
                                        <div class="col-sm-3 col-lg-5 widget-left">
                                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                                        </div>
                                        <div class="col-sm-9 col-lg-7 widget-right">
                                            <div class="large"><?php echo $thismonthinvoices; ?></div>
                                            <div class="text-muted"><?php echo $date; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="panel panel-red panel-widget">
                                    <div class="row no-padding">
                                        <div class="col-sm-3 col-lg-5 widget-left">
                                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                                        </div>
                                        <div class="col-sm-9 col-lg-7 widget-right">
                                            <div class="large"><?php echo $todayinvoices; ?></div>
                                            <div class="text-muted">Today invoices</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>	<!--/.main-->
    </body>
</html>
