
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Salesman History</li>
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
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <div class="tab-content">
                                <?php echo form_open_multipart('Home/search_history_salesman', array('class' => 'form-inline search-report')); ?>
                                    <div class="form-group">
                                        <input type="date" value="<?php echo $sdate; ?>" name="date" class="form-control" style="border-radius: 0px;" >
                                    </div>
                                    <button type="submit" class="btn btn-primary srchbtn" style="border-radius: 0px;"><span class="glyphicon glyphicon-search"></span></button>&nbsp;&nbsp;&nbsp;Search Result : <?php echo $sdate; ?>
                                </form>
                                <div class="" style="padding: 0px;border-radius: 0px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Salesman History</div>
                                        <div class="panel-body">
                                            <div class="bootstrap-table">
                                                <div class="fixed-table-container">                                            
                                                    <div class="fixed-table-body">
                                                        <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                                        </div>
                                                        <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: left; ">
                                                                        <div class="th-inner ">No</div>
                                                                        <div class="fht-cell"></div>
                                                                    </th>
                                                                    <th style="">
                                                                        <div class="th-inner ">Salesman Name</div>
                                                                        <div class="fht-cell"></div>
                                                                    </th>
                                                                    <th style="">
                                                                        <div class="th-inner ">Monthly Amount</div>
                                                                        <div class="fht-cell"></div>
                                                                    </th>
                                                                    <th style="">
                                                                        <div class="th-inner ">Paid</div>
                                                                        <div class="fht-cell"></button></div>
                                                                    </th>
                                                                    <th style="">
                                                                        <div class="th-inner ">Remaining</div>
                                                                        <div class="fht-cell"></button></div>
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <?php
                                                            $count = 1;
                                                            foreach ($slist as $value) {
                                                                ?>
                                                                <tr data-index="0">
                                                                    <td style=""><?php echo $count; ?></td>
                                                                    <td style=""><?php echo $value->name; ?></td>
                                                                    <td style=""><?php echo $value->month_amount; ?></td>
                                                                    <td style=""><?php echo $value->paid_amount; ?></td>
                                                                    <td style=""><?php echo $value->remaining_amount; ?></td>
                                                                </tr>
                                                                <?php
                                                                $count++;
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>                                                       
                                                </div>                                                        
                                            </div>
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
