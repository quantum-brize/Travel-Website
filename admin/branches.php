<?php 
$u = decode($_REQUEST['u']);

if($_REQUEST['u']==''){
$u=$_SESSION['userid'];
}
$abcd=GetPageRecord('*','userMaster','id="'.$u.'"'); 
$result=mysqli_fetch_array($abcd); 
?>
 <script src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
selector: "#emailsignature",
themes: "modern",
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<div class="wrapper">
<div class="container-fluid">
<div class="main-content">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="left" valign="top" >
<?php include "settingleft.php"; ?>
	
	</td>
    <td align="left" valign="top" width="90%"><div class="page-content">

      <div class="newboxheading"><div class="newhead">Branches<div class="newoptionmenu">
  	
		<div> <?php if (strpos($LoginUserDetails["permissionAddEdit"], 'RoomType') !== false) { ?>	<button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"  onclick="loadpop2('Add Branch',this,'400px')" data-toggle="modal" data-target="#myModal2" data-backdrop="static"  popaction="action=addbranch" >Add Branches</button> <?php } ?></div>	
		<div> <form  action=""  class=" "  style="left:94px;"  method="get" enctype="multipart/form-data">	
								  <input type="text" name="keyword" class="form-control newsearchsec"  placeholder="Search by name"  value="<?php echo $_REQUEST['keyword']; ?>" style="margin-top: 3px;">
								  <input name="ga" type="hidden" value="<?php echo $_REQUEST['ga']; ?>" />
								  </form></div>					 
								  
 </div>
 </div>     
 
     
</div>
                    
                    <!-- start page title -->
                     
              
                        <div class=" ">
                        <div class="col-md-12 col-xl-12" style="padding-top:32px;">
						<div >
                            <div class="card-body"> 
                                      
							  
                                        <table class="table table-hover mb-0">

                                            <thead>
                                                <tr>
                                                  <th>Branch</th>
                                                    <th>Destinations</th>
                                                    <th>Status</th>
                                                    <th align="left">By</th>
                                                    <th>Date</th>
                                                    <th width="1%">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$wheres='';
if($_REQUEST['keyword']!=''){
$wheres=' and  name like "%'.$_REQUEST['keyword'].'%" ';
}

$totalno='1';
$totalmail='0';
$select='';
$where='';
$rs=''; 
$select='*'; 
$wheremain=''; 
$where=' where name!="" '.$wheres.' order by id desc'; 
$limit=clean($_GET['records']);
$page=clean($_GET['page']); 
$sNo=1; 
$targetpage='display.html?ga='.$_REQUEST['ga'].'&keyword='.$_REQUEST['keyword'].'&'; 
$rs=GetRecordList('*','branchMaster','  '.$where.'  ','25',$page,$targetpage);

$totalentry=$rs[1];

$paging=$rs[2];  
while($rest=mysqli_fetch_array($rs[0])){ 
?>

<tr>
  <td><?php echo stripslashes($rest['name']); ?></td>
  <td><?php echo stripslashes($rest['destinations']); ?></td>
  <td><?php echo newstatusbadges($rest['status']); ?></td>
<td align="left"><?php echo addbynewbadges($rest['addedBy']); ?></td>
<td><?php echo date('d-m-Y', strtotime($rest['dateAdded'])); ?></td>
<td width="1%">
<a class="dropdown-item neweditpan"  onclick="loadpop2('Edit Branch',this,'400px')" data-toggle="modal" data-target="#myModal2" data-backdrop="static"  popaction="action=addbranch&id=<?php echo encode($rest['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
</tr>


<?php $totalno++; } ?>
                                            </tbody>
                                        </table>
                           
									 <?php if($totalno==1){ ?>
						   <div style="text-align:center; padding:40px 0px; font-size:14px; color:#999999;">No Branch</div>
						   <?php } else { ?>
								<div class="mt-3 pageingouter">	
										<div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">Total Records: <strong><?php echo $totalentry; ?></strong></div>
											<div class="pagingnumbers"><?php echo $paging; ?></div>
											
							  </div>
										  
										<?php } ?>
						  </div>
								 
                             
</div>
                             

                        </div>

                         
						
						
						
						 
                     

             </div><!--end col-->

            <!-- end row -->

    </div></td>
  </tr>
</table>
                

        <!-- End Page-content -->

         
    </div>
	</div>	</div>