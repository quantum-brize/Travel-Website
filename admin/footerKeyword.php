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
<style>
   .container-fluid .card-body{padding:0px;}
</style>
<div class="wrapper">
   <div class="container-fluid">
      <div class="main-content">
         <div class="page-content">
            <!-- start page title -->
            <div class="row">
               <div class="col-md-12 col-xl-12">
                  <div class="card" style="min-height:500px;">
                     <div class="card-body">
                        <h4 class="card-title cardtitle">
                           Footer Keyword
                           <form  action="" class="newsearchsecform"  style="left:104px;"  method="get" enctype="multipart/form-data">	
                              <input type="text" name="keyword" class="form-control newsearchsec" placeholder="Search by keyword"  value="<?php echo $_REQUEST['keyword']; ?>" style="margin-top: 3px;">
                              <input name="ga" type="hidden" value="<?php echo $_REQUEST['ga']; ?>" />
                           </form>
                           <div class="float-right">
                               <a type="button" href="display.html?ga=keywordCategory" class="btn btn-secondary btn-lg waves-effect waves-light">Keyword Category</a> 

                              <?php if (strpos($LoginUserDetails["permissionAddEdit"], 'Suppliers') !== false) { ?>	<button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" onclick="loadpop('Add Keyword',this,'500px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=addKeyword">Add Keyword</button> <?php } ?>
                           </div>
                        </h4>
                        <table class="table table-hover mb-0">
                            <thead>
                              <tr>
                                 <th>Category</th>
                                 <th>Keyword</th>
                                 <th>URL</th>
                                 <th width="1%">&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                 $totalno='1';
                                 $totalmail='0';
                                 $select='';
                                 $where='';
                                 $rs=''; 
                                 $select='*'; 
                                 $wheremain=''; 
                                 
                                if($_REQUEST['keyword']!=''){
                                  $wheremain=' and keyword like "'.$_REQUEST['keyword'].'%"'; 
                                }
                                 
                                 $where=' where keyword!="" '.$wheremain.' order by id desc'; 
                                 $limit=clean($_GET['records']);
                                 $page=clean($_GET['page']); 
                                 $sNo=1; 
                                 $targetpage='display.html?ga='.$_REQUEST['ga'].'&keyword='.$_REQUEST['keyword'].'&'; 
                                 $rs=GetRecordList('*','keywordMaster','  '.$where.'  ','25',$page,$targetpage);
                                 
                                 $totalentry=$rs[1];
                                 
                                 $paging=$rs[2];  
                                 while($rest=mysqli_fetch_array($rs[0])){ 


                                    $kcm=GetPageRecord('*','keywordCategoryMaster',' id="'.$rest['categoryId'].'" ');
                                
                                    $kCategory=mysqli_fetch_array($kcm)
                                 ?>
                                <tr>
                                 <td><?php echo stripslashes($kCategory['name']); ?></td>
                                 <td><?php echo stripslashes($rest['keyword']); ?></td>
                                 <td><?php echo stripslashes($rest['url']); ?></td>
                                 <td width="1%">
                                    <a class="dropdown-item neweditpan" onclick="loadpop('Edit Keyword',this,'600px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=addKeyword&id=<?php echo encode($rest['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                 </td>
                                </tr>
                              <?php $totalno++; } ?>
                            </tbody>
                        </table>
                        <?php if($totalno==1){ ?>
                        <div style="text-align:center; padding:40px 0px; font-size:14px; color:#999999;">No Keyword Found </div>
                        <?php } else { ?>
                        <div class="mt-3 pageingouter">
                           <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">Total Records: <strong><?php echo $totalentry; ?></strong></div>
                           <div class="pagingnumbers"><?php echo $paging; ?></div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
            <!--end col-->
            <!-- end row -->
         </div>
         <!-- End Page-content -->
      </div>
   </div>
</div>