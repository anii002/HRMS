<?php
		
		include('../dbconfig/dbcon.php');
		dbcon();
		if(isset($_GET["empid"]))
		{
			$getid=$_GET["empid"];
			$getyear=$_GET["year"];
			$getimage=$_GET["image"];
			
			echo $_GET["empid"];echo "<br>";
			echo $_GET["year"];echo "<br>";
			echo $_GET["image"];
			
			if(mysql_query("delete from scanned_img where empid='$getid' AND year='$getyear' AND image='$getimage'"))
			{
				mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('Image deleted by Super Admin for empid $empid for year $year','deleting','Super Admin',NOW())");
				echo "<script>alert('Employee APAR Deleted Successfully.....!'); window.location='frmsample.php'</script>";
			}else
			{
				echo mysql_error();
			}
			
		}
?>