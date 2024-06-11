<?php

	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
  <div class="content-wrapper">
  	<section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        निर्वाचित यात्रा भत्ता सूची / Returned Claimed TA
      	</span>
      	<span style="float: right">
	  		<button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
	  	</span>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']))
{

	?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">सभी निर्वाचित किए गए यात्रा भत्ता  / ALL Returned TA</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>संदर्भ / Reference</th>
								<th>वर्ष  / Year</th>
								<th>माह  / Month</th>
								<th>कुल दूरी / Total Distance</th>
								<th>कुल दर / Total Rate </th>
								<th>कार्रवाई / Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_REQUEST['ref']))
								{
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference='".$_REQUEST['ref']."'";
								}
								else
								{
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryforms.reference_id in (select taentryform_master.reference from taentryform_master where taentryform_master.empid='".$_SESSION['empid']."') GROUP BY taentryforms.reference_id";
								}
								//echo $query;		
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										$query = mysql_query("select * from forward_data where reference_id='".$val['reference']."' ORDER BY id DESC LIMIT 1");
										$query_result = mysql_fetch_array($query);
										if($query_result['admin_returned_status']=='1')
										{
										echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td><a href='show_returned_seperate.php?id=".$val['reference']."' class='btn btn-primary'>दर्शाया जाए / Show</a>
										</tr>
										";
									}
								}
								 ?>


							</tbody>
						</table>
					</div>
					
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>