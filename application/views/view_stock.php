
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">View Stock</li>
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
                        <?php echo form_open_multipart('Stock/searchstock',array('class' => 'form-inline search-report')); ?>
                            <div class="form-group">
                                <input type="text" name="iname" class="form-control" style="border-radius: 0px;" placeholder="Good Name">
                            </div>
                            <button type="submit" class="btn btn-primary srchbtn" style="border-radius: 0px;"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                        <div class="col-md-12" style="padding: 0px;border-radius: 0px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">View Stock</div>
                                <div class="panel-body">
                                    <div class="bootstrap-table">
                                        <div class="fixed-table-container">                                            
                                            <div class="fixed-table-body">
                                                <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                                </div>
                                                <!--<table class="table table-hover" data-toggle="table" data-url="tables/data2.json">-->
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: left; ">
                                                                <div class="th-inner ">Item Id</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                            <th style="text-align: left; ">
                                                                <div class="th-inner ">Item Name</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                            <th style="">
                                                                <div class="th-inner ">Quantity</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                            <th style="">
                                                                <div class="th-inner ">Unit Price</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                            <th style="">
                                                                <div class="th-inner ">Selling Price</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                            <th style="">
                                                                <div class="th-inner ">Manage</div>
                                                                <div class="fht-cell"></div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($slist as $value) {                                                           
                                                        ?>
                                                        <tr data-index="0">
                                                            <?php echo form_open_multipart('Stock/save_stock/'); ?>
                                                            <td style=""><input class="form-control" type="text" value="<?php echo $value->id; ?>" name="sid" readonly></td>
                                                            <td style=""><input class="form-control" type="text" value="<?php echo $value->stock_name; ?>" name="sname"></td>
                                                            <td style=""><input class="form-control" type="text" value="<?php echo $value->quantity; ?>" name="quantity"></td>
                                                            <td style=""><input class="form-control" type="text" value="<?php echo $value->unit_price; ?>" name="uprice"></td>
                                                            <td style=""><input class="form-control" type="text" value="<?php echo $value->sell_price; ?>" name="sprice"></td>
                                                            <td style=""><input class="btn btn-info btn-md pull-left" type="submit" value="Save" name="savestock"></td>
                                                            </form>
                                                        </tr>
                                                        <?php
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
                    </section>
                </div>
            </section>
        </div>	<!--/.main-->
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>