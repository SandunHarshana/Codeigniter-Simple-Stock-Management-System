
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Add Invoice</li>
                </ol>
            </div><!--/.row-->

            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <?php
                        $date = date('Y-m-d', strtotime('+2 month', strtotime('2015-01-29')));
                        //echo 'xx:'.$date;
                            if(FALSE){
                                echo '<div class="alert bg-danger" id="error" role="alert">
                                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'.$error.' <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove" onclick="hide();"></span></a>
                                </div>'; 
                            }
                        ?>                               
                        <div class="col-md-12" style="padding: 0px;border-radius: 0px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">Add Invoice</div>
                                <div class="panel-body">
                                    <div class="bootstrap-table">
                                        <div class="fixed-table-container">                                            
                                            <div class="fixed-table-body">
                                                <div style="top: 37px; display: none;" class="fixed-table-loading">Loading, please wait…
                                                </div>
                                                <table class="table table-hover" data-toggle="table" data-url="tables/data2.json">
                                                    <?php echo form_open_multipart('Invoice/added_invoice/'); ?> 
                                                        <tbody>
                                                            <tr data-index="0">
                                                                <td style="width: 30%">Bill No<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="name" name="billno" placeholder="Bill Number" class="form-control" type="text" value="1">
                                                                    <span style="font-size: 12px;"><?php echo form_error('billno'); ?></span>
                                                                </td>                                                                
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Register No<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="name" name="regno" placeholder="Register Number" class="form-control" type="text" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('regno'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Customer Name<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="name" name="customername" placeholder="Customer Name" class="form-control" type="text" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('customername'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Address<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <textarea class="form-control" id="message" name="address" placeholder="Address" rows="5" ></textarea>
                                                                    <span style="font-size: 12px;"><?php echo form_error('address'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Contact</td>
                                                                <td style="">
                                                                    <input id="name" name="contact" placeholder="Contact Number" class="form-control" type="text" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('contact'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">NIC</td>
                                                                <td style="">
                                                                    <input id="name" name="nic" placeholder="NIC" class="form-control" type="text">
                                                                    <span style="font-size: 12px;"><?php echo form_error('nic'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Salesman Name<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <select class="form-control" name="salesmanname">
                                                                        <?php
                                                                            echo '<option value="0">Select Salesman Name</option>';  
                                                                            foreach ($slist as $value) {                                                                    
                                                                                echo '<option value="'.$value->id.'">'.$value->name.'</option>';                                                                    
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <span style="font-size: 12px;"><?php echo form_error('salesmanname'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Good Name<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <select class="form-control" name="goodname" id="goods" onchange="getamount()">
                                                                        <?php
                                                                            echo '<option value="0">Select Stock Item</option>';                                                                    
                                                                            foreach ($glist as $value) {                                                                    
                                                                                echo '<option value="'.$value->id.'">'.$value->stock_name.'</option>';                                                                    
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <span style="font-size: 12px;"><?php echo form_error('goodname'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Quantity<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="name" name="quantity" placeholder="Quantity" class="form-control" type="text" value="1" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('quantity'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Amount<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="amount" name="amount" placeholder="Amount" class="form-control" type="text" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('amount'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Monthly Amount<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input id="monthlyamount" name="monthlyamount" placeholder="Monthly Amount" class="form-control" type="text" >
                                                                    <span style="font-size: 12px;"><?php echo form_error('monthlyamount'); ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-index="0">
                                                                <td style="">Payment Date<span style="color:red">*</span></td>
                                                                <td style="">
                                                                    <input name="paymentdate" class="form-control" style="border-radius: 0px;width: 200px;" type="date">
                                                                    <span style="font-size: 12px;"><?php echo form_error('paymentdate'); ?></span>
                                                                </td>
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


<script type="text/javascript">
var urllink='http://localhost/danaro/admin/index.php/';
var urllink2='http://danarodistribution.com/admin/';
var xmlHttp;

function getamount(){
    var iid=document.getElementById("goods").value;
    if(iid !=0){ 
        createXMLHttpRequest();
        xmlHttp.open("POST", urllink+"Stock/getAmount", true);
        xmlHttp.onreadystatechange=function() {
            if (xmlHttp.readyState==4 && xmlHttp.status==200) {
                var ss=xmlHttp.responseText;
                document.getElementById("amount").value=ss; 
                document.getElementById("monthlyamount").value=ss/6; 
            }
        }
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var vars = "id="+iid;
        xmlHttp.send(vars);
    }else{
        document.getElementById("amount").innerHTML = '0';
    }
}

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}

</script>