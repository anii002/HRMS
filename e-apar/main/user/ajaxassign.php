<?php
session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		if(isset($_POST['selection'])!='')
		{
		$groupid=$_POST['groupid'];
		$group_desc=$_POST['descr'];
		$session=$_SESSION['SESS_MEMBER_NAME'];
		
		$sql_query1= mysql_query("insert into tbl_assignto(groupid,description,createdby,createddate,modifiedby,modifieddate)values('$groupid','$group_desc','$session',NOW(),'$session',NOW())");
		
		$query=mysql_query("select * from tbl_assignto order by assignid desc LIMIT 1");
		$fetch=mysql_fetch_array($query);
		$assignid = $fetch['assignid'];
		
		foreach($_POST['selection'] as $value)
			$sql_query2 = mysql_query("insert into assignto_tbl(emp_id,assignedid,status,modified_date) values ('$value','$assignid','1',NOW())");
			
			
			mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('Group $groupid assinged','assigning_group','Super Admin',NOW())");
			
		echo "<script>alert('Group assigned'); window.location='show_group.php'</script>";
	}
	else
	{
			echo "<script>alert('Please select users'); window.location='show_group.php'</script>";
	}
		
?>