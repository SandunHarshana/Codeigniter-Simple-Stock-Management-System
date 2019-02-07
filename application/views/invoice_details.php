
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Invoice Details</li>
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
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">This Month Payment</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Total Monthly Payments</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                                    <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                    </div>
                                    <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                        <?php
                                        foreach ($invoDetails as $value) {
                                        ?>
                                        <?php echo form_open_multipart('Invoice/add_payment/'.$value->id); ?>                                         
                                        <tbody>                                            
                                            <tr data-index="0">
                                                <td style="width: 30%">Invoice Id<span style="color:red">*</span></td>
                                                <td style="">
                                                    <input id="name" name="invoice_id" value="<?php echo $value->id; ?>" class="form-control" type="text" readonly>
                                                    <span style="font-size: 12px;"><?php echo form_error('invoice_id'); ?></span>
                                                </td>                                                                
                                            </tr>
                                            <tr data-index="0">
                                                <td style="">Date To Be Paid<span style="color:red">*</span></td>
                                                <td style="">
                                                    <input id="name" value="<?php echo $value->payment_date; ?>" name="date_tobe_paid" placeholder="" class="form-control" type="text" readonly>
                                                    <span style="font-size: 12px;"><?php echo form_error('date_tobe_paid'); ?></span>
                                                </td>
                                            </tr>
                                            <tr data-index="0">
                                                <td style="">Monthly Amount<span style="color:red">*</span></td>
                                                <td style="">
                                                    <input id="monthly_amount" name="monthly_amount" value="<?php echo $value->monthly_amount; ?>" placeholder="" class="form-control" type="text" >
                                                    <span style="font-size: 12px;"><?php echo form_error('monthly_amount'); ?></span>
                                                </td>
                                            </tr>                                            
                                            <tr data-index="0">
                                                <td style="">Paid Amount</td>
                                                <td style="">
                                                    <input id="paid_amount" name="paid_amount" placeholder="" class="form-control" onchange="remaincalculate()" type="text" >
                                                    <span style="font-size: 12px;"><?php echo form_error('paid_amount'); ?></span>
                                                </td>
                                            </tr>
                                            <tr data-index="0">
                                                <td style="">Remaining Amount</td>
                                                <td style="">
                                                    <input id="remain" name="remain" placeholder="" class="form-control" type="text">
                                                    <span style="font-size: 12px;"><?php echo form_error('remain'); ?></span>
                                                </td>
                                            </tr>
                                            <tr data-index="0">
                                                <td style="">Paid Date<span style="color:red">*</span></td>
                                                <td style="">
                                                    <input name="paid_date" class="form-control" style="border-radius: 0px;width: 200px;" type="date">
                                                    <span style="font-size: 12px;"><?php echo form_error('paid_date'); ?></span>
                                                </td>
                                            </tr>
                                            <tr data-index="0">
                                                <td style=""></td>
                                                <td style=""><button type="submit" class="btn btn-info btn-md pull-left " >Submit</button></td>
                                            </tr>                                            
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                        </form>
                                    </table>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative;">
                                    <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left; ">
                                                    <div class="th-inner ">ID</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Invoice Id</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Monthly Amount</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Paid Amount</div>
                                                    <div class="fht-cell"></div>
                                                </th> 
                                                <th style="text-align: left; ">
                                                    <div class="th-inner ">Remaining Amount</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Paid To Be</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Paid Date</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="">
                                                    <div class="th-inner ">Added By</div>
                                                    <div class="fht-cell"></div>
                                                </th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($paymentDetails as $value) {
                                                if($value->invoice_id != NULL){  
                                            ?>
                                            <tr data-index="0">
                                                <td style=""><?php echo $value->id; ?></td>
                                                <td style=""><?php echo $value->invoice_id; ?></td>
                                                <td style=""><?php echo $value->month_amount; ?></td>
                                                <td style=""><?php echo $value->paid_amount; ?></td>
                                                <td style=""><?php echo $value->remaining_amount; ?></td>
                                                <td style=""><?php echo $value->date_to_be_paid; ?></td>
                                                <td style=""><?php echo $value->paid_date; ?></td>
                                                <td style=""><?php echo $value->email; ?></td>
                                            </tr>  
                                            <?php                                            
                                                }else{
                                                    echo '<tr><td><span style="color : red;">No Payments for this invoice...</span></td></tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>	
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>	<!--/.main-->
    </body>
</html>