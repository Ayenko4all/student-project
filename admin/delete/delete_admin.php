<?php
include_once("../includes/db.php");

if (isset($_GET['delete'])) {

  //$delete_id = sanitize( $_GET['delete']);
  $delete_id = escape_string( $_GET['delete']);
  $sql = query("DELETE FROM tbl_admin WHERE admin_id = '$delete_id' ");
  confirm($sql);

  redirect('../view_admin.php');
  $_SESSION['success_flash'] = 'Admin was deleted.';
} else{
  redirect('../view_admin.php');
  $_SESSION['success_flash'] = 'Admin was deleted.';
}

