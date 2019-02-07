

function remaincalculate(){
    var monthlyamount=document.getElementById("monthly_amount").value;
    var paidamount=document.getElementById("paid_amount").value;
    
    document.getElementById("remain").value = monthlyamount - paidamount;
    
}

