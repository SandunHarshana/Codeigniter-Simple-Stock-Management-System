
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">All Invoice</li>
                </ol>
            </div><!--/.row-->

            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">                        
                        <div class="nav-tabs-custom">                            
                            <div class="tab-content">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="pending" style="position: relative;">
                                    <div class="" style="padding: 0px;border-radius: 0px;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Pending Invoice</div>
                                            <div class="panel-body">
                                                <div class="bootstrap-table">
                                                    <div class="fixed-table-container">                                            
                                                        <div class="fixed-table-body">
                                                            <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                                            </div>
                                                            <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="">
                                                                            <div class="th-inner ">Bill No</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Customer Name</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Contact</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Amount</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Remain</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Date</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Added By</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Current Status</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">Invoice Manage</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                        <th style="">
                                                                            <div class="th-inner ">View</div>
                                                                            <div class="fht-cell"></div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($alllist as $value) { 
                                                                        if($value->id != NULL){                                                                        
                                                                    ?>
                                                                    <tr data-index="0">
                                                                        <td style=""><?php echo $value->bill_no; ?></td>
                                                                        <td style=""><?php echo $value->customer_name; ?></td>
                                                                        <td style=""><?php echo $value->contact; ?></td>
                                                                        <td style=""><?php echo $value->amount; ?></td>
                                                                        <td style=""><?php echo $value->amount - $value->ttl; ?></td>
                                                                        <td style=""><?php echo $value->payment_date; ?></td>
                                                                        <td style=""><?php echo $value->email; ?></td>
                                                                        <td style="">
                                                                            <?php
                                                                                if($value->status == "PENDING"){
                                                                                    echo '<center title="Pending"><svg class="glyph stroked hourglass" style="width: 30px;height: 30px;background-color: #bafff5;border-radius:50%;color: #00edff"><use xlink:href="#stroked-hourglass"/></svg></center>';
                                                                                }else if($value->status == "COMPLETE"){
                                                                                    echo '<center title="Completed"><svg class="glyph stroked checkmark" style="width: 30px;height: 30px;background-color: #bafff5;border-radius:50%;color: #00edff"><use xlink:href="#stroked-checkmark"/></svg></center>';
                                                                                }else if($value->status == "CANCEL"){
                                                                                    echo '<center title="Canceled"><svg class="glyph stroked cancel" style="width: 30px;height: 30px;background-color: #F8769F;border-radius:50%;color: rgb(255, 0, 0)"><use xlink:href="#stroked-cancel"/></svg></center>';
                                                                                }else if($value->status == "RETURN"){
                                                                                    echo '<center title="Returned"><svg class="glyph stroked chevron down" style="width: 30px;height: 30px;background-color: rgb(195, 255, 186);border-radius:50%;color: rgb(21, 200, 111)"><use xlink:href="#stroked-chevron-down"/></svg></center>';
                                                                                }
                                                                            ?>                                                                            
                                                                        </td>
                                                                        <td style="">
                                                                            <center>
                                                                                <a title="Do Complete" href="change_monthly_invoice_status/<?php echo $value->id; ?>/COMPLETE/<?php echo $value->good; ?>/<?php echo $value->quantity; ?>"><svg class="glyph stroked checkmark" style="width: 30px;height: 30px;background-color: #bafff5;border-radius:50%;color: #00edff"><use xlink:href="#stroked-checkmark"/></svg></a>
                                                                                <a title="Do Cancel" href="change_monthly_invoice_status/<?php echo $value->id; ?>/CANCEL/<?php echo $value->good; ?>/<?php echo $value->quantity; ?>"><svg class="glyph stroked cancel" style="width: 30px;height: 30px;background-color: #F8769F;border-radius:50%;color: rgb(255, 0, 0)"><use xlink:href="#stroked-cancel"/></svg></a>                                                                
                                                                                <a title="Do Pending" href="change_monthly_invoice_status/<?php echo $value->id; ?>/PENDING/<?php echo $value->good; ?>/<?php echo $value->quantity; ?>"><svg class="glyph stroked hourglass" style="width: 30px;height: 30px;background-color: #bafff5;border-radius:50%;color: #bafff5"><use xlink:href="#stroked-hourglass"/></svg></a>
                                                                            </center>
                                                                        </td>
                                                                        <td style="">
                                                                            <a title="View" href="view_invoice_details/<?php echo $value->id; ?>"><center><svg class="glyph stroked arrow right" style="width: 30px;height: 30px;background-color: #bafff5;border-radius:50%;color: #00edff"><use xlink:href="#stroked-arrow-right"/></center></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                        }else{
                                                                            echo '<tr><td><span style="color : red;">No Invoice for this condition...</span></td></tr>';
                                                                        }
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
