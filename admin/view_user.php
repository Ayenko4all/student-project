<!-- mainhead section -->
<?php include "includes/headed.php" ?>
<?php

/* if(!isset($admin)){
  redirect('login.php');
} */
 if (!is_logged_in()) {redirect('login.php');$_SESSION['error_flash'] = 'You must logged in to access this page.';} ?>
<!-- mainhead end here -->
<?php



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
            <h3 class="page-header"><i class="fa fa-table"></i> PRODUCTS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Products</li>
              <li><i class="fa fa-th-list"></i> View Products</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        
       
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Product Table
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Catogry</th>
                      <th>Brand</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Shoe</td>
                      <td>Men-shoe</td>
                      <td>Adidas</td>
                      <td>01-03-2019</td>
                      
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" title="View more info" href="#"><i class="icon_info_alt"></i></a>
                          <a class="btn btn-default" title="Edit product" href="#"><i class="icon_pencil-edit_alt"></i></a>                
                          <a class="btn btn-success" title="Featured On/Off" href="#"><i class="icon_plus"></i></a>
                          <a class="btn btn-secondary" title="Add Product Attribute" href="product_attributes.html"><i class="icon_plus"></i></a>
                          <a class="btn btn-danger" title="Delete Product" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                     
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" title="View more info" href="#"><i class="icon_info_alt"></i></a>
                          <a class="btn btn-default" title="Edit product" href="#"><i class="icon_pencil-edit_alt"></i></a>                
                          <a class="btn btn-success" title="Featured On/Off" href="#"><i class="icon_plus"></i></a>
                          <a class="btn btn-secondary" title="Add Product Attribute" href="product_attributes.html"><i class="icon_plus"></i></a>
                          <a class="btn btn-danger" title="Delete Product" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      <td>Table cell</td>
                      
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" title="View more info" href="#"><i class="icon_info_alt"></i></a>
                          <a class="btn btn-default" title="Edit product" href="#"><i class="icon_pencil-edit_alt"></i></a>                
                          <a class="btn btn-success" title="Featured On/Off" href="#"><i class="icon_plus"></i></a>
                          <a class="btn btn-secondary" title="Add Product Attribute" href="product_attributes.html"><i class="icon_plus"></i></a>
                          <a class="btn btn-danger" title="Delete Product" href="#"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
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
