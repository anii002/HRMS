<?php
$GLOBALS['flag']="5.9";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
  
	#info1 {
	border: 1px solid black;
    display : none;
	page-break-after:always;
    } 
	#info2 {
    display : none;
    }   
	#info3 {
    display : none;
    }
    #info4 {
    display : none;
    }
 
}
 @media print{
   .content{
    background: #fff !important;
   }
   .content-wrapper{
    background: #fff !important;
   }
 }
 
 .box.box-info {
    border-top-color: #ccc;
  }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
          border : 1px solid #ccc;
        }
        .table-bordered {
            border: 1px solid #ccc;
        }
	
	#info1 {
    display : none;
  page-break-after:always;
  
      } 
  #info2 {
    display : none;
    }   
  #info3 {
    display : none;
      }
      #info4 {
    display : none;
      }
	
  .borderbox{
	  border: 1px solid black !important;
	  overflow: hidden;
  }
  .summary-total{
	  width: 33% !important;
	  margin: 0px auto;
  }
</style>

		
<div class="">			
<div class="page-content-wrapper">
		<div class="page-content">
		
	        <div class="page-bar">
            	<ul class="page-breadcrumb">
            		<li>
            			<i class="fa fa-home"></i>
            			<a href="index.php">Home / मुख पृष्ठ</a>
            			<i class="fa fa-angle-right"></i>
            		</li>
            		<li>
            			<a href="#">Saved Contingency Details</a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b>Saved Contigency Details</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
				</div>
	<div class="portlet-body form">
						
	<form method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
			
					<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<th>Reference No</th>
											<th>Month</th>
											<th><center>Year</center></th>
											<th>Date</th>
											<th><center>From</center></th>
											<th><center>To</center></th> 
											<th><center>Kms</center></th> 
											<th><center>Total Amount</center></th> 
											<th><center>Objective</center></th> 
											<!-- <th>Action</th>  -->								
										</tr>										
									</thead>
									<tbody align="center">
									<?php
											//echo $_GET['empid'];
											$qry = mysql_query("SELECT id,`reference`, `month`, `year`,empid FROM `continjency_master` WHERE reference='".$_GET['ref_no']."' AND empid = '".$_GET['empid']."'");
											while($row = mysql_fetch_array($qry))
											{
											$id = $row['id'];
											$qry1 = mysql_query("SELECT * FROM `continjency` WHERE cid = '$id'");
											$cnt=1;
											$trows=mysql_num_rows($qry1);
											while($row1 = mysql_fetch_array($qry1))
											{
										?>
										<tr>
											<?php 
												if($cnt == 1){
											?>
											<td rowspan="<?php echo $trows;?>"><?php echo $row['reference']; ?></td>
											<?php 
												}
											?> 
											<!-- <td><?php echo $row['reference']; ?></td> -->
											<td><?php echo $row['month']; ?> </td>
											<td><?php echo $row['year']; ?></td>
											<td><?php echo $row1['cntdate']; ?></td>
											<td><?php echo $row1['cntfrom']; ?></td>
											<td><?php echo $row1['cntTo']; ?></td>
											<td><?php echo $row1['kms']; ?></td>
											<td><?php echo $row1['total_amount']; ?></td>
										<!-- 	<td><?php echo $row1['objective']; ?></td> -->
											<?php 
												if($cnt == 1){
											?>
											<td rowspan="<?php echo $trows;?>"><?php echo $row1['objective']; ?></td>
											<?php 
												}
											?> 
											<?php 
												if($cnt == 1){
											?>
											<!-- <td width="10%" rowspan='<?php echo $total_rows; ?>'> 
												<a href="#" class="btn blue btn_action">Update</a>
												<br>
												<a data-toggle="modal" href="#delete_ta" id="<?php echo $row1['set_number']; ?>" style="margin-top: 2px;" class="btn red btn_action">Delete</a>
												<br>	
											</td> -->
											 <?php } ?>
											 <?php $cnt++; ?>											
										</tr>
										<?php 
											}
										?>
										<tr><td colspan="13" style="background-color: #fcf8e3a3;"></td></tr>
										 <?php } ?> 
									</tbody>
								</table>
							</div>

							<!-- <div class="text-right">
								<button class="btn yellow">Print</button>
							</div> -->
						</div>
						
						<div class="col-md-4"></div>
						</div>
						
						<div class="col-md-12 trackprint-btn">
							<ul>
										<li><a href="otp_forward_con.php?reference_no=<?php echo $_GET['ref_no'];?>&empid=<?php echo $_GET['empid'];?>" class="btn green"  class="hide_print btn btn-primary pull-right" >Forword To</a></li>
							</ul>
						</div>
					</div>
					</div>
					
				</div>
			</div>
	</div>
	
</form>				

			
			</div>
		</div>
	</div>
	</div>
	
<?php
	include 'common/footer.php';
?>



<!-- File export script -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

   

</script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>