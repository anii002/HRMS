  <?php
session_start();
		include('../dbconfig/dbcon.php');
		dbcon();
			$year=$_POST["cmbyear"];
			$empid=$_POST["txtempid"];
			$empname=$_POST["txtempname"];
			$empcode=$_POST["txtempcode"];
			
		
			$dept=$_POST["cmbdept"];
			$designation=$_POST["cmbdesignation"];
			$station=$_POST["cmbstation"];
			$payscale=$_POST["txtpayscale"];
			$substantive=$_POST["txtsubstantive"];
			
			
			$stsc=$_POST["txtstsc"];
			$session=$_POST["txtsession"];
			$sevencpcpaylevel=$_POST["txtsevencpcpaylevel"];
			$type=$_POST["txttype"];
			$contact=$_POST["txtcontact"];
		if(isset($_POST["btnbasic"]))
		{
			$sql_fetch=mysql_query("SELECT * FROM scanned_apr WHERE empid='$empcode'");
			if($result = mysql_fetch_array($sql_fetch))
			{
				 if(mysql_query("update tbl_employee set contact='$contact', dept='$dept',design='$designation',station='$station',payscale='$payscale',empname='$empname',substantive='$substantive',sevencpcpaylevel='$sevencpcpaylevel',stsc='$stsc',modifiedby='$session',modifieddate=NOW() where empid=$empid") && mysql_query("update scanned_apr set dept='$dept',designation='$designation'
				 ,station='$station',payscale='$payscale',substantive='$substantive',sevencpcpaylevel='$sevencpcpaylevel',stsc='$stsc' where
				 empid='$empcode' AND year='$year'"))
				 {
					 echo "<script>
				alert('employee updated successfully');
				window.location='frmeditemployee.php?emppf=$empcode';
				</script>";
				echo $empcode;
				 }
			}
			else 
				echo "<script>alert('Employee record not present!!!!');window.location='frmeditemployee.php?emppf=$empcode';</script>";
			
			echo mysql_error();
		}
		else
		{
			$year=$_POST["cmbyear"];
			$empid=$_POST["txtempid"];
			$empname=$_POST["txtempname"];
			$empcode=$_POST["txtempcode"];
			$interity=$_POST["txtinterity"];
			$reportingofficer=$_POST["txtreportingofficer"];
			$reviewingofficer=$_POST["txtreviewingofficer"];
			$acceptauthofficer=$_POST["txtacceptauthofficer"];
			$totalgrade=$_POST["txtacceptauthofficer"];
			
		
			$dept=$_POST["cmbdept"];
			$designation=$_POST["cmbdesignation"];
			$contact=$_POST["txtcontact"];
				echo $empcode;
			 if(isset($_FILES['txtfileappr']['tmp_name'][0])!='')
			{
				if(file_exists("../resources/NAME_PFNO/".$empcode)){}else{
				mkdir("../resources/NAME_PFNO/".$empcode);}
				if(file_exists("../resources/NAME_PFNO/".$empcode."/".$year)){}else{
				mkdir("../resources/NAME_PFNO/".$empcode."/".$year);}
			for($i=0; $i<count($_FILES['txtfileappr']['tmp_name']); $i++)  
			{
				$fetch=mysql_query("select count(id) from scanned_img where empid='$empcode' and year='$year'");
				$rwFetch=mysql_fetch_array($fetch);
				$cnt=$rwFetch['count(id)'];
				$filename = $empcode."_".$year."_".$cnt++.".jpg";
				//remove this comment
				 mysql_query("insert into scanned_img(empid,empname,year,image,uploadedby,uploadeddate) values ('$empcode','$empname','$year','$filename','".$_SESSION['SESS_MEMBER_NAME']."',NOW())");
				 move_uploaded_file($_FILES['txtfileappr']['tmp_name'][$i], "../resources/NAME_PFNO/".$empcode."/".$year."/".$filename);
				 //echo "$filename";
			}
			 }else
			{
				//remove this comment
			   $filename="file missing";
			   mysql_query("insert into scanned_img(empid,empname,year,image,uploadedby,uploadeddate) values ('$empcode','$empname','$year','$filename','".$_SESSION['SESS_MEMBER_NAME']."',NOW())");
						//echo "$filename";
				 }
			if(mysql_query("update tbl_employee set contact='$contact', dept='$dept',design='$designation',station='$station',payscale='$payscale',integrity='$interity',empname='$empname',substantive='$substantive',sevencpcpaylevel='$sevencpcpaylevel',stsc='$stsc',modifiedby='$session',modifieddate=NOW() where empid='$empid'")
				&&
			mysql_query("insert into scanned_apr(year,empid,empname,dept,designation,station,payscale,integrity,substantive,sevencpcpaylevel,
			reportinggrade,reviewinggrade,acceptinggrade,totalgrade,reporttype,stsc,updatedby,createddate)values('$year','$empcode','$empname','$dept','$designation','$station','$payscale','$interity','$substantive','$sevencpcpaylevel','$reportingofficer',
			'$reviewingofficer','$acceptauthofficer','$totalgrade','$type','$stsc','".$_SESSION['SESS_MEMBER_NAME']."',NOW())"))
			{
				mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('$empcode Updated succesfully','editing','Super Admin',NOW())");
				echo "<script>
				alert('Record Updated Successfully!!!!');
				window.location='frmsearchemp.php';
				</script>";
			}
			else
			{
				echo mysql_error();
			}
		 }
			
			
			
			
			
			 
  ?>