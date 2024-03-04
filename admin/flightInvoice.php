<?php 
include "inc.php";  

if($_REQUEST['id']!=''){
$a=GetPageRecord('*','flightBookingMaster',' id="'.decode($_REQUEST['id']).'" '); 
$rest=mysqli_fetch_array($a); 
 


$urs=GetPageRecord('*','sys_userMaster','  id="'.$rest['agentId'].'"  '); 
$agentData=mysqli_fetch_array($urs); 


$urs=GetPageRecord('*','sys_userMaster','  id=1  '); 
$getlogo=mysqli_fetch_array($urs); 

$ars=GetPageRecord('invoiceLogo','sys_userMaster','id=1');   
$companyLogoAdmin=mysqli_fetch_array($ars); 
} 
 
?> 

<div style="margin:auto; padding:10px;">
<style>
table { font-size:12px; color:#000000; }
</style>
<table width="100%" border="0" cellpadding="5" style="font-size:12px; border:1px solid #ddd;">
  <tr>
    <td width="34%" align="left"><img src="profilepic/<?php echo stripslashes($companyLogoAdmin['invoiceLogo']); ?>" style="width:200px; "></td>
    <td width="33%">&nbsp;</td>
    <td width="33%" align="right" valign="middle"><div style="font-size:24px; text-decoration:underline; font-weight:600">Invoice</div></td>
  </tr>
  <tr>
    <td width="34%" valign="top"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td><strong><?php echo strtoupper($getlogo['companyName']); ?></strong></td>
      </tr>
      <tr>
        <td><?php echo stripslashes($getlogo['address']); ?></td>
      </tr>
      <tr>
        <td>Tel: <?php echo stripslashes($getlogo['phone']); ?> </td>
      </tr>
      <tr>
        <td>Email: <?php echo stripslashes($getlogo['email']); ?> </td>
      </tr>
      <tr>
        <td><?php echo stripslashes($adminData['taxId']); ?></td>
      </tr>
      
    </table></td>
    <td width="33%">&nbsp;</td>
    <td width="33%" align="right" valign="top"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="right"><strong><?php if($agentData['websiteUser']==1){  echo stripslashes($agentData['name'].' '.$agentData['lastName']); } else {  echo stripslashes($agentData['companyName']); } ?></strong></td>
      </tr>
      <tr>
        <td align="right"><?php echo stripslashes($agentData['address']); ?></td>
      </tr>
      
      <tr>
        <td align="right">Mobile No: <?php echo stripslashes($agentData['phone']); ?></td>
      </tr>
      <tr>
        <td align="right">Email: <?php echo stripslashes($agentData['email']); ?></td>
      </tr>
      <tr>
        <td align="right">GSTIN: <?php echo stripslashes($agentData['gstin']); ?></td>
      </tr>
      <tr>
        <td align="right">Pan No: <?php echo stripslashes($agentData['pan']); ?></td>
      </tr>
    </table></td>
  </tr> 
  <tr>
    <td colspan="3"><hr /></td>
    </tr> 
  <tr>
    <td colspan="3"><table width="100%" border="0" cellpadding="0" style="border:1px solid #ddd;">
      <tr>
        <td width="39%"><div>Invoice no:</div>
		<div style="font-size:13px; font-weight:600;"><?php echo encode($rest['invoiceId']); ?></div>		</td>
        <td width="28%"><div>Booking Date:</div>
		<div style="font-size:13px; font-weight:600;"><?php echo date('d M Y, H:i A', strtotime($rest['bookingDate'])); ?></div></td>
        <td width="18%"><div>Pnr:</div>
		<div style="font-size:13px; font-weight:600;"><?php echo stripslashes($rest['pnrNo']); ?></div>		</td>
        <td width="15%" align="center"><div>Booked By:</div>
		<div style="font-size:13px; font-weight:600;"><?php echo stripslashes($agentData['companyName']); ?></div>
		</td>
      </tr>
    </table></td>
    </tr> 
  <tr>
    <td colspan="3"><table width="100%" border="0" cellpadding="3" cellspacing="0">
      <tr>
        <td colspan="3" style="border-bottom:1px solid #FF6633;">Onward: <span style="font-size:13px; font-weight:600;"><?php echo $rest['source']; ?>-<?php echo $rest['destination']; ?> , <?php echo $rest['flightName']; ?> <?php echo $rest['flightNo']; ?></span></td>
        <td colspan="4" align="right" style="border-bottom:1px solid #FF6633;">Travel Date: <span style="font-size:13px; font-weight:600;"><?php echo date('d M Y', strtotime($rest['journeyDate'])); ?></span></td>
        </tr>
      <tr>
        <td width="31%" align="left" style="border-bottom:1px solid #FF6633;">Name</td>
        <td width="8%" align="center" style="border-bottom:1px solid #FF6633;">Type</td>
        <td width="14%" align="center" style="border-bottom:1px solid #FF6633;">Class</td>
        <td width="13%" align="center" style="border-bottom:1px solid #FF6633;">Basic</td>
        <td width="8%" align="center" style="border-bottom:1px solid #FF6633;">YQ</td>
        <td width="13%" align="center" style="border-bottom:1px solid #FF6633;">Taxes</td>
        <td width="13%" align="center" style="border-bottom:1px solid #FF6633;">Total</td>
      </tr>
	  <?php 
		$rs6=GetPageRecord('*','flightBookingPaxDetailMaster',' BookingId="'.$rest['id'].'" and firstName!="" '); 
		$paxData=mysqli_fetch_array($rs6);
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #ddd;"><?php echo $paxData['title']; ?>&nbsp;<?php echo $paxData['firstName']; ?>&nbsp;<?php echo $paxData['lastName']; ?> <?php if(mysqli_num_rows($rs6)>1){ ?>+ <?php echo (mysqli_num_rows($rs6)-1); } ?></td>
        <td align="center" style="border-bottom:1px solid #ddd;"><?php echo ucfirst($paxData['paxType']); ?></td>
        <td align="center" style="border-bottom:1px solid #ddd;"><?php echo ucfirst($rest['flightClass']); ?></td>
        <td align="center" style="border-bottom:1px solid #ddd;"><?php echo number_format($rest['agentBaseFare']); ?></td>
        <td align="center" style="border-bottom:1px solid #ddd;">0</td>
        <td align="center" style="border-bottom:1px solid #ddd;"><?php echo number_format($rest['agentTax']); ?></td>
        <td align="center" style="border-bottom:1px solid #ddd;"><?php echo number_format($rest['agentBaseFare']+($rest['agentTax'])); ?></td>
      </tr> 
    </table></td>
    </tr> 
	<?php 
		$c=GetPageRecord('*','sys_balanceSheet',' bookingId="'.$rest['id'].'" and bookingType="flight_GST"'); 
		$balanceSheetData=mysqli_fetch_array($c); 
		
		$totalAmt=0;
	  ?>
  <tr>
    <td width="34%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
    <td width="33%" align="right"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="81%" align="right">Basic</td>
        <td width="1%" align="center">:</td>
        <td width="18%" align="right"><?php echo number_format($rest['baseFare']); $totalAmt+=$rest['agentBaseFare']; ?> INR</td>
      </tr>
      
      <tr>
        <td align="right">Taxes</td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($rest['agentTax']+$rest['agentMarkup']-($rest['agentTax']-$rest['clientTax'])); ?> INR</td>
      </tr>
     <?php if($rest['seatPrice']>0){ ?> <tr>
        <td align="right">Seat Charges</td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($seat=$rest['seatPrice']); ?> INR</td>
      </tr>
	  <?php } ?>
       <?php if($rest['mealPrice']>0){ ?> <tr>
        <td align="right">Meal Charges</td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($meal=$rest['mealPrice']); ?> INR</td>
      </tr><?php } ?>
	  <?php if($rest['extraBaggagePrice']>0){ ?>
      <tr>
        <td align="right">Extra Baggage Charges</td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($bagg=$rest['extraBaggagePrice']); ?> INR</td>
      </tr>
	  <?php } ?>
     
      <tr>
        <td align="right">Commission</td>
        <td align="center">:</td>
        <td align="right">-(<?php echo number_format($comm=$rest['agentCommision']);  ?> INR)</td>
      </tr>
       <tr>
        <td align="right">GST </td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($gst=round($rest['agentCommision']*18/100)); ?>  INR</td>
      </tr>
	   <tr>
        <td align="right">TDS </td>
        <td align="center">:</td>
        <td align="right"><?php echo number_format($tds=round($rest['agentCommision']*5/100)); ?>  INR</td>
      </tr>
      <tr>
        <td align="right"><strong>Grand Total</strong></td>
        <td align="center"><strong>:</strong></td>
        <td align="right"><div style="width:100px;"><strong><?php echo number_format($rest['agentBaseFare']+$rest['agentTax']+$seat+$meal+$bagg+$gst+$tds-round($comm=$rest['agentCommision'])); ?> INR</strong></div></td>
      </tr>
    </table></td>
  </tr> 
  <tr>
    <td colspan="3"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="53%">
		<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #ddd;">
  <tr>
    <td><div style=" font-weight:600; text-decoration: underline;">Terms & Condition</div>
		<div>1) All payment should be made in the name of The Pench
International".
</div> </td>
  </tr>
</table>
		</td>
        <td width="47%" align="center"><div style=" font-weight:600;">For <?php echo strtoupper($adminData['companyName']); ?>.</div>
		<div>Computer Generated Report, Requires No Signature</div>		</td>
      </tr>
    </table></td>
    </tr>
</table>


</div>
<script> window.print(); </script>