<?php
include('../dbconfig/dbcon.php');
		dbcon();
		session_start();
		error_reporting(0);
			
/
			$year=$_POST["cmbyear"];
			$empname=$_POST["txtempname"];
			$empcode=$_POST["txtempcode"];
			$dept=$_POST["cmbdept"];
			$designation=$_POST["cmbdesignation"];
			$station=$_POST["cmbstation"];
			$payscale=$_POST["txtpayscale"];
			$interity=$_POST["txtinterity"];
			$substantive=$_POST["txtsubstantive"];
			$cpcpaylevel=$_POST["txtcpcpaylevel"];
			$session=$_POST["txtsession"];
			// $interity=$_POST["txtinterity"];
			$stsc=$_POST["txtstsc"];
					
			$sqlaccess=mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
			$rwUser=mysql_fetch_array($sqlaccess);
			$user=$rwUser["adding"];
			// echo $user;
			/*echo "<br>".$_SESSION['Access_level'];
			echo "<br>".$session; */
			if($user=="on")
			{
				if(mysql_query("insert into tbl_employee (year,emplcode,dept,design,station,payscale,integrity,empname,substantive,sevencpcpaylevel,stsc,createdby,createddate)
						values ('$year','$empcode','$dept','$designation','$station','$payscale','$interity','$empname','$substantive','$cpcpaylevel','$stsc','$session',NOW())"))
					{
						mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('Employee with id $empcode added successfully','adding','$session',NOW())");
						echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmsample.php';
						</script>";
					}
					else
					{
						echo mysql_error();
					}
			}else
			{
				echo "<script>alert('Access Denied...');window.location='frmsample.php';</script>";
			}
?>