
<!-- mainhead section -->
<?php include "includes/headed.php";?>
<!-- mainhead end here -->

<body>
  <!-- container section start -->
  <section id="container" class="">
     <!--header start-->
     <?php include "includes/header2.php";?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/siderbar.php";?>
    <!--sidebar end-->
    <?php $no = 0; $Viewsql = query("SELECT * FROM tbl_categories"); confirm($Viewsql);?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Table Title</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i> Table Title</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        
       
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Responsive tables
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>N/s</th>
                      <th>Category name</th>
                      <th>category level</th>
                      <th><i class="icon_cogs"></i>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($row = fetch_array($Viewsql)): 
                    $cat_id = $row['id'];
                    $viewcat_id = $row['cat_id'];
                    $viewcat_name = $row['category_name'];
                    $no++;?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$viewcat_name?></td>
                      <td><?=$viewcat_id?></td>
                      
                      <td>
                        <div class="btn-group">
                         
                          <a class="btn btn-default" title="Edit product" href="edit_category.php?edit=<?=$cat_id;?>"><i class="icon_pencil-edit_alt"></i></a>
                          <a class="btn btn-success" title="Featured On/Off" href="#"><i class="icon_plus"></i></a>
                          <a class="btn btn-danger" title="Delete Product" href="delete/delete_category.php?delete=<?=$cat_id;?>"><i class="icon_close_alt2"></i></a>
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
