<!-- mainhead section -->
<?php include "includes/headed.php" ?>
<?php

/* if(!isset($admin)){
  redirect('login.php');
} */
 if (!is_logged_in()) {
  redirect('login.php');
  $_SESSION['error_flash'] = 'You must logged in to access this page.';
} 
if( has_permission()){
  redirect('index.php');
}
?>
<!-- mainhead end here -->
<?php
$no = 0;
$sql = query("SELECT * FROM tbl_admin");
confirm($sql);


?>
<body>
  <!-- container section start -->
  <section id="container" class="">


     <!--header start-->
     <?php include "includes/header2.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/siderbar.php" ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Admin Area</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Admins</li>
              <li><i class="fa fa-th-list"></i> View Admins</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        
       
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Admin Table
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Last Seen</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php while($row = fetch_array($sql)): 
                  $no++;
                  $first_name = $row['first_name'];
                  $email = $row['email'];
                  $admin_level = $row['admin_level'];
                  $last_login = $row['last_login'];
                  $admin_id = $row['admin_id'];
                  
                  ?>
                  <tr>
                    <td><?=$no ?></td>
                    <td><?=$first_name ?></td>
                    <td><?=$email ?></td>
                    <td><?=$admin_level ?></td>
                    <td><?=$last_login ?></td>
                    
                    <td>
                      <div class='btn-group'>
                        <a class='btn btn-primary' title='View more info' href='#'><i class='icon_info_alt'></i></a>
                        <a class='btn btn-default' title='Edit admin' href='#'><i class='icon_pencil-edit_alt'></i></a>  
                        <?php if($admin_id != $_SESSION['admin_id']) :?>
                        <a class='btn btn-danger' title='Delete admin' href='delete/delete_admin.php?delete=<?=$admin_id?>'><i class='icon_close_alt2'></i></a>
                        <?php endif;?>
                      </div>
                    </td>
                  </tr>
                <?php endwhile;?>  
                  </tbody>
                </table>
              </div>

            </section>
          </div>
        </div>
        
        <!-- page end-->
      </section>
      <?php
        
        

      ?>
    </section>
    <!--main content end-->
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
