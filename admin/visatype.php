 

<div class="wrapper">
<div class="container-fluid">
<div class="main-content">

                <div class="page-content">

      
                    
                    <!-- start page title -->
                     
              
                        <div class="row">
                        <div class="col-md-12 col-xl-12">
						<div class="card" style="min-height:500px;">
                            <div class="card-body" style="padding:0px;"> 
                                    <h4 class="card-title cardtitle">Visa Type 
                                      <div class="float-right">
								 
									
								 <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"  onclick="loadpop('Visa Type',this,'800px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=visatype">Add New </button>  
									</div></h4> 
							  <table class="table">
							<thead>
								<tr>
								    <th>Name</th>
									<th width="1%">Status</th>
									<th width="1%">Date</th>
									<th width="1%">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php 
$limit=clean($_GET['records']);
$page=clean($_GET['page']); 
$sNo=1; 
$targetpage='display.html?ga='.$_REQUEST['ga'].'&'; 
$rs=GetRecordList('*','VisaTypeMaster',' where addedBy=1 order by id asc ','100',$page,$targetpage); 
$totalentry=$rs[1]; 
$paging=$rs[2];  
while($rest=mysqli_fetch_array($rs[0])){

	$ct=GetPageRecord('*','countryMaster',' id= "'.$rest['country_id'].'" '); 
	$country=mysqli_fetch_array($ct);
?>
								
<tr>
<td align="left" valign="top"><?php echo stripslashes($rest['name']); ?></td>
	
	<td width="1%" align="left" valign="top"><?php echo newstatusbadges($rest['status']); ?></td>
	
	<td width="1%" align="left" valign="top"><div style="width:100px;"><?php echo date("d-m-Y",strtotime($rest['dateAdded'])); ?></div></td>
	
	<td width="1%" align="left" valign="top">
		<a  onclick="loadpop('Edit Visa Type',this,'500px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=visatype&id=<?php echo encode($rest['id']); ?>" style="cursor:pointer;">
	<button type="button" class="btn alpha-primary text-primary-800 btn-icon"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>	 	</td>
							  </tr>
								 <?php $sNo++; } ?>
							</tbody>
			  </table>
                                         
                           
									 <?php if ($sNo == 1) { ?>
                  <div style="text-align:center; padding:40px 0px; font-size:14px; color:#999999;">No Data </div>
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

    </div>

        <!-- End Page-content -->

         
    </div>
	</div>	</div>