<?php
include_once("../includes/db.php");

if (isset($_GET['delete'])) {

  //$delete_id = sanitize( $_GET['delete']);
  $delete_id = escape_string( $_GET['delete']);
  //$parent_id = escape_string( $_GET['parent_id']);
  $sql = query("UPDATE tbl_products SET delete_product = '0' WHERE product_id = '$delete_id' ");
  confirm($sql);

  redirect('../view_product.php');
  $_SESSION['success_flash'] = 'Product was restore.';
} else{
  redirect('../view_product.php');
  $_SESSION['success_flash'] = 'Product was restore.';
}

