<?php
$GLOBALS['flag']="2.5";
include('common/header.php');
include('common/sidebar.php');
?>
			
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
						<a href="#">सारांश उत्पन्न करें / Generate Summary</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
								<div class="row">
<?php if(isset($_SESSION['empid'])) { 	?>
	<form action="summary_details.php" method="post">
						<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>सारांश उत्पन्न करें / Generate Summary
							</div>
							<div class="tools">
								<input type="submit" class="btn btn-warning pull-right " id='gn' name="subtn" value="Generate Summary">
							</div>
							 
						 
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-bordered display" id="example">
							<thead>
							<tr class="warning">
								<th></th>
								<th>Reference / <br> संदर्भ</th>
								<th>Name / <br> नाम</th>
								<th>Year / <br> साल</th>
								<th>Month / <br> महीना</th>
								<th>Total Distance / <br> कुल दूरी</th>
								<th>Total Rate / <br> कुल दर</th>
								<th>Applied Month / <br> महीना लगाया</th>
								<th>Action / <br> कार्य</th>
							</tr>
							</thead>
							<tbody>
								<?php
								function get_employee($id)
								{
									$query = mysql_query("SELECT name from employees where pfno='$id'");
									$result = mysql_fetch_array($query);
									return $result['name'];
								}
								$cnt=0;
									 $query = "SELECT MONTHNAME(str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear,taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND summary='0') group by taentry_master.reference_no";
									//echo $query;
									
									$result = mysql_query($query);
									$count_row = mysql_num_rows($result);
									if($count_row>0){}else{
										echo "<script>document.getElementById('gn').style.display='none';</script>";
									}
									$cnt=0;
									while($val = mysql_fetch_array($result))
									{
										if($val['reference_no']!=null)
										{
											
										echo "
										<tr>
											<td><input type='checkbox' name='selected_list[$cnt]'  value='".$val['reference_no']."'></td>
											<td>".$val['reference_no']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='show_seperate_claim1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										$cnt++;
										}
									}
								 ?>
							
							
							</tbody>
							</table>
						</div>
					</div>
				
				</div>
			</div>
			</form>
				<?php } ?>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>