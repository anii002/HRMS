<?php
	$GLOBALS['flag']="4.100";
	include('common/header.php');
	include('common/sidebar1.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-Transfer_Registration
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-Transfer_Registration</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
						<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
						<!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
						<!-- <i class="fa fa-angle-down"></i> -->
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>Transfer_Registration DETAILS 2019
							</div>
							
						</div>
						<div class="portlet-body">
						
						
						
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
							</div>
							
							
						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
							<th colspan="6"><center>TRANSFER REGISTRATION DETAILS - 2019</center></th>
							</tr>
							<tr>
								<th>Sr No</th>
								<th>Transfer Registration</th>
								<th>DEPARTMENT</th>
								<th>Action</th>
								
								
					
								
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon1();
							$qry = mysql_query("SELECT * FROM `transfer_registration`");
							//$row = mysql_fetch_array($qry);
							//print_r($row);
							while($row = mysql_fetch_array($qry))
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<td><?php echo $row['reg_title'];?></td>
								<td><?php echo $row['department'];?></td>
								<td>
									<a class="btn btn-circle blue" href="<?php echo $row['attach'];?>">View</a>
									
								</td>
								
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
	include('common/footer.php');
?>
