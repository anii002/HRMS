<?php
include_once("../../dbconfig/dbcon.php");
/**
 * @param 
 * @description 
 */

function forward_ackmt($emp_pf, $frm_ref_id,$fw_to_id ,$fw_remark,$form_id)
{
    global $db_edar;
    //$ref_id = get_emp_ref($emp_pf);
    //$form_ids = get_emp_forms($emp_pf, $frm_ref_id);
    $current_date = date("Y-m-d H:i:s");
    $current_role = $_SESSION['role'];
    $status = 5;
    $current_user = $_SESSION["emp_id"];

    $sql=mysql_query("SELECT ack_ids from tbl_form_master_entry where emp_pf='$emp_pf' and form_ref_id='$frm_ref_id'",$db_edar);
    $fetch_sql=mysql_fetch_array($sql);


    $up_sql=mysql_query("UPDATE  tbl_form_master_entry set current_status='5' where emp_pf='$emp_pf' and form_ref_id='$frm_ref_id'",$db_edar);

    $sql_ins=mysql_query("INSERT INTO `tbl_form_forward`(`form_reference_id`, `emp_pf`, `form_id`, `fw_from`, `fw_to`, `fw_date`, `status`, `remark`, `current_role`, `ack_id`) VALUES('$frm_ref_id','$emp_pf','$form_id','$current_user','$fw_to_id','$current_date','$status','$fw_remark','$current_role','".$fetch_sql['ack_ids']."') ",$db_edar);
    
    
    if ($sql_ins && $up_sql) {
            return true;
        
    }
    return false;
}


?>