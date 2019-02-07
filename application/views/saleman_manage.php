
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Manage Salesman</li>
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
                            <div class="tab-content">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-manage" style="position: relative;">
                                    <?php echo form_open_multipart('Home/add_salesman',array('class' => 'form-inline search-report')); ?>
                                        <div class="form-group">
                                            <input type="text" name="salesman_name" class="form-control" style="border-radius: 0px;" placeholder="Salesman Name" required>
                                        </div>
                                        <button title="Add Salesman" type="submit" class="btn btn-primary srchbtn" style="border-radius: 0px;"><span class="glyphicon glyphicon-plus"></span></button>
                                    </form>
                                    <div class="" style="padding: 0px;border-radius: 0px;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Salesman List</div>
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
                                                                            <div class="th-inner ">Date</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Manage</div>
                                                                            <div class="fht-cell"></button></div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <?php
                                                                $count = 1;
                                                                foreach ($slist as $value) {
                                                                    ?>
                                                                    <?php echo form_open_multipart('Home/update_salesman/'.$value->id); ?>
                                                                    <tr data-index="0">
                                                                        <td style=""><?php echo $count; ?></td>
                                                                        <td style="">
                                                                            <input value="<?php echo $value->name; ?>" id="name" name="sname" placeholder="Salesman Name" class="form-control" type="text" required>
                                                                        </td>
                                                                        <td style=""><?php echo $value->date; ?></td>
                                                                        <td style="">
                                                                            <button type="submit" class="btn btn-info btn-md pull-left" >Save</button>
                                                                        </td>
                                                                    </tr>
                                                                    </form>
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
                        </div>                        
                    </section>
                </div>
            </section>
        </div>	<!--/.main-->
    </body>
</html>
