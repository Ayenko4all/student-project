<?php
include_once("../includes/db.php");

if (isset($_GET['delete'])) {

  //$delete_id = sanitize( $_GET['delete']);
  $delete_id = escape_string( $_GET['delete']);
  //$parent_id = escape_string( $_GET['parent_id']);
  $sql = query("DELETE FROM tbl_categories WHERE id = '$delete_id' ");
  confirm($sql);

  redirect('../view_category.php');
  $_SESSION['success_flash'] = 'category was deleted.';
} else{
  redirect('../view_category.php');
  $_SESSION['success_flash'] = 'category was deleted.';
}

