<?php
include "inc.php";   
echo 'id="'.$_REQUEST['id'].'"';
$abcd=GetPageRecord('*','sys_packageBuilder','id="'.$_REQUEST['id'].'"'); 
$result=mysqli_fetch_array($abcd); 
if($result['id']!=''){

$select='*'; 
$where='id="'.$result['addedBy'].'"'; 
$rs=GetPageRecord($select,'sys_userMaster',$where); 
$LoginUserDetails=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
 <title><?php echo stripslashes($result['name']); ?> - <?php echo $clientnameglobal; ?></title> 
 <?php include "headerinc.php"; ?>
</head>

<body>
<?php include "itineraries_final.php"; ?>

<?php }  else { ?>
<div style="padding-top:50px; font-size:30px; text-align:center;">Access Denied</div>
<div style="padding-top:20px; font-size:15px; text-align:center;">You don't currently have permission to access this itinerary.</div>
<?php } ?>
</body>
</html>
