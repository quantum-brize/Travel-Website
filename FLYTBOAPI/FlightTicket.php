<?php
//include dirname(__FILE__).'/APIConstants.php';
//include dirname(__FILE__).'/RestApiCaller.php';
//header("Content-Type: application/json");
$auth=array();
$Rurl = APITICKET;

$auth["SiteName"]="";
$auth["AccountCode"]="";
$auth["UserName"]=APIUSERNAME;
$auth["Password"]=APIPASSWORD;

 $opta = array( 
 
					"EndUserIp" => $_SESSION['EndUserIp'],
					"TokenId" => $_SESSION['tbotokenId'],
					"TraceId" => $_SESSION['TraceId'],              
				    "PNR" => $pnrTbo,
				    "BookingId" => $tboBookingId,
                );
 
$ticket_result=array();
try
{
$req=str_replace('\/','/',json_encode($opta));
$req=file_put_contents("FLYTBOJSON/".$tboBookingId."_AirgennieTicketReq.txt","$req");
  
$postdata = file_get_contents("FLYTBOJSON/".$tboBookingId."_AirgennieTicketReq.txt","$req"); //Take JSON input from Postman Client
//echo $postdata;
$header = array('Content-Type: application/json', 'Accept-Encoding: gzip');
$restCaller = new RestApiCaller();
$flightRes = $restCaller->post($Rurl, $postdata, $header);

$results=file_put_contents("FLYTBOJSON/".$tboBookingId."_AirgennieTicketRes.txt","$flightRes");
$ticket_result = json_decode($flightRes,true);
}
catch(Exception $e)
{
  
    $errhdng="Technical Error !!";
    $errmsg="Sorry Due To Some Technical Issue, Flights Result Are Not Found.";
    include dirname(dirname(__FILE__)).'/error.php';
    exit;
}

//echo '<pre>';print nl2br(print_r($ticket_result, true));echo '</pre>'; exit;
?>