<?php 
$id = $_GET['id'];
session_start();
require_once '../dbconfig/dbcon.php';
require_once 'control/function.php';

$user  ="drmpsurh_test";
	$pass  ="root@123";
	$host  = "localhost";
	$db    = "drmpsurh_sbf";
	$db1 = "drmpsurh_sur_railway";
	@mysql_connect($host,$user,$pass);
	mysql_select_db($db); 
	
	$dbh1 = mysql_connect($host, $user, $pass); 
	$dbh2 = mysql_connect($host, $user, $pass, true); 
	mysql_select_db($db1, $dbh2);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
.pt-50{padding-top:50px;}

</style>


<?php 
if($id == 1) {
?>
<div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
    		<h5 class="page-title text-center">FRESH CASES OF SCHOLARSHIP FOR THE YEAR 2020-2021</h5>
    		<h6>(Non Gazetted Staff in Grade Pay of Rs.2800 &amp; Above @ Rs.18000/- p.a.)</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                <th>SC / ST / OBC</th>
                <th>Name of Student</th>
                <th>Studying Course (Academic year 2020-2021)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM prmaemp WHERE empno = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['empname']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['desigcode']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['stationcode']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['billunit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                <td><?php echo $row['cast']; ?></td>
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['name_of_institute']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 15) { ?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">Cash Award Scheme from SBF for wards of Railway employees for out Standing performance in academic year 2019-20</h5>
    		<h6>( MA, M.Com, M.Sc with 60% more - A cash award of Rs.6,000/-)</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                
                <th>Name of Student</th>
                <th>% in MA,M.COM, M.SC*</th>
                <th>Studying Course (Academic year 2020-2021)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM prmaemp WHERE empno = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['empname']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['desigcode']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['stationcode']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['billunit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['percentage']; ?></td>
                <td><?php echo $row['name_of_institute']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 14) { ?>
     <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">Cash Award Scheme from SBF for wards of Railway employees for out Standing performance in academic year 2019-20</h5>
    		<h6>( BA, B.Com, B.Sc with 60% more - A cash award of Rs.6,000/-)</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                
                <th>Name of Student</th>
                <th>% in BA,B.COM, B.SC*</th>
                <th>Studying Cource (Academic year 2020-2021)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['percentage']; ?></td>
                <td><?php echo $row['name_of_institute']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 12) { ?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">Cash Award Scheme from SBF for wards of Railway employees for out Standing performance in academic year 2019-20</h5>
    		<h6>( SSC with 90% more - A cash award of Rs.9,000/-)</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                
                <th>Name of Student</th>
                <th>% in SSC*</th>
                <th>Studying Course (Academic year 2020-2021)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['percentage']; ?></td>
                <td><?php echo $row['name_of_institute']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 13) { ?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">Cash Award Scheme from SBF for wards of Railway employees for out Standing performance in academic year 2019-20</h5>
    		<h6>( HSC with 85% more - A cash award of Rs.9,000/-)</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                
                <th>Name of Student</th>
                <th>% in HSC*</th>
                <th>Studying Course (Academic year 2020-2021)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['percentage']; ?></td>
                <td><?php echo $row['name_of_institute']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 3) { ?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">AWARD OF SCHOLARSHIP FOR HIGHER EDUCATION OF MALE CHILDREN/DEPENDENT BROTHER OF STAFF IN GRADE PAY up to Rs.2400 - Year : 2020-21</h5>
    		<h6>( TO BE FILLED & FORWARDED ALONGWITH APPLICATIONS DULY SIGNED BY SPO/APO(W) & Ch.S&WI(Wel))</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                <th>SC/ST/OBC</th>
                <th>Name of Student</th>
                <th>Name of the Course</th>
                <th>Year in which currently studying 2020-21</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                <td><?php echo $row['cast']; ?></td>
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['name_of_course']; ?></td>
                <td><?php echo $row['present_year']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 4) {?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">AWARD OF SCHOLARSHIP FOR HIGHER EDUCATION OF MALE CHILDREN/DEPENDENT BROTHER OF STAFF IN GRADE PAY up to Rs.2400 - Year : 2020-21</h5>
    		<h6>( TO BE FILLED & FORWARDED ALONGWITH APPLICATIONS DULY SIGNED BY SPO/APO(W) & Ch.S&WI(Wel))</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No.</th>
                <th>Grade Pay (Including MACP in any)</th>
                <th>SC/ST/OBC</th>
                <th>Name of Student</th>
                <th>Name of the Course</th>
                <th>Year in which currently studying 2020-21</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['macp_grade_pay']; ?></td>
                <td><?php echo $row['cast']; ?></td>
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['name_of_course']; ?></td>
                <td><?php echo $row['present_year']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } else if($id == 16) {?>
    <div class="page-content-wrapper pt-50">
	<div class="page-content">
	    <div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="text-center">
		    <h3>2020-2021</h3>
    		<h5 class="page-title text-center">1) Development of Occuptional Skills of Physically/Mentally Challenged wards of Railway employees</h5>
    		<h5 class="page-title text-center">2) Annual Maintenance grant to such wards who are completely blind (100%) or bed-ridden with paralytic,amputation of both legs,muscular dystrophy,cerebral palsy or spastics(40% & above) @Rs.18000/-p.a</h5>
    		<h6>( TO BE FILLED & FORWARDED ALONGWITH APPLICATIONS DULY SIGNED BY SPO/APO(W) & Ch.S&WI(Wel))</h6>
		</div>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table data-table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name of Employee</th>
                <th>Designation</th>
                <th>Place of Work &amp; Station</th>
                <th>P.F. A/c No.</th>
                <th>Bill Unit No</th>
                <th>Name of the Ward</th>
                <th>Nature of disability</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            // $res = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'");
            // $res1 = mysql_num_rows($res);
           
           $result = mysql_query("SELECT * FROM tbl_form_details WHERE scheme_id = '$id'",$dbh1);
            
            while($row = mysql_fetch_assoc($result)){
           
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
               <?php 
               $res = mysql_query("SELECT * FROM resgister_user WHERE emp_no = '".$row['emp_no']."'",$dbh2);
               $res1 = mysql_fetch_array($res);
               ?>
                <td><?php echo $res1['name']; ?></td>
                <?php 
                $desig = mysql_query("SELECT * FROM designations WHERE DESIGCODE = '".$res1['designation']."'",$dbh2);
                $desig1 = mysql_fetch_array($desig);
                ?>
                <td><?php echo $desig1['DESIGLONGDESC']; ?></td>
                <?php 
                $station = mysql_query("SELECT * FROM station WHERE stationcode = '".$res1['station']."'",$dbh2);
                $station1 = mysql_fetch_array($station);
                ?>
                <td><?php echo $station1['stationdesc']; ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $res1['bill_unit']; ?></td>
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['nature_of_disability']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    
    </div>
    </div>
    </div>
    </div>
    <?php } ?>