<?php
include "inc.php"; 
include "config/logincheck.php";  
$selectedpage='';
$selectleft='topup-recharge';
$bookingServiceType='booking';

 
 if($LoginUserDetails['userType']=='agent'){ } else {
header("Location:".$fullurl."");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Top Up Request - <?php echo stripslashes($getcompanybasicinfo['companyName']); ?></title> 
<?php include "headerinc.php"; ?>

<style>
.topupcol { border: 1px solid #ddd; background-color: #F9F9F9; margin: 0px 10px; border-radius: 5px; line-height: 25px; }
</style>
</head>

<body class="greyouter">
  <?php include "header.php"; ?>



<!--------------Left Menu---------------->


<?php include "left.php"; ?>





<!--------------Mid Body---------------->


<section class="profile">
        <div class="listcontent">
<h3 style="margin-bottom: 10px; font-size: 20px; font-weight: 700; position:relative; width:100%;">Online Recharge  </h3>
            <div class="card ">
			<div class="tbtabcontent" style="border-top-left-radius: 14px;">
                <div class="card-body" style="padding:0px;">

 
  <div class="row ">
  <div style="font-weight:600; font-size:13px; margin-bottom:10px; margin-top:20px;">SELECT AMOUNT</div>
  <div class="col-lg-2 topupcol">
<div class="card">
<label>
<div class="card-body" style="text-align:center; cursor:pointer;">
<div style="font-size:22px; text-align:center; font-weight:600;">₹5000</div>
<input name="amount" type="radio" style="height: 20px; width: 20px;" value="5000" checked>
</div>
</label>
</div>
</div>
<div class="col-lg-2 topupcol">
<div class="card">
<label>
<div class="card-body" style="text-align:center; cursor:pointer;">
<div style="font-size:22px; text-align:center; font-weight:600;">₹10000</div>
<input name="amount" type="radio" value="10000" style="height: 20px; width: 20px;">
</div>
</label>
</div>
</div>
<div class="col-lg-2 topupcol">
<div class="card">
<label>
<div class="card-body" style="text-align:center; cursor:pointer;">
<div style="font-size:22px; text-align:center; font-weight:600;">₹15000</div>
<input name="amount" type="radio" value="15000" style="height: 20px; width: 20px;">
</div>
</label>
</div>
</div>
<div class="col-lg-2 topupcol">
<div class="card">
<label>
<div class="card-body" style="text-align:center; cursor:pointer;">
<div style="font-size:22px; text-align:center; font-weight:600;">₹20000</div>
<input name="amount" type="radio" value="20000" style="height: 20px; width: 20px;">
</div>
</label>
</div>
</div>

<div class="col-lg-2 topupcol">
<div class="card">
<label>
<div class="card-body" style="text-align:center; cursor:pointer;">
<div style="font-size:22px; text-align:center; font-weight:600;"><div style="font-size:12px;">Enter Amount</div><input min="1" name="customamount" id="customamount" type="number" value=""   style="font-size: 15px; width: 100%; text-align: center; padding:7px; border: 1px solid #ddd;">
</div>
 
</div>
</label>
</div>
</div>
  </div>
<hr>
<div style="width:100%; margin-top:10px;"><button type="button" class="btn btn-secondary btn-icon btn-sm" onClick="payonlinenow();" style="background-color: #09b598; border: 0px; padding: 12px 30px;">Pay Now</button></div>

</div>
</div>

        </div>
        </div>
    </section>




<!-- HTML -->
<?php
	$_SESSION['serviceId']=encode(time()+$_SESSION['agentUserid']);
	include "footerinc.php";
?>

<script>

var childWindow;

function bookingFormSubmit(){
	
	
	childWindow.close();
	window.location.href = "<?php echo $fullurl; ?>balance-sheet";
}

function allBookingSubmit(){
	window.location.href = "<?php echo $fullurl; ?>balance-sheet";
}

function payonlinenow(){ 
var firstNameAdt = encodeURI($('#firstNameAdt1').val());
var lastNameAdt = encodeURI($('#lastNameAdt1').val());
var email = encodeURI($('#email').val());
var userphone = encodeURI($('#userphone').val()); 
 

var amount = $('input[name="amount"]:checked').val();
var totalamount = Number($('#customamount').val());
var finalamount=0;
if(totalamount>0){
finalamount =  totalamount;
} else {  
finalamount =  amount;
} 
 childWindow = window.open('online-recharge?b=1&bamount='+finalamount+'&firstNameAdt='+firstNameAdt+'&lastNameAdt='+lastNameAdt+'&email='+email+'&userphone='+userphone+'&z=<?php echo encode($_SESSION['agentUserid']); ?>&type=wallet&bType=<?php echo $_SESSION['serviceId']; ?>&b2brecharge=1', '_blank');
 
}
</script>
<input name="firstNameAdt1" id="firstNameAdt1" type="hidden" value="<?php echo $LoginUserDetails['firstName']; ?>">
<input name="lastNameAdt1" id="lastNameAdt1" type="hidden" value="<?php echo $LoginUserDetails['lastName']; ?>">
<input name="email" id="email" type="hidden" value="<?php echo $LoginUserDetails['email']; ?>">
<input name="userphone" id="userphone" type="hidden" value="<?php echo $LoginUserDetails['phone']; ?>">
</body>
</html>