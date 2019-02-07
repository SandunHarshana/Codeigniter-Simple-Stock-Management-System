
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Add Stock</li>
                </ol>
            </div><!--/.row-->

            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <?php
                            if(isset($success)){
                                echo '<div class="alert bg-success" id="error" role="alert">
                                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>'.$success.' <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove" onclick="hide();"></span></a>
                                </div>'; 
                            }else if(isset($error)){
                                echo '<div class="alert bg-danger" id="error" role="alert">
                                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'.$error.' <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove" onclick="hide();"></span></a>
                                </div>'; 
                            }
                        ?>                               
                        <div class="col-md-12" style="padding: 0px;border-radius: 0px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">Add Stock</div>
                                <div class="panel-body">
                                    <div class="bootstrap-table">
                                        <div class="fixed-table-container">                                            
                                            <div class="fixed-table-body">
                                                <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                                </div>
                                                <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                                <?php echo form_open_multipart('Stock/added_stock/'); ?>    
                                                    <tbody>
                                                        <tr data-index="0">
                                                            <td style="width: 30%">Good Name</td>
                                                            <td style=""><input id="goodname" name="goodname" placeholder="good name" class="form-control" type="text" required></td>
                                                        </tr>
                                                        <tr data-index="0">
                                                            <td style="">Quantity</td>
                                                            <td style=""><input id="quantity" name="quantity" placeholder="10" class="form-control" type="text" required></td>
                                                        </tr>
                                                        <tr data-index="0">
                                                            <td style="">Buying Price</td>
                                                            <td style=""><input id="price" name="price" placeholder="12000" class="form-control" type="text" required></td>
                                                        </tr> 
                                                        <tr data-index="0">
                                                            <td style="">Selling Price</td>
                                                            <td style=""><input id="sell_price" name="sell_price" placeholder="12500" class="form-control" type="text" required></td>
                                                        </tr> 
                                                        <tr data-index="0">
                                                            <td style=""></td>
                                                            <td style=""><button type="submit" class="btn btn-info btn-md pull-left " >Submit</button></td>
                                                        </tr>
                                                    </tbody>
                                                </form>
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
